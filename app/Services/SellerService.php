<?php

namespace App\Services;

use App\Models\Device;
use App\Models\Seller;
use App\Models\Company;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\CompanyDeviceRequest;

class SellerService
{
    public function __construct(
        private Seller $repository,
        private Device $device,
        private Company $company
    ) {
    }


    public function store(CompanyCnpjRequest $request)
    {
        $sellers = $request->all();

        $company = $this->company->where('cnpj', $sellers['cnpj'])->first();
        foreach ($sellers as $seller) {
            if (isset($seller['code_erp'])) {
                $company->sellers()
                    ->updateOrCreate(['code_erp' => $seller['code_erp']], $seller);
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
