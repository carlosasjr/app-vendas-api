<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCreateCompanyRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $repository
    ) {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = $this->repository->all();

        return view('home', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(UpdateCreateCompanyRequest $request)
    {
        $this->repository->store($request);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $company = $this->repository->companyByID($id);

        return view('company.update', compact('company'));
    }


    public function update(UpdateCreateCompanyRequest $request, $id)
    {
        $this->repository->update($request, $id);

        return redirect()->route('home');
    }

    public function devices($id)
    {
        $company = $this->repository->devices($id);

        return view('company.devices', compact('company'));
    }

    public function destroyDevice($companyId, $id)
    {
        $company = $this->repository->destroyDevice($companyId, $id);

        return redirect()->route('home');
    }
}
