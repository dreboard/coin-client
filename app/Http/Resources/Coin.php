<?php

namespace App\Http\Resources;

use App\CoinType;
use App\Http\Resources\CoinCategory as CoinCategoryResource;
use App\Http\Resources\CoinType as CoinTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Coin extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'coinName' => $this->coinName,
            'coinYear' => $this->coinYear,
            'strike' => $this->strike,
            'mintMark' => $this->mintMark,
            'coincats_id' => $this->coincats_id,
            'cointypes_id' => $this->cointypes_id,
            'coinVersion' => $this->coinVersion,
            'coinType' => new CoinTypeResource($this->cointype),
            'category' => new CoinCategoryResource($this->coincategory),
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
}
