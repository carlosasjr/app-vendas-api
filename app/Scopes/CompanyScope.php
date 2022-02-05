<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class CompanyScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $company_id = request()->query('company_id');

        if (!empty($company_id)) {
            $builder->where(
                function ($query) use ($company_id) {
                    $query->where('company_id', $company_id);
                }
            );
        }
    }
}
