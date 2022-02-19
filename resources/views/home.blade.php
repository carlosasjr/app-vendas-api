@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Empresas') }}</div>

                <div class="card-body">

                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Nova Empresa</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cnpj</th>
                                <th scope="col">Licenças</th>
                                <th scope="col">Utilizadas</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->cnpj }}</td>
                                <td>{{ $company->license }}</td>
                                <td>{{ $company->license_used }}</td>
                                <td>{{ $company->block == false ? 'Ativa' : 'Inativa' }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" >
                                       <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('companies.devices', $company->id) }}">
                                        <i class="fa fa-tablet" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
