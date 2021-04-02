<?php


namespace App\Http\Helpers;


class AttributeHelper
{

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
}
