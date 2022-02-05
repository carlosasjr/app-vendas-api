<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'company_id'    => $this->company_id,
            'name'          => $this->name,
            'fantasy'       => $this->fantasy,
            'fj'            => $this->fj,
            'cpf_cnpj'      => $this->cpf_cnpj,
            'address'       => $this->address,
            'number'        => $this->number,
            'complement'    => $this->complement,
            'district'      => $this->district,
            'city'          => $this->city,
            'cep'           => $this->cep,
            'uf'            => $this->uf,
            'telephone'     => $this->telephone,
            'cellphone'     => $this->cellphone,
            'email'         => $this->email,
            'inative'       => $this->inative
        ];
    }
}
