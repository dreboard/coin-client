<?php


namespace App\Models\Coins;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Variety extends Model
{

    /**
     * Get all varieties by coin ID
     * {{ cv.id, cv.coin_id, cv.sub_type, cv.grouping, cv.variety, cv.label, cv.label, cv.designation, cv.type, cv.description,
    c.coinName, c.coinYear, c.coinMetal, c.strike, ct.coinType, ct.id AS type_id, cc.coinCategory, cc.id AS cat_id }}
     * @param int $id
     * @return array
     */
    public function getByID(int $id)
    {
        return DB::select('call CoinVarietyGetByVarietyID(?)',array($id));
    }

    public function getByCoinID(int $id)
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
