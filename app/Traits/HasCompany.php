<?php


namespace App\Traits;

use App\Models\Company;
use App\Scopes\CompanyScope;

trait HasCompany
{
    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new CompanyScope());
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
