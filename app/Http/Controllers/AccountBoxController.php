<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoxAccountRequest;
use App\Http\Requests\ProfitAccountRequest;
use App\Http\Requests\CustomerAccountRequest;
use App\Interfaces\AccountBoxRepositoryInterface;

class AccountBoxController extends Controller
{
    private $AccountBox;

    public function __construct(AccountBoxRepositoryInterface $AccountBox)
    {
        $this->AccountBox = $AccountBox;
    }


    public function invoice()
    {
        return $this->AccountBox->invoice();
    }


    public function invoice_box(BoxAccountRequest $request)
    {
        return $this->AccountBox->invoice_box($request);
    }


    public function profits()
    {
        return $this->AccountBox->profits();
    }


    public function profit_box(ProfitAccountRequest $request)
    {
        return $this->AccountBox->profit_box($request);
    }


    public function invoice_customer()
    {
        return $this->AccountBox->invoice_customer();
    }


    public function customer_invoice(CustomerAccountRequest $request)
    {
        return $this->AccountBox->customer_invoice($request);
    }
    
   
}
