<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Models\Device;
use App\Models\Company;
use App\Models\FormPayment;

class FormPaymentService
{
    public function __construct(
        private FormPayment $repository,
        private Device $device,
        private Company $company
    ) {
    }

    public function store(CompanyCnpjRequest $request)
    {
        $formsPayments = $request->all();

        $company = $this->company->where('cnpj', $formsPayments['cnpj'])->first();

        foreach ($formsPayments as $formPayment) {
            if (isset($formPayment['code_erp'])) {
                $company->formPayments()
                    ->updateOrCreate(['code_erp' => $formPayment['code_erp']], $formPayment);
            }
        }
    }

    public function all(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->get();
    }
}
