<?php

namespace App\Services;

use App\Http\Requests\UpdateCreateCompanyRequest;
use App\Models\Company;
use App\Models\Device;

class CompanyService
{
    public function __construct(
        private Company $repository,
        private Device $device
    ) {
    }

    public function all()
    {
        return $this->repository->get();
    }

    public function store(UpdateCreateCompanyRequest $request)
    {
        $data = $request->all();

        $data['block'] = isset($data['block']) ? true : false;

        $company = $this->repository->create($data);

        return $company;
    }

    public function companyByID($id)
    {
        return $this->repository->findOrFail($id);
    }

    public function update(UpdateCreateCompanyRequest $request, $id)
    {
        $data = $request->validated();

        $data['block'] = isset($data['block']) ? true : false;

        $company = $this->companyByID($id);

        $company->update($data);

        return $company;
    }

    public function devices($id)
    {
        $company = $this->repository->with('devices')->findOrFail($id);

        return $company;
    }

    public function destroyDevice($companyId, $id)
    {
        $company = $this->companyByID($companyId);

        if ($company) {
            $device = $this->device->findOrFail($id);

            $device->delete();
        }

        return $company;
    }
}
