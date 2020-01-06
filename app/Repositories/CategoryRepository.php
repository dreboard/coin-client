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


use Illuminate\Support\Facades\DB;

class CategoryRepository
{

    public function getHomePage()
    {
        return DB::select(
            'SELECT * FROM ViewAllCategoriesList'
        );
    }

    public function getCategory($id)
    {
        return DB::select('call CategoryGetInfo(?)',array($id));
    }

    public function getTypes($id)
    {
        return DB::select('call CoinListCategoryDistinctTypes(?)',array($id));
    }



}
