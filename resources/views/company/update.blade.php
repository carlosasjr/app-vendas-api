@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Empresa ') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('companies.update', $company->id) }}">
                        @csrf
                        @method('PUT')
                        @include('company.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
