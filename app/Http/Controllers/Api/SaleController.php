<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\SaleCompanySellerRequest;
use App\Http\Requests\Api\SaleRequest;
use App\Http\Resources\Api\SaleResource;
use App\Http\Requests\Api\SaleProcessedRequest;
use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct(private SaleService $repository)
    {
    }

    public function store(SaleRequest $request)
    {
        $sale = $this->repository->store($request);

        return new SaleResource($sale);
    }

    public function allProcessed(CompanyDeviceRequest $request)
    {
        $sales = $this->repository->allProcessed($request);

        return SaleResource::collection($sales);
    }

    public function allIntegrated(CompanyCnpjRequest $request)
    {
        $sales = $this->repository->allIntegrated($request);

        return SaleResource::collection($sales);
    }

    public function allSalesBySeller(SaleCompanySellerRequest $request)
    {
        $sales = $this->repository->allSalesBySeller($request);

        return SaleResource::collection($sales);
    }




    public function processed(SaleProcessedRequest $request, string $uuid)
    {
        $sale = $this->repository->processed($request, $uuid);

        return response()->json('OK', 202);
    }

    public function fail(CompanyCnpjRequest $request, string $uuid)
    {
        $sale = $this->repository->fail($request, $uuid);

        return response()->json('OK', 202);
    }
}
