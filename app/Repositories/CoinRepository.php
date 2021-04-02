<?php

namespace App\Repositories;


use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CoinRepository
 * @package App\Repositories
 */
class CoinRepository
{

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
     * Get coin by id
     * @param int $id
     * @return array
     */
    public function coinsGetByID(int $id)
    {
        return DB::select('call CoinsGetByID(?)',array($id));
    }

    /**
     * Get all coins by type
     * @param int $id
     * @return array
     */
    public function getCoins(int $id)
    {
        return DB::select('call CoinTypeGetAllByCoinID(?)',array($id));
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCoinVarieties(int $id)
    {
        return DB::select('call CoinGetAllLabelsByCoinId(?)',array($id));
    }


    /**
     * @param int $id
     * @return array
     */
    public function getCoinDistinctVarieties(int $id)
    {
        return DB::select('call CoinGetDistinctVarietyByCoinId(?)',array($id));
    }

    /**
     * Get variety with same coinID
     * @param int $id
     * @return array
     */
    public function listCoinVarieties(int $id)
    {
        return DB::select('call CoinListDistinctVarietyById(?)',array($id));
    }

    /**
     * Get sub types by coinID
     * @param int $id
     * @return array
     */
    public function getSubTypes(int $id)
    {
        $sub = DB::select('call CoinListDistinctSubTypeById(?)', [$id]);
        if(count($sub) === 0){
            return [];
        }
        return $sub;
    }


}
