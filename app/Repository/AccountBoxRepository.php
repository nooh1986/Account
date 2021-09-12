<?php


namespace App\Repository;


use App\Models\Box;
use App\Models\Invoice;
use App\Models\Customer;
use App\Interfaces\AccountBoxRepositoryInterface;

class AccountBoxRepository implements AccountBoxRepositoryInterface 
{
    public function invoice()
    {
        $boxes = Box::pluck('id' , 'name');
        return view('AccountBox.account' , compact('boxes'));
    }

    public function invoice_box($request)
    {
        if($request->type == 0)
        {
            if($request->from == '' && $request->to == '')
            {
                $boxes = Box::pluck('id' , 'name');
                $box  = $request->box_id;
                $type = $request->type;
                $invoices = Invoice::where('type' , 0)->where('box_id' , $request->box_id)->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices'));
            }

            else
            {
                $from     = date($request->from);
                $to       = date($request->to);
                $boxes    = Box::pluck('id' , 'name');
                $box      = $request->box_id;
                $type     = $request->type;
                $invoices = Invoice::where('type' , 0)->where('box_id' , $request->box_id)->whereBetween('date',[$from , $to])->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
            }
        }

        elseif($request->type == 1)
        {
            if($request->from == '' && $request->to == '')
            {
                $boxes = Box::pluck('id' , 'name');
                $box  = $request->box_id;
                $type = $request->type;
                $invoices = Invoice::where('type' , 1)->where('box_id' , $request->box_id)->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices'));
            }

            else
            {
                $from     = date($request->from);
                $to       = date($request->to);
                $boxes    = Box::pluck('id' , 'name');
                $box      = $request->box_id;
                $type     = $request->type;
                $invoices = Invoice::where('type' , 1)->where('box_id' , $request->box_id)->whereBetween('date',[$from , $to])->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
            }
        }

        else
        {
            if($request->from == '' && $request->to == '')
            {
                $boxes = Box::pluck('id' , 'name');
                $box  = $request->box_id;
                $type = $request->type;
                $invoices = Invoice::where('box_id' , $request->box_id)->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices'));
            }

            else
            {
                $from     = date($request->from);
                $to       = date($request->to);
                $boxes    = Box::pluck('id' , 'name');
                $box      = $request->box_id;
                $type     = $request->type;
                $invoices = Invoice::where('box_id' , $request->box_id)->whereBetween('date',[$from , $to])->get();
                return view('AccountBox.accounts' , compact('boxes' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
            }
        }
    }


    public function profits()
    {
        $boxes = Box::pluck('id' , 'name');
        return view('AccountBox.profits' , compact('boxes'));
    }

    public function profit_box($request)
    {
        if($request->box_id == 0)
        {
            if($request->from == '' && $request->to == '')
            {
                $box   = $request->box_id;
                $boxes = Box::pluck('id' , 'name');
                $pay   = Invoice::where('type' , 0)->sum('credit');
                $catch = Invoice::where('type' , 1)->sum('debt');
                return view('AccountBox.profits' , compact('boxes' , 'pay' , 'catch' , 'box'));
            }

            else
            {
                $from  = date($request->from);
                $to    = date($request->to);
                $box   = $request->box_id;
                $boxes = Box::pluck('id' , 'name');
                $pay   = Invoice::where('type' , 0)->whereBetween('date',[$from , $to])->sum('credit');
                $catch = Invoice::where('type' , 1)->whereBetween('date',[$from , $to])->sum('debt');
                return view('AccountBox.profits' , compact('boxes' , 'pay' , 'catch' , 'box' ,'from' , 'to'));
            }
        }

        else
        {
            if($request->from == '' && $request->to == '')
            {
                $box   = $request->box_id;
                $boxes = Box::pluck('id' , 'name');
                $pay   = Invoice::where('type' , 0)->where('box_id' , $request->box_id)->sum('credit');
                $catch = Invoice::where('type' , 1)->where('box_id' , $request->box_id)->sum('debt');
                return view('AccountBox.profits' , compact('boxes' , 'pay' , 'catch' , 'box'));
            }

            else
            {
                $from  = date($request->from);
                $to    = date($request->to);
                $box   = $request->box_id;
                $boxes = Box::pluck('id' , 'name');
                $pay   = Invoice::where('type' , 0)->where('box_id' , $request->box_id)->whereBetween('date',[$from , $to])->sum('credit');
                $catch = Invoice::where('type' , 1)->where('box_id' , $request->box_id)->whereBetween('date',[$from , $to])->sum('debt');
                return view('AccountBox.profits' , compact('boxes' , 'pay' , 'catch' , 'box' ,'from' , 'to'));
            }
        }
         
    }


    public function invoice_customer()
    {
        $customers = Customer::pluck('id' , 'name');
        $boxes = Box::pluck('id' , 'name');
        return view('AccountCustomers.account' , compact('boxes' , 'customers'));
    }

    public function customer_invoice($request)
    {
        if($request->type == 0)
        {
            if($request->box_id == 0)
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 0)->where('customer_id' , $customer)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 0)->where('customer_id' , $customer)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }

            else
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 0)->where('customer_id' , $customer)->where('box_id' , $box)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 0)->where('customer_id' , $customer)->where('box_id' , $box)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }
        }

        elseif($request->type == 1)
        {
            if($request->box_id == 0)
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 1)->where('customer_id' , $customer)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 1)->where('customer_id' , $customer)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }

            else
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 1)->where('customer_id' , $customer)->where('box_id' , $box)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('type' , 1)->where('customer_id' , $customer)->where('box_id' , $box)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }
        }

        else
        {
            if($request->box_id == 0)
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('customer_id' , $customer)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('customer_id' , $customer)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }

            else
            {
                if($request->from == '' && $request->to == '')
                {
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('customer_id' , $customer)->where('box_id' , $box)->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices'));
                }

                else
                {
                    $from      = date($request->from);
                    $to        = date($request->to);
                    $boxes     = Box::pluck('id' , 'name');
                    $customers = Customer::pluck('id' , 'name');
                    $customer  = $request->customer_id;
                    $box       = $request->box_id;
                    $type      = $request->type;
                    $invoices  = Invoice::where('customer_id' , $customer)->where('box_id' , $box)->whereBetween('date',[$from , $to])->get();
                    return view('AccountCustomers.accounts' , compact('boxes' , 'customers' , 'customer' , 'box' , 'type' , 'invoices' , 'from' , 'to'));
                }
            }
        }
    }


}    



            