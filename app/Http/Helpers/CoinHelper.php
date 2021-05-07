<?php

namespace App\Http\Helpers;

use \Illuminate\Container\Container as Container;
use \Illuminate\Support\Facades\Facade as Facade;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

abstract class CoinHelper
{


    static public function getModernCoins()
    {

    }

    /**
     * Array of copper coins to add color attribute
     * @return array
     */
    static public function getColorCategories():array
    {
        return ['Small Cent', 'Large Cent', 'Half Cent'];
    }

    /**
     * Array of copper coins to add color attribute
     * @return array
     */
    static public function getSeatedTypes():array
    {
        //return DB::raw('SELECT * FROM ViewSeatedLibertyTypes');
        return ['Seated Liberty Half Dime', 'Seated Liberty Dime', 'Seated Liberty Quarter', 'Seated Liberty Half Dollar', 'Seated Liberty Dollar'];
    }

    public static function gradePrefix($strike)
    {

    }

    static public function collected(){
        return [
            0 => [
                'id' => 1,
                'userID' => 1,
                'coinID' => 1,
                'coinGrade' => 'MS-64',
                'enterDate' => date('Y-m-d'),
                'purchasePrice' => '123.56',
                'nickName' => 'The Coin'
            ]

        ];
    }
}
