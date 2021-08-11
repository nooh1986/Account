@extends('layouts.master')

@section('title')
    إضافيه عميل
@stop

@section('css')
    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">إضافه عميل</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item active">إضافه عميل</li>
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
                
                <form action="{{ route('Customer.store') }}" method="POST" autocomplete="off">
                    @csrf
    
                    <div class="modal-body">
                        <div class="col">
                            <label class="mr-sm-2">اسم العميل:</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">البريد الإلكتروني:</label>
                            <input type="email" name="email" class="form-control" >
                            @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">رقم الهاتف:</label>
                            <input type="tel" name="phone" class="form-control">
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">العنوان:</label>
                            <textarea name="address" class="form-control"></textarea>
                            @error('address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">ملاحظات:</label>
                            <textarea name="notes" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">حفظ</button>
                    </div>
    
                </form> 
                
            </div>
          
@endsection

@section('js')
    
@endsection

