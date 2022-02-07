<?php

namespace App\Observers;

use App\Models\Seller;
use Illuminate\Support\Str;

class SellerObserver
{
    public function creating(Seller $seller)
    {
        $seller->uuid = Str::uuid();
    }
}
