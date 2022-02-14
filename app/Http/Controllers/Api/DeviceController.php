<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\DeviceRequest;
use App\Http\Resources\Api\DeviceResource;
use App\Services\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    public function __construct(private DeviceService $repository)
    {
    }

    public function store(DeviceRequest $request)
    {
        $device = $this->repository->store($request);

        return new DeviceResource($device);
    }

    public function update(CompanyDeviceRequest $request)
    {
        $device = $this->repository->update($request);

        return new DeviceResource($device);
    }
}
