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
                <li class="breadcrumb-item">حسابات الصناديق</li>
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
                
                <form action="{{ route('profit_box') }}" method="POST" autocomplete="off">
                    @csrf
    
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-4">
                                <label for="inputName" class="mr-sm-2">اسم الصندوق:</label>
                                <select name="box_id" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    <option value="0">كل الصناديق</option>
                                    @foreach ($boxes as $name => $id)
                                        <option value="{{ $id }}"> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-4">
                                <label class="mr-sm-2">من تاريخ:</label>
                                <input type="date" name="from" class="form-control" value="{{ $from ?? '' }}">
                            </div>
                            <br>
        
                            <div class="col-4">
                                <label class="mr-sm-2">إلى تاريخ:</label>
                                <input type="date" name="to" class="form-control" value="{{ $to ?? '' }}">
                            </div>
                            <br>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">بحث</button>
                    </div>
    
                </form> 
                <br> 
                
            @if (isset($pay))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered p-0" style="text-align: center">
                        <thead>
                            <tr>
                                <th>المبلغ المقبوض</th>
                                <th>المبلغ المدفوع</th>
                                <th>صافي الربح</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $catch }}</td>
                                <td>{{ $pay }}</td>
                                <td>{{ $catch - $pay }}</td>
                            </tr>
                        </tbody>    
                    </table>
                </div> 
                          
            </div>
            @endif 
          
@endsection

@section('js')
    
@endsection