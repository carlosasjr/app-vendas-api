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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClients(CompanyCnpjRequest $request)
    {
        $clients = $this->repository->storeClients($request);

        return ClientResource::collection($clients);
    }


    public function all(CompanyDeviceRequest $request)
    {
        $clients = $this->repository->all($request);

        return ClientResource::collection($clients);
    }
}
