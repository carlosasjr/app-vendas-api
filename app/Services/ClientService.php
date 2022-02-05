<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Models\Client;
use App\Models\Device;

class ClientService
{
    public function __construct(
        private Client $repository,
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
