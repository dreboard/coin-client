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

use App\Models\Coins\Coin;
use App\Models\Coins\Variety;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CoinVarietyRepository
{

    /**
     * @var Variety
     */
    private Variety $coinVarietyModel;

    public function __construct()
    {
        $this->coinVarietyModel = new Variety();
    }

    public function getVarietyList(int $id)
    {
        $varietyList = [];
        $varietyList['list']      = $this->coinVarietyModel->getByID($id);
        $varietyList['varieties'] = Arr::flatten($this->coinVarietyModel->listDistinctVarietyByCoinId($id));
        $varietyList['collected'] = [];
        return $varietyList;
    }

    public function getSubTypeList(int $id)
    {
        $varietyList = [];
        $varietyList['list']      = $this->coinVarietyModel->getByID($id);
        $varietyList['varieties'] = Arr::flatten($this->coinVarietyModel->listDistinctVarietyByCoinId($id));
        $varietyList['collected'] = [];
        return $varietyList;
    }

    public function getVarietyByType(int $id, string $variety)
    {
        return $this->coinVarietyModel->getAllVarietyByCoinID($variety, $id);
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
     * Get all varieties by coin ID
     * @param int $id
     * @return array
     */
    public function coinVarietyGetByCoinID(int $id)
    {
        return $this->coinVarietyModel->getByCoinID($id);
    }


    /**
     * Get list of DISTINCT varieties by coin ID
     * @param int $id
     * @return array
     */
    public function coinListDistinctVarietyByCoinId(int $id)
    {
        return $this->coinVarietyModel->listDistinctVarietyByCoinId($id);

    }




}
