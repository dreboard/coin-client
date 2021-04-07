<?php


namespace App\Models\Coins;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Variety extends Model
{

    /**
     * Get all varieties by coin ID
     * @param int $id
     * @return array
     */
    public function getByID(int $id)
    {
        return DB::select('call CoinVarietyGetByID(?)',array($id));
    }


    /**
     * Get list of DISTINCT varieties by coin ID
     * @param int $id
     * @return array
     */
    public function listDistinctVarietyByCoinId(int $id)
    {
        return DB::select('call CoinListDistinctVarietyByCoinId(?)',array($id));

    }

    public function getAllVarietyByCoinID(string $variety, int $id)
    {
        return DB::select('call GetCoinVarietyTypeByID(?,?)',array($variety, $id));
    }

}
