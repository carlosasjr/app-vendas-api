<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\SaleRequest;
use App\Http\Resources\Api\SaleResource;
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

    public function allIntegrated(CompanyDeviceRequest $request)
    {
        $sales = $this->repository->allIntegrated($request);

        return SaleResource::collection($sales);
    }
}
