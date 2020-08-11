<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         https://github.com/dreboard
 */

namespace App\Repositories;


use App\Exceptions\CategoryException;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use \Illuminate\Database\QueryException;
use RuntimeException;
use Throwable;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository implements CoinRepositoryInterface
{
    /**
     *
     */
    private const CACHE_MINS = 20;

    /**
     * @return array
     */
    public function getHomePage()
    {
        return DB::select(
            'SELECT * FROM ViewAllCategoriesList'
        );
    }

    /**
     * Get Category info by ID
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        if (!$id || $id === 0) {
            throw new CategoryException('No Category ID given -- '. __CLASS__.'/'.__METHOD__);
        }
        try {
            return DB::select('CALL CategoryGetAllInfoByUser(?,?)', [$id, Auth::id()]);
        } catch (QueryException $e) {
            Log::error('DB Error -- '. __CLASS__.'/'.__METHOD__. '/'.$e->getMessage());
            return redirect('home')->with('status', 'Category does not exist');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTypes($id)
    {
        if (!$id || $id === 0) {
            throw new CategoryException('No Category ID given -- '. __CLASS__.'/'.__METHOD__);
        }
        try {
            return DB::select('CALL CoinListCategoryDistinctTypes(?)',array($id));
        } catch (QueryException $e) {
            Log::error('DB Error -- '. __CLASS__.'/'.__METHOD__. '/'.$e->getMessage());
            return redirect('home')->with('status', 'Category types do not exist');
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTypeAll(int $id)
    {
        if (!$id || $id === 0) {
            throw new CategoryException('No Category ID given -- '. __CLASS__.'/'.__METHOD__);
        }
        $typeInfo = [];
        $types = DB::select( DB::raw("CALL CoinListCategoryDistinctTypes(:id)"), [
            'id' => $id,
        ]);
        $i = 0;
        foreach ($types as $k => $type){
            $typeInfo[$k]['coinType'] = $type->coinType;
            $typeInfo[$k]['id'] = $type->id;
            $typeInfo[$k]['details'] =  DB::select('CALL CollectedTypeGetInfo(?, ?)', [$type->id, Auth::id()]);
            $i++;
        }
        return $typeInfo;
    }


    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function getTypeAllCache(int $id)
    {
        if (!$id || $id === 0) {
            throw new CategoryException('No Category ID given -- '. __CLASS__.'/'.__METHOD__);
        }
        $typeInfo = [];
        $types = $this->setTypeCache($id);

        $typeInfoArr = cache()->remember("typeInfoArr{Auth::id().$id}", now()->addMinutes(self::CACHE_MINS), function () use ($types){
            foreach ($types as $k => $type){
                $typeInfo[$k]['coinType'] = $type->coinType;
                $typeInfo[$k]['id'] = $type->id;
                $typeInfo[$k]['details'] =  DB::select('CALL CollectedTypeGetInfo(?, ?)', [$type->id, Auth::id()]);
            }
            return $typeInfo;
        });

        return $typeInfoArr;
    }

    /**
     * Cache types for a category
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function setTypeCache(int $id)
    {
        try{
            return cache()->remember("types{Auth::id().$id}", now()->addMinutes(self::CACHE_MINS), function () use ($id) {
                return DB::select(DB::raw("CALL CoinListCategoryDistinctTypes(:id)"), [
                    'id' => $id,
                ]);
            });
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return redirect('home')->with('status', 'A memory issue has occured');
        }

    }

}
