<?php

namespace App\Observers;

use App\Events\DeviceCreated;
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
}
