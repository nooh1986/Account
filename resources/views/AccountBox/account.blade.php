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
                <li class="breadcrumb-item">حسابات الصناديق</li>
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
                
                <form action="{{ route('invoice_box') }}" method="POST" autocomplete="off">
                    @csrf
    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <label for="inputName" class="mr-sm-2">اسم الصندوق:</label>
                                <select name="box_id" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    @foreach ($boxes as $name => $id)
                                        <option value="{{ $id }}"> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-3">
                                <label for="inputName" class="mr-sm-2">نوع الفاتوره:</label>
                                <select name="type" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    <option value="0">دفع</option>
                                    <option value="1">قبض</option>
                                    <option value="2">الكل</option>
                                </select>
                            </div>
                            <br>
        
                            <div class="col-3">
                                <label class="mr-sm-2">من تاريخ:</label>
                                <input type="date" name="from" class="form-control" >
                            </div>
                            <br>
        
                            <div class="col-3">
                                <label class="mr-sm-2">إلى تاريخ:</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">بحث</button>
                    </div>
    
                </form> 
                
            </div>    
        
    
@endsection

@section('js')

    
@endsection