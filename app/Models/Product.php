<?php

namespace App\Models;

use App\Traits\FilterDataLastSync;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasCompany;
    use FilterDataLastSync;

    protected $fillable = [
        'company_id',
        'code_erp',
        'description',
        'price',
        'stock',
        'inative'
    ];
}
