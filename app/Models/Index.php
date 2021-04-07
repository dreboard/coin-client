<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class Index
{

    /**
     * @return array
     */
    public function getCategoriesList()
    {
        return DB::select(
            'SELECT * FROM ViewAllCategoriesList'
        );
    }

}
