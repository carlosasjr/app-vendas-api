<?php

namespace App\Models;

use App\Traits\FilterDataLastSync;
use App\Traits\HasCompany;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\Status;

class Sale extends Model
{
    use HasFactory;
    use HasCompany;
    use FilterDataLastSync;

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

    public function scopeStatus($query, $status)
    {
        return  $query->where('status', $status);
    }


    public function scopeBySeller($query, $id)
    {
        return $query->where('seller_id', $id);
    }
}
