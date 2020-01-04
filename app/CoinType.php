<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $coinCategory
 * @property int $coincats_id
 * @property string $coinType
 * @property string $dates
 * @property int $circulated
 * @property boolean $releaseType
 * @property int $fullType
 * @property float $denomination
 * @property string $mintMarks
 * @property int $rollCount
 * @property int $rollTrayCount
 * @property int $rollBinCount
 * @property float $rollVal
 * @property int $bagCount
 * @property float $bagVal
 * @property int $boxCount
 * @property float $boxVal
 * @property string $coinSize
 * @property int $ebay
 * @property int $initial
 */
class CoinType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cointypes';

    /**
     * @var array
     */
    protected $fillable = ['id', 'coinCategory', 'coincats_id', 'coinType', 'dates', 'circulated', 'releaseType', 'fullType', 'denomination', 'mintMarks', 'rollCount', 'rollTrayCount', 'rollBinCount', 'rollVal', 'bagCount', 'bagVal', 'boxCount', 'boxVal', 'coinSize', 'ebay', 'initial'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coincategory()
    {
        return $this->belongsTo('App\CoinCategory', 'coincats_id');
    }
}
