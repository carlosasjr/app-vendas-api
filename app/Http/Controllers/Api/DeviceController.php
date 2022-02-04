<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DeviceRequest;
use App\Http\Resources\Api\DeviceResource;
use App\Services\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    public function __invoke(DeviceRequest $request, DeviceService $device)
    {
        $device = $device->store($request);

        return new DeviceResource($device);
    }
}
