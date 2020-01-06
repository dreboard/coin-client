<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         collected.sql
 */

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class CollectedRepository
{


    /**
     * @param int $id
     * @return array
     */
    public function collectionGetCoinsByID(int $id, int $user)
    {
        return DB::select('call CollectionGetCoinsByID(?, ?)', [$id, $user]);
    }

    public function getCollectedByType(int $type_id)
    {

    }

}
