<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Resources\Api\ConditionPaymentResource;
use App\Services\ConditionPaymentService;
use Illuminate\Http\Request;

class ConditionPaymentController extends Controller
{
    public function __construct(private ConditionPaymentService $repository)
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
        $conditions = $this->repository->all($request);

        return ConditionPaymentResource::collection($conditions);
    }
}
