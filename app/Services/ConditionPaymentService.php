<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Models\ConditionPayment;
use App\Models\Device;
use App\Models\Company;

class ConditionPaymentService
{
    public function __construct(
        private ConditionPayment $repository,
        private Device $device,
        private Company $company
    ) {
    }
    
    public function store(CompanyCnpjRequest $request)
    {
        $conditionPayments = $request->all();

        $company = $this->company->where('cnpj', $conditionPayments['cnpj'])->first();

        foreach ($conditionPayments as $conditionPayment) {  
            if (isset($conditionPayment['code_erp'])) {    
                  $company->conditionPayments()
                ->updateOrCreate(['code_erp' => $conditionPayment['code_erp']], $conditionPayment);  
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
