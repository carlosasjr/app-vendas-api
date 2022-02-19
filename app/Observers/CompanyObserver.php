<?php

namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    public function creating(Company $company)
    {
        $company->license_used = 0;
    }
}
