<?php

namespace App\Interfaces;


interface AccountBoxRepositoryInterface
{
    public function invoice();

    public function profits();

    public function invoice_customer();

    public function profits_customer();
}