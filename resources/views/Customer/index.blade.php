@extends('layouts.master')

@section('title')
    العملاء
@stop

@section('css')
    @toastr_css
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">العملاء</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item active">العملاء</li>
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
                <button type="button" class="button x-small"><a href="{{ route('Customer.create') }}">
                    إضافه عميل
                </a></button>
                <br><br>
                
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>البريد الالكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>العنوان</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>{{ $customer->name }}</td>

                                    <td>{{ $customer->email }}</td>

                                    <td>{{ $customer->phone }}</td>

                                    <td>{{ $customer->address }}</td>
                                    
                                    <td>{{ ($customer->notes == '' ? '-' : $customer->notes) }}</td>
                                                                        
                                    <td>
                                        <a href="{{ route('Customer.edit' , $customer->id) }}" class="btn btn-info btn-sm" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>    
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $customer->id }}"
                                            title="حذف"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                @include('Customer.delete')
                                
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