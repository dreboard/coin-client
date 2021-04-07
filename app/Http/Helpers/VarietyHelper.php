<?php


namespace App\Http\Helpers;


abstract class VarietyHelper
{

    public static function filterVarietyOutput($variety_arr)
    {
        if (!is_array($variety_arr)) {
            $variety_arr = explode(',', $variety_arr);
        }
        if (count($variety_arr) > 1) {
            $varieties = array_filter($variety_arr, array(__CLASS__, 'notNone'));
            return $varieties;
        }
        return $variety_arr;
    }

    public static function notNone($var)
    {
        return trim($var) !== "None";
    }

}
