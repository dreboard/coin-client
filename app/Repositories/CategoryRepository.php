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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    private const CACHE_MINS = 20;

    public function getHomePage()
    {
        $catInfo = [];
        return DB::select(
            'SELECT * FROM ViewAllCategoriesList'
        );
    }

    public function getCategory($id)
    {
        return DB::select('CALL CategoryGetAllInfoByUser(?,?)', [$id, Auth::id()]);
    }

    public function getTypes($id)
    {
        return DB::select('CALL CoinListCategoryDistinctTypes(?)',array($id));
    }

    public function getTypeAll(int $id)
    {
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
     * @throws \Exception
     */
    public function getTypeAllCache(int $id)
    {
        $typeInfo = [];
        $types = cache()->remember("types{Auth::id().$id}", now()->addMinutes(self::CACHE_MINS), function () use ($id){
            return DB::select( DB::raw("CALL CoinListCategoryDistinctTypes(:id)"), [
                'id' => $id,
            ]);
        });

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

}
