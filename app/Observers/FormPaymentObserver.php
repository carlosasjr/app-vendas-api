<?php

namespace App\Observers;

use App\Models\FormPayment;
use Illuminate\Support\Str;

class FormPaymentObserver
{
    public function creating(FormPayment $form)
    {
        $form->uuid = Str::uuid();
    }
}
