<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Models\Device;
use App\Models\Product;
use App\Models\Company;
use App\Jobs\ProductUpdateCreate;

class ProductService
{
    public function __construct(
        private Product $repository,
        private Device $device,
        private Company $company
    ) {
    }


    public function store(CompanyCnpjRequest $request)
    {
        $products = $request->all();

        $company = $this->company->where('cnpj', $products['cnpj'])->first();

        foreach ($products as $product) {
            if (isset($product['code_erp'])) {
                ProductUpdateCreate::dispatch($company, $product);
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
