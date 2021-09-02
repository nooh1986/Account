@extends('layouts.master')

@section('title')
    الأرباح
@stop

@section('css')
    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">الأرباح</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item">حسابات العملاء</li>
                <li class="breadcrumb-item active">الأرباح</li>
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
                        <div class="row" style="justify-content: center;">
                                    
                            <div class="col-4">
                                <label class="mr-sm-2">من تاريخ:</label>
                                <input type="date" name="from" class="form-control" >
                            </div>
                            <br>
        
                            <div class="col-4">
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