@extends('layouts.master')

@section('title')
    الفواتير
@stop

@section('css')
    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">الفواتير</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item">حسابات العملاء</li>
                <li class="breadcrumb-item active">الفواتير</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
    @include('layouts.messages_alert')
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics">
            <div class="card-body">
                
                <form action="{{ route('customer_invoice') }}" method="POST" autocomplete="off">
                    @csrf
    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="inputName" class="mr-sm-2">اسم الصندوق:</label>
                                <select name="box_id" class="custom-select">
                                    <option value="0" >الكل</option>
                                    @foreach ($boxes as $name => $id)
                                        <option value="{{ $id }}" {{ $id == $box ? 'selected':"" }}> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-4">
                                <label for="inputName" class="mr-sm-2">اسم العميل:</label>
                                <select name="customer_id" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    @foreach ($customers as $name => $id)
                                        <option value="{{ $id }}" {{ $id == $customer ? 'selected':"" }}> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-4">
                                <label for="inputName" class="mr-sm-2">نوع الفاتوره:</label>
                                <select name="type" class="custom-select">
                                    <option value="0" {{ 0 == $type ? 'selected':"" }}>دفع</option>
                                    <option value="1" {{ 1 == $type ? 'selected':"" }}>قبض</option>
                                    <option value="2" {{ 2 == $type ? 'selected':"" }}>الكل</option>
                                </select>
                            </div>
                            <br>
                        </div>
                        <br>

                        <div class="row" style="justify-content: center;">
                            <div class="col-4">
                                <label class="mr-sm-2">من تاريخ:</label>
                                <input type="date" name="from" class="form-control" value="{{ $from ?? '' }}">
                            </div>
                            <br>
        
                            <div class="col-4">
                                <label class="mr-sm-2">إلى تاريخ:</label>
                                <input type="date" name="to" class="form-control" value="{{ $to ?? '' }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">بحث</button>
                    </div>
    
                </form> 
                <br>

                @if (isset($invoices))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" style="text-align: center">
                        <thead>
                            <tr>
                                <th>رقم الفاتوره</th>
                                <th>اسم الصندوق</th>
                                <th>اسم العميل</th>
                                <th>التاريخ</th>
                                <th>المبلغ</th>
                                <th>نوع الفاتوره</th>
                                <th>ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->box->name }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->date }}</td>
                                    <td>{{ ($invoice->credit == '0' ? $invoice->debt : $invoice->credit ) }}</td>
                                    <td>{{ ($invoice->type == '0' ? 'دفع' : 'قبض' ) }}</td>
                                    <td>{{ ($invoice->notes == '' ? '-' : $invoice->notes) }}</td>
                                </tr>
                            @endforeach
                        </tbody>    
                        
                    </table>
                </div>    
            </div>
            @endif
            
          
@endsection

@section('js')
    
@endsection