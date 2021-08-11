<?php

namespace App\Repository;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface 
{
    public function index()
    {
        $customers = Customer::all();
        return view('Customer.index' , compact('customers'));
    }


    public function create()
    {
        return view('Customer.create');
    }



    public function store($request)
    {
        try
        {
            $data['name']     = $request->name;
            $data['email']    = $request->email;
            $data['phone']    = $request->phone;
            $data['password'] = $request->phone;
            $data['address']  = $request->address;
            $data['notes']    = $request->notes;

            Customer::create($data);

            toastr()->success('تم حفظ البيانات بنجاح');
            return redirect()->route('Customer.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $customer = Customer::findorfail($id);
        return view('Customer.edit' , compact('customer'));
    }

    public function update($request)
    {
        try
        {
            $customer = Customer::findorfail($request->id);

            $data['name']     = $request->name;
            $data['email']    = $request->email;
            $data['phone']    = $request->phone;
            $data['password'] = $request->password;
            $data['address']  = $request->address;
            $data['notes']    = $request->notes;

            $customer->update($data);

            toastr()->success('تم تعديل البيانات بنجاح');
            return redirect()->route('Customer.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try
        {
            Customer::findorfail($request->id)->delete();

            toastr()->error('تم حذف البيانات بنجاح');
            return redirect()->route('Customer.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}  