<?php

namespace App\Interfaces;


interface AccountBoxRepositoryInterface
{
    public function invoice();

    public function invoice_box($request);

    public function profits();

    public function profit_box($request);

    public function invoice_customer();

    public function customer_invoice($request);
   
}