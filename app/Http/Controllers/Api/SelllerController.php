<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Resources\Api\SellerResouce;
use App\Services\SellerService;
use Illuminate\Http\Request;

class SelllerController extends Controller
{
    public function __construct(
        private SellerService $repository
        )
    {
    }


    public function store(CompanyCnpjRequest $request)
    {
        try {
            $this->repository->store($request);

            return response()->json(['status' => 'sucesso'], 200);

        } catch (Exception $e) {

            return response()->json(['status' => 'falha', 'message' => $e->getMessage()]);
        } 
    } 

    public function all(CompanyDeviceRequest $request)
    {
        $sellers = $this->repository->all($request);

        return SellerResouce::collection($sellers);
    }
}
