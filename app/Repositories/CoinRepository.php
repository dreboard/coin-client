<?php

namespace App\Repositories;


use App\Http\Helpers\CoinHelper;
use App\Http\Helpers\VarietyHelper;
use App\Models\Coins\Coin;
use App\Models\Coins\Variety;
use App\Models\Index;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class CoinRepository
 * @package App\Repositories
 */
class CoinRepository
{

    /**
     * @var Coin
     */
    private Coin $coinModel;

    public function __construct()
    {
        $this->coinModel = new Coin;
        $this->coinVarietyModel = new Variety();
    }

    /**
     * @return array
     */
    public function getHomePage()
    {
        return $this->indexModel->getCategoriesList();
    }

    public function getIndexPageArray(int $id)
    {
        $coin = [];
        $coin['info'] = $this->coinsGetByID($id);
        //$coin['varieties'] = $this->getCoinVarieties($id);
        $coin['varieties'] = VarietyHelper::filterVarietyOutput($coin['info'][0]->sub_types);
        $coin['subTypes'] = $this->getSubTypes($id) ?? ['None'];
        $coin['typeLink'] = str_replace(' ', '_', $coin['info'][0]->coinType);
        $coin['varietyList'] = $this->coinVarietyGetByID($id); //$this->listCoinVarieties($id) ?? ['None'];
        $coin['placeHolderNumber'] = rand(1,22);
        return $coin;
    }

    /**
     * Get coin by id
     * @param int $id
     * @return array
     */
    public function coinsGetByID(int $id)
    {
        return $this->coinModel->getByID($id);
        //return DB::select('call CoinsGetByID(?)',array($id));
    }
    /**
     * Get all varieties by coin ID
     * @param int $id
     * @return array
     */
    public function coinVarietyGetByID(int $id)
    {
        return $this->coinVarietyModel->getByID($id);
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
     * Get variety with by coinID (DDO,RPM..)
     * @param int $id
     * @return array
     */
    public function listCoinVarieties(int $id)
    {
        $varieties_array = DB::select('call CoinListDistinctVarietyById(?)',array($id));
        if(count($varieties_array) === 0){
            return ['None'];
        }
        return $varieties_array;
    }

    /**
     * Get sub types by coinID (Large S, Fancy 5...)
     * @param int $id
     * @return array
     */
    public function getSubTypes(int $id)
    {
        $sub_types_array = DB::select('call CoinListDistinctSubTypeById(?)', [$id]);
        if(count($sub_types_array) === 0){
            return ['None'];
        }
        return VarietyHelper::filterVarietyOutput(Arr::pluck($sub_types_array, 'sub_type'));
    }


}
