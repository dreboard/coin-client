<?php

namespace App\Http\Resources;

use App\Http\Resources\CoinCategory as CoinCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CoinType extends JsonResource
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
            'coinType' => $this->coinType,
            'releaseType' => $this->releaseType,
        ];
    }
}
