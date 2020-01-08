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

class TypeRepository
{

    public function getHomePage()
    {
        return DB::select(
            'SELECT * FROM ViewAllCategoriesList'
        );
    }

    public function getType($id)
    {
        return DB::select('call TypeGetInfo(?)',array($id));
    }



    public function getTypeCoins($id)
    {
        return DB::select('call CoinTypeGetAll(?)',array($id));
    }

    public function getTypeCollected($id)
    {
        return DB::select('call CoinTypeGetAll(?)',array($id));
    }
}
