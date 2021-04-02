<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $userID
 * @property int $collectfolderID
 * @property int $collectrollsID
 * @property int $collectsetID
 * @property int $collectfirstdayID
 * @property int $mintsetID
 * @property int $varietysetID
 * @property int $setregID
 * @property int $coincollectID
 * @property int $containerID
 * @property int $coinLotID
 * @property int $coinID
 * @property string $coinNickname
 * @property string $coinGrade
 * @property int $coinGradeNum
 * @property int $problem
 * @property int $damaged
 * @property float $coinValue
 * @property string $listDate
 * @property float $listPrice
 * @property string $sellStatus
 * @property string $mintBox
 * @property string $auctionNumber
 * @property int $error
 * @property string $enterDate
 * @property int $firstday
 * @property int $certlist
 * @property string $certlistService
 * @property string $certlistDate
 * @property string $vam
 * @property string $snow
 * @property string $fsNum
 * @property string $fortin
 * @property string $sheldon
 * @property string $newcomb
 * @property string $wileyBugert
 * @property string $color
 * @property string $fullAtt
 * @property string $morganDesignation
 * @property int $toned
 * @property int $trailDie
 * @property int $viewable
 * @property int $locked
 * @property string $bie
 * @property User $user
 * @property CollectedDamage[] $collectedDamages
 * @property CollectedImg[] $collectedImgs
 * @property CollectedPurchase[] $collectedPurchases
 * @property CollectedTraildie[] $collectedTraildies
 * @property CollectedVariety[] $collectedVarieties
 */
class Collected extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collected';

    /**
     * @var array
     */
    protected $fillable = [
        'userID',
        'collectfolderID',
        'collectrollsID',
        'collectsetID',
        'collectfirstdayID',
        'mintsetID',
        'varietysetID',
        'setregID',
        'coincollectID',
        'containerID',
        'coinLotID',
        'coinID',
        'coinNickname',
        'coinGrade',
        'coinGradeNum',
        'problem',
        'damaged',
        'coinValue',
        'listDate',
        'listPrice',
        'sellStatus',
        'mintBox',
        'auctionNumber',
        'error',
        'enterDate',
        'firstday',
        'certlist',
        'certlistService',
        'certlistDate',
        'vam',
        'snow',
        'fsNum',
        'fortin',
        'sheldon',
        'newcomb',
        'wileyBugert',
        'color',
        'fullAtt',
        'morganDesignation',
        'toned',
        'trailDie',
        'viewable',
        'locked',
        'bie'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userID', 'userID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectedDamages()
    {
        return $this->hasMany('App\CollectedDamage');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectedImgs()
    {
        return $this->hasMany('App\CollectedImg');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectedPurchases()
    {
        return $this->hasMany('App\CollectedPurchase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectedTraildies()
    {
        return $this->hasMany('App\CollectedTraildie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectedVarieties()
    {
        return $this->hasMany('App\CollectedVariety');
    }
}
