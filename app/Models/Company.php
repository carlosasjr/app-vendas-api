<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['cnpj', 'name', 'license', 'license_used', 'block'];

    protected $append = ['license_available'];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function scopeCnpj($query, string $cnpj)
    {
        return $query->where('cnpj', $cnpj);
    }

    public function getLicenseAvailableAttribute()
    {
        return $this->attributes['license'] - $this->attributes['license_used'];
    }
}
