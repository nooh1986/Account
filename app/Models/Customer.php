<?php

namespace App\Models;

use App\Models\Detail;
use App\Models\CustomerInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function customerInvoices()
    {
        return $this->hasMany(CustomerInvoice::class);
    }
}
