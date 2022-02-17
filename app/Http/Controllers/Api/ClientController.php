<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Resources\Api\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(private ClientService $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $clients = $this->repository->all($request);

        return ClientResource::collection($clients);
    }
}
