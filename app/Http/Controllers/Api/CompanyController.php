<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Resources\Api\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __invoke(CompanyCnpjRequest $request, Company $company)
    {
        $company = $company
            ->cnpj($request->get('cnpj'))
            ->first();

        return  new CompanyResource($company);
    }
}
