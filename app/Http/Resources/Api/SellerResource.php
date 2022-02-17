<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'id'         => $this->id,
            'uuid'       => $this->uuid,
            'company_id' => $this->company_id,
            'name'       => $this->name,
            'password'   => $this->password,
            'code_erp'   => $this->code_erp,
            'inative'    => $this->inative
        ];
    }
}
