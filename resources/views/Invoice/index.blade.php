@extends('layouts.master')

@section('title')
    الفواتير
@stop

@section('css')
    @toastr_css
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
                <button type="button" class="button x-small"><a href="{{ route('Invoice.create') }}">
                    إضافه فاتوره
                </a></button>
                <br><br>

                
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>رقم الفاتوره</th>
                                <th>اسم الصندوق</th>
                                <th>اسم العميل</th>
                                <th>نوع الفاتوره</th>
                                <th>المبلغ</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>

                                    <td>{{ $invoice->box->name }}</td>

                                    <td>{{ ($invoice->customer_id == '' ? '-' : $invoice->customer->name) }}</td>

                                    <td>{{ ($invoice->type == '0' ? 'قبض' : 'دفع' ) }}</td>
                                    
                                    <td>{{ ($invoice->credit == '0' ? $invoice->dept : $invoice->credit ) }}</td>

                                    <td>{{ ($invoice->notes == '' ? '-' : $invoice->notes) }}</td>
                                                                        
                                    <td>
                                        <a href="{{ route('Invoice.edit' , $invoice->id) }}" class="btn btn-info btn-sm" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a> 
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $invoice->id }}"
                                            title="حذف"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                @include('Invoice.delete')

                            @endforeach

                        </tbody>

                    </table>
                   
                </div>
            </div>
          
@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection