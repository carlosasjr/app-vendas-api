<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_id'    => $this->product_id,
            'product'       => new ProductResource($this->product),
            'qtd'           => $this->qtd,
            'price'         => $this->price,
            'desc'          => $this->desc,
            'descReal'      => $this->desc,
            'totalItem'     => (float) $this->totalItem,
            'observation'   => $this->observation
        ];
    }
}
