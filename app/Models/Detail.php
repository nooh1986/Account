<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\CustomerInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model
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

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function customerInvoice()
    {
        return $this->belongsTo(CustomerInvoice::class);
    }


}
