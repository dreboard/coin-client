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

class CoinVarietyRepository
{

    public function coinVarietyGetByID(int $id)
    {
        return DB::select('call CoinVarietyGetByID(?)',array($id));
    }

}
