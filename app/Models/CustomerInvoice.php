<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Detail;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function detail()
    {
        return $this->hasOne(Detail::class);
    }

}
