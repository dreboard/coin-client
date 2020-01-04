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
 * @property string $color
 * @property string $fullAtt
 * @property string $appearance
 * @property int $toned
 * @property int $viewable
 * @property int $locked
 */
class CoinCollected extends Model
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
    protected $fillable = ['id', 'userID', 'collectfolderID', 'collectrollsID', 'collectsetID', 'collectfirstdayID', 'mintsetID', 'varietysetID', 'setregID', 'coincollectID', 'containerID', 'coinLotID', 'coinID', 'coinNickname', 'coinGrade', 'coinGradeNum', 'problem', 'damaged', 'coinValue', 'listDate', 'listPrice', 'sellStatus', 'mintBox', 'auctionNumber', 'error', 'enterDate', 'firstday', 'certlist', 'certlistService', 'certlistDate', 'color', 'fullAtt', 'appearance', 'toned', 'viewable', 'locked'];

}
