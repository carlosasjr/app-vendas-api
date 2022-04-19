<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'qtd',
        'price',
        'desc',
        'totalItem',
        'observation'
    ];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = Helper::replaceDecimal($value);
    }

    public function setQtdAttribute($value)
    {
        $this->attributes['qtd'] = Helper::replaceDecimal($value);
    }
}
