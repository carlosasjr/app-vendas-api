<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\SaleRequest;
use App\Models\Device;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleService
{
    public function __construct(
        private Sale $repository,
        private Device $device
    ) {
    }

    public function allProcessed(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->processed()
            ->get();
    }

    public function allIntegrated(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->integrated()
            ->get();
    }

    public function store(SaleRequest $request)
    {
        $data = $request->all();



        return DB::transaction(
            function () use ($data) {
                $sale = $this->repository->create($data);

                $this->createItem($sale, $data['items']);
                $this->createPayment($sale, $data['payments']);

                return $sale;
            }
        );
    }

    private function createItem(Sale $sale, array $items)
    {
        foreach ($items as $item) {
            $item['desc'] = $item['descReal'];

            $sale->items()->create($item);
        }
    }

    private function createPayment(Sale $sale, array $payments)
    {
        $sale->payments()->createMany($payments);
    }
}
