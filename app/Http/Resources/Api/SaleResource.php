<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'id'          => $this->id,
            'uuid'        => $this->uuid,
            'client_id'   => $this->client_id,
            'client'      => new ClientResource($this->client),
            'company_id'  => $this->company_id,
            'seller_id'   => $this->seller_id,
            'seller'      => new SellerResource($this->seller),  
            'status'      => $this->status,
            'total'       => $this->total,
            'created_at'  => $this->created_at,  
            'items'       => SaleItemResource::collection($this->items),
            'payments'    => SalePaymentResource::collection($this->payments),
        ];
    }
}
