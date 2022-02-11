<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'form_payment_id',
        'condition_payment_id',
        'price'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function formPayment()
    {
        return $this->belongsTo(FormPayment::class);
    }

    public function conditionPayment()
    {
        return $this->belongsTo(ConditionPayment::class);
    }
}
