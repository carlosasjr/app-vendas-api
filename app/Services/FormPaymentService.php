<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Models\Device;
use App\Models\FormPayment;

class FormPaymentService
{
    public function __construct(
        private FormPayment $repository,
        private Device $device
    ) {
    }

    public function all(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->get();
    }
}