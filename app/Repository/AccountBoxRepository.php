<?php


namespace App\Repository;


use App\Models\Box;
use App\Interfaces\AccountBoxRepositoryInterface;


class AccountBoxRepository implements AccountBoxRepositoryInterface 
{
    public function invoice()
    {
        $boxes = Box::pluck('id' , 'name');
        return view('AccountBox.account' , compact('boxes'));
    }


    public function profits()
    {
        return view('AccountBox.profits');
    }


    public function invoice_customer()
    {
        $boxes = Box::pluck('id' , 'name');
        return view('AccountBox.account' , compact('boxes'));
    }


    public function profits_customer()
    {
        return view('AccountCustomers.profits');
    }
}    



            