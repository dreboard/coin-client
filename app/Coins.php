<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cointypes_id
 * @property int $coincats_id
 * @property string $mintMark
 * @property int $coinYear
 * @property string $coinCategory
 * @property string $coinType
 * @property string $coinSubCategory
 * @property string $coinName
 * @property string $coinVersion
 * @property string $coinSize
 * @property string $coinMetal
 * @property string $strike
 * @property int $commemorative
 * @property string $commemorativeVersion
 * @property string $commemorativeCategory
 * @property string $commemorativeType
 * @property string $commemorativeGroup
 * @property int $byMint
 * @property int $byMintGold
 * @property float $denomination
 * @property int $keyDate
 * @property int $semiKeyDate
 * @property int $errorCoin
 * @property int $varietyCoin
 * @property string $varietyType
 * @property int $century
 * @property int $release
 * @property string $rarity
 * @property string $series
 * @property string $seriesType
 * @property string $design
 * @property string $designType
 * @property string $mms
 * @property string $odv
 * @property string $rdv
 * @property Coincategory $coincategory
 * @property Cointype $cointype
 * @property Collectcoin[] $collectcoins
 */
class Coins extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cointypes_id', 'coincats_id', 'mintMark', 'coinYear', 'coinCategory', 'coinType', 'coinSubCategory', 'coinName', 'coinVersion', 'coinSize', 'coinMetal', 'strike', 'commemorative', 'commemorativeVersion', 'commemorativeCategory', 'commemorativeType', 'commemorativeGroup', 'byMint', 'byMintGold', 'denomination', 'keyDate', 'semiKeyDate', 'errorCoin', 'varietyCoin', 'varietyType', 'century', 'release', 'rarity', 'series', 'seriesType', 'design', 'designType', 'mms', 'odv', 'rdv'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coincategory()
    {
        return $this->belongsTo('App\Coincategory', 'coincats_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cointype()
    {
        return $this->belongsTo('App\Cointype', 'cointypes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectcoins()
    {
        return $this->hasMany('App\Collectcoin', 'coinID');
    }
}
