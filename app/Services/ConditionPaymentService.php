<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Models\ConditionPayment;
use App\Models\Device;

class ConditionPaymentService
{
    public function __construct(
        private ConditionPayment $repository,
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
