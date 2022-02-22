<?php

namespace App\Services;

use App\Http\Requests\Api\CompanyDeviceRequest;
use App\Http\Requests\Api\SaleRequest;
use App\Http\Requests\Api\CompanyCnpjRequest;
use App\Http\Requests\Api\SaleProcessedRequest;
use App\Models\Device;
use App\Models\Sale;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Enum\Status;


class SaleService
{
    public function __construct(
        private Sale $repository,
        private Device $device,
        private Company $company
    ) {
    }

    public function allProcessed(CompanyDeviceRequest $request)
    {
        $device = $this->device->where('name', $request->get('device'))->first();

        return $this->repository
            ->dataSync($device->sync)
            ->status(Status::PROCESSED)
            ->get();
    }

    public function allIntegrated(CompanyCnpjRequest $request)
    {
        $data = $request->all();

        return $this->repository
            ->status(Status::INTEGRATED)
            ->get();
    }

    public function processed(SaleProcessedRequest $request, string $uuid)
    {
        $data = $request->all();

        $sale = $this->repository->where('uuid', $uuid)->first();

        $sale->status = Status::PROCESSED;
        $sale->code_erp = $data['code_erp'];
        $sale->save();

        return $sale;
    }

    public function fail(CompanyCnpjRequest $request, string $uuid)
    {
        $sale = $this->repository->where('uuid', $uuid)->first();

        $sale->status = Status::FAIL;
        $sale->save();

        return $sale;
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
