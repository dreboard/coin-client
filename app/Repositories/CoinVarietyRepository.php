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

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CoinVarietyRepository
{


    public function getVarietyList(int $id)
    {
        $varietyList = [];
        $varietyList['list']      = $this::coinVarietyGetByID($id);
        $varietyList['varieties'] = Arr::flatten($this::coinListDistinctVarietyByCoinId($id));
        return $varietyList;
    }

    /**
     * Get all varieties by coin ID
     * @param int $id
     * @return array
     */
    public function coinVarietyGetByID(int $id)
    {
        return DB::select('call CoinVarietyGetByID(?)',array($id));
    }


    /**
     * Get list of DISTINCT varieties by coin ID
     * @param int $id
     * @return array
     */
    public function coinListDistinctVarietyByCoinId(int $id)
    {
        return DB::select('call CoinListDistinctVarietyByCoinId(?)',array($id));

    }




}
