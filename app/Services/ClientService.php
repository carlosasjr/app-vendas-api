<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public function __construct(
        private Client $repository,
        private Device $device,
        private Company $company
    ) {
    }

    public function all(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->get();
    }

    public function storeClients(CompanyCnpjRequest $request)
    {
        $clients = $request->all();

        $company = $this->company->where($clients['cnpj'])->first();

        DB::transaction(
            function () use ($company, $clients) {
                foreach ($clients as $client) {
                    $company->clients()
                        ->updateOrCreate(['id' =>  $client['id']], $client);
                }
            }
        );
    }
}
