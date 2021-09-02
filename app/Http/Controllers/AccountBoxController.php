<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function profits()
    {
        return $this->AccountBox->profits();
    }


    public function invoice_customer()
    {
        return $this->AccountBox->invoice_customer();
    }

    public function profits_customer()
    {
        return $this->AccountBox->profits_customer();
    }
}
