<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $coinCategory
 * @property int $typeCount
 * @property float $denomination
 * @property int $ebay
 */
class CoinCategory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'coincategories';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['coinCategory', 'typeCount', 'denomination', 'ebay'];

}
