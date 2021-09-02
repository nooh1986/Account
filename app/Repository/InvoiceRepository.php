<?php

namespace App\Repository;

use App\Models\Box;
use App\Models\Detail;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\CustomerInvoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\Interfaces\InvoiceRepositoryInterface;

class InvoiceRepository implements InvoiceRepositoryInterface 
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('Invoice.index' , compact('invoices'));
    }


    public function create()
    {
        $customers = Customer::pluck('id' , 'name');
        $boxes = Box::pluck('id' , 'name');
        return view('Invoice.create' , compact('customers' , 'boxes'));
    }

    public function store($request)
    {

        DB::beginTransaction();
        try
        {
            if($request->type == 0)
            {
                $data['box_id']      = $request->box_id;
                $data['customer_id'] = $request->customer_id;
                $data['type']        = $request->type;
                $data['date']        = $request->date;
                $data['credit']      = $request->amount;
                $data['debt']        = 0;
                $data['notes']       = $request->notes;

                if($request->image != '')
                {
                    $NameFile = uploadFile($request->image , "image/Invoices");
                    $data['image'] = $NameFile;
                }    
                
                $invoice = Invoice::create($data);

                if($request->customer_id != 0)
                {
                    $data1['box_id']      = $request->box_id;
                    $data1['customer_id'] = $request->customer_id;
                    $data1['type']        = $request->type;
                    $data1['date']        = $request->date;
                    $data1['credit']      = 0;
                    $data1['debt']        = $request->amount;
                    $data1['notes']       = $request->notes;

                    if($request->image != '')
                    {
                        $data1['image'] = $NameFile;
                    }    
                    
                    $customerInvoice = CustomerInvoice::create($data1);

                }

            }

            else
            {
                $data['box_id']      = $request->box_id;
                $data['customer_id'] = $request->customer_id;
                $data['type']        = $request->type;
                $data['date']        = $request->date;
                $data['credit']      = 0;
                $data['debt']        = $request->amount;
                $data['notes']       = $request->notes;

                if($request->image != '')
                {
                    $NameFile = uploadFile($request->image , "image/Invoices");
                    $data['image'] = $NameFile;
                } 
                    
                $invoice =  Invoice::create($data);

                if($request->customer_id != 0)
                {
                    $data1['box_id']      = $request->box_id;
                    $data1['customer_id'] = $request->customer_id;
                    $data1['type']        = $request->type;
                    $data1['date']        = $request->date;
                    $data1['credit']      = $request->amount;
                    $data1['debt']        = 0;
                    $data1['notes']       = $request->notes;

                    if($request->image != '')
                    {
                        $data1['image'] = $NameFile;
                    } 

                    $customerInvoice = CustomerInvoice::create($data1);
                }
           
            }

            $details = $request->List_Details;

            foreach($details as $detail)
            {
                if($detail['name'] && $detail['type'] && $detail['count'] && $detail['price'] != null)
                {
                    $data2['name']                = $detail['name'];
                    $data2['type']                = $detail['type'];
                    $data2['count']               = $detail['count'];
                    $data2['price']               = $detail['price'];
                    $data2['total']               = $detail['count'] * $detail['price'];
                    $data2['box_id']              = $request->box_id;

                    if($request->customer_id != 0)
                    {
                        $data2['customer_id']         = $request->customer_id;
                        $data2['customer_invoice_id'] = $customerInvoice->id;
                    }
                        
                    $data2['invoice_id']          = $invoice->id;  

                    Detail::create($data2);

                }
                            
            }
                    
            DB::commit();

            toastr()->success('تم حفظ البيانات بنجاح');
            return redirect()->route('Invoice.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }    
          
    }


    public function show($id)
    {
        $invoice = Invoice::where('id' , $id)->first();
        $details = Detail::where('invoice_id' , $id)->get();
        return view('Invoice.show' , compact('details' , 'invoice'));
    }


    public function edit($id)
    {
        $invoice = Invoice::findorfail($id);
        $details = Detail::where('invoice_id', $id)->get();
        $customers = Customer::pluck('id' , 'name');
        $boxes = Box::pluck('id' , 'name');
        return view('Invoice.edit' , compact('customers' , 'boxes' , 'invoice' , 'details'));
    }


    public function update($request)
    {
        DB::beginTransaction();
        try
        {

            $invoice = Invoice::findorfail($request->id);

            if($request->type == 0)
            {
                $data['box_id']      = $request->box_id;
                $data['customer_id'] = $request->customer_id;
                $data['type']        = $request->type;
                $data['date']        = $request->date;
                $data['credit']      = $request->amount;
                $data['debt']        = 0;
                $data['notes']       = $request->notes;

                if($request->image != '')
                {
                    unlink('image/Invoices/' . $invoice->image);
                    $NameFile = uploadFile($request->image , "image/Invoices");
                    $data['image'] = $NameFile;
                }    
                
                $invoice->update($data);

                if($request->customer_id != 0)
                {
                    $data1['box_id']      = $request->box_id;
                    $data1['customer_id'] = $request->customer_id;
                    $data1['type']        = $request->type;
                    $data1['date']        = $request->date;
                    $data1['credit']      = 0;
                    $data1['debt']        = $request->amount;
                    $data1['notes']       = $request->notes;

                    if($request->image != '')
                    {
                        $data1['image'] = $NameFile;
                    }    

                    $customerInvoice = CustomerInvoice::findorfail($request->id);

                    $customerInvoice->update($data1);

                }

            }

            else
            {
                $invoice = Invoice::findorfail($request->id);

                $data['box_id']      = $request->box_id;
                $data['customer_id'] = $request->customer_id;
                $data['type']        = $request->type;
                $data['date']        = $request->date;
                $data['credit']      = 0;
                $data['debt']        = $request->amount;
                $data['notes']       = $request->notes;

                if($request->image != '')
                {
                    unlink('image/Invoices/' . $invoice->image);
                    $NameFile = uploadFile($request->image , "image/Invoices");
                    $data['image'] = $NameFile;
                } 
                    
                $invoice->update($data);

                if($request->customer_id != 0)
                {
                    $data1['box_id']      = $request->box_id;
                    $data1['customer_id'] = $request->customer_id;
                    $data1['type']        = $request->type;
                    $data1['date']        = $request->date;
                    $data1['credit']      = $request->amount;
                    $data1['debt']        = 0;
                    $data1['notes']       = $request->notes;

                    if($request->image != '')
                    {
                        $data1['image'] = $NameFile;
                    } 

                    $customerInvoice = CustomerInvoice::findorfail($request->id);

                    $customerInvoice->update($data1);
                }
           
            }

            $details = $request->List_Details;

            $detail = Detail::findordail($request->idd);

            foreach($details as $detail)
            {
                if($detail['name'] && $detail['type'] && $detail['count'] && $detail['price'] != null)
                {
                    $data2['name']                = $detail['name'];
                    $data2['type']                = $detail['type'];
                    $data2['count']               = $detail['count'];
                    $data2['price']               = $detail['price'];
                    $data2['total']               = $detail['count'] * $detail['price'];
                    $data2['box_id']              = $request->box_id;

                    if($request->customer_id != 0)
                    {
                        $data2['customer_id']         = $request->customer_id;
                        $data2['customer_invoice_id'] = $customerInvoice->id;
                    }
                        
                    $data2['invoice_id']          = $invoice->id;  

                    $detail->update($data2);
                }
                            
            }
                    
            DB::commit();

            toastr()->success('تم تعديل البيانات بنجاح');
            return redirect()->route('Invoice.index');
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
            $invoice = Invoice::findorfail($request->id);

            if($invoice->image != null)
            {
                unlink('image/Invoices/' . $invoice->image);
            }
            
            $invoice->delete();

            toastr()->error('تم حذف البيانات بنجاح');
            return redirect()->route('Invoice.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function download($id)
    {
        //(storage_path('/storage/app/files/'.$file));
        $path= Storage::disk('Images')->getDriver()->getAdapter()->applyPathPrefix('Invoices/'.$id);
        // $path = Storage::disk('Images');
        // $path = storage_path('app/public/image/Invoices/'.$id);
        return response()->download($path);
        
    }
}    



            