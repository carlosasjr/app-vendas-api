<?php

namespace App\Models;

use App\Traits\FilterDataSync;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use HasCompany;
    use FilterDataSync;

    protected $fillable = [
        'company_id',
        'name',
        'fantasy',
        'fj',
        'cpf_cnpj',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'cep',
        'uf',
        'telephone',
        'cellphone',
        'email',
        'inative'
    ];
}
