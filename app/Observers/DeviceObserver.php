<?php

namespace App\Observers;

use App\Events\DeviceCreated;
use App\Events\DeviceDelete;
use App\Models\Company;
use App\Models\Device;

class DeviceObserver
{
    public function creating(Device $device)
    {
        $device->block = false;
    }

    public function created(Device $device)
    {
        $company = Company::findOrFail($device->company_id);

        event(new DeviceCreated($company));
    }

    public function deleted(Device $device)
    {
        $company = Company::findOrFail($device->company_id);

        event(new DeviceDelete($company));
    }
}
