<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Resources\Api\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $repository)
    {
    }

    public function store(CompanyCnpjRequest $request)
    {
        try {
            $this->repository->store($request);

            return response()->json(['status' => 'sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'falha',
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    public function all(CompanyDeviceRequest $request)
    {
        $products = $this->repository->all($request);

        return ProductResource::collection($products);
    }
}
