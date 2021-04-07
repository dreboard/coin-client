<?php


namespace App\Models\Coins;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coin extends Model
{

    /**
     * Get coin by id
     * @param int $id
     * @return array
     */
    public function getByID(int $id)
    {
        return DB::select('call CoinsGetByID(?)',array($id));
    }

}
