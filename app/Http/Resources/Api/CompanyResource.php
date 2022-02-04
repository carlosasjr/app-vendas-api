<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'id'        => $this->id,
            'cnpj'      => $this->cnpj,
            'name'      => $this->name,
            'block'     => $this->block,
            'license'   => $this->license,
            'license_used'  => $this->license_used,
            'licenseAvailable' => $this->license_available
        ];
    }
}
