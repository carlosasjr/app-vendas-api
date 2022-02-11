<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id'  => 'required|exists:companies,id',
            'client_id'   => 'required|exists:clients,id',
            'seller_id'   => 'required|exists:sellers,id',
            'total'       => 'required',
            'uuid'        => 'required',
            'status'      => 'required|in:Finalizado,Processado',

            'items'              => 'required',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qtd'        => 'required',
            'items.*.price'      => 'required',
            'items.*.descReal'   => 'required',
            'items.*.totalItem'  => 'required',

            'payments'                        => 'required',
            'payments.*.form_payment_id'      => 'required|exists:form_payments,id',
            'payments.*.condition_payment_id' => 'required|exists:condition_payments,id',
            'payments.*.price'                => 'required'
        ];
    }
}
