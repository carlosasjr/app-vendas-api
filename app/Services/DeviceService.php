<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\DeviceRequest;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class DeviceService
{
    public function __construct(
        private Device $repository
    ) {
    }


    public function store(DeviceRequest $request)
    {
        return DB::transaction(
            function () use ($request) {
                return $this->repository->create($request->all());
            }
        );
    }

    public function update(CompanyDeviceRequest $request)
    {
        $device = $this->repository->where('name', $request->get('device'))->first();

        $device->sync = now();

        $device->save();

        return $device;
    }
}
