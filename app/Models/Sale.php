<?php

namespace App\Models;

use App\Traits\FilterDataLastSync;
use App\Traits\HasCompany;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    use HasCompany;
    use FilterDataLastSync;

    const PROCESSED = 'Processado';
    const INTEGRATED = 'Integrado';

    protected $fillable = [
        'company_id',
        'seller_id',
        'client_id',
        'total',
        'uuid',
        'code_erp',
        'status'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function payments()
    {
        return $this->hasMany(SalePayment::class);
    }

    public function scopeProcessed($query)
    {
        return  $query->where('status', $this::PROCESSED);
    }

    public function scopeIntegrated($query)
    {
        return  $query->where('status', $this::INTEGRATED);
    }
}
