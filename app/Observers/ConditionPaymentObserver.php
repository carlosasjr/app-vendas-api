<?php

namespace App\Observers;

use App\Models\ConditionPayment;
use Illuminate\Support\Str;

class ConditionPaymentObserver
{
    public function creating(ConditionPayment $condition)
    {
        $condition->uuid = Str::uuid();
    }
}
