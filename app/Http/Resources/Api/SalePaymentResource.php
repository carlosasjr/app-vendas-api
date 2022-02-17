<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SalePaymentResource extends JsonResource
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
            'form_payment_id'       => $this->form_payment_id,
            'form_payment'          => new FormPaymentResource($this->formPayment),
            'condition_payment_id'  => $this->condition_payment_id,
            'condition'             => new ConditionPaymentResource($this->conditionPayment),
            'price'=> $this->price,
        ];
    }
}
