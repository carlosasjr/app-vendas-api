<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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

    public function storeClients(Request $request)
    {
        $clients = $request->all();

        $company = $this->company->where('cnpj', $clients['cnpj'])->first();

        foreach ($clients as $client) {  
            if (isset($client['code_erp'])) {    
                  $company->clients()
                ->updateOrCreate(['code_erp' => $client['code_erp']], $client);  
            }                
        }  
    }
}
