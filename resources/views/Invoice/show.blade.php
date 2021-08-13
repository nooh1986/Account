@extends('layouts.master')

@section('title')
    تفاصيل الفاتوره
@stop

@section('css')
    @toastr_css
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تفاصيل الفاتوره</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item">الفواتير</li>
                <li class="breadcrumb-item active">تفاصيل الفاتوره</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection


@section('content')
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics">
            <div class="card-body">
                <button type="button" class="button x-small"><a href="{{ route('Invoice.index') }}">
                    الفواتير
                </a></button>
                <br><br>

                
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>النوع</th>
                                <th>العدد</th>
                                <th>السعر</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $detail->name }}</td>

                                    <td>{{ $detail->type }}</td>

                                    <td>{{ $detail->count }}</td>

                                    <td>{{ $detail->price }}</td>  
                                    
                                    <td>{{ $detail->total }}</td> 
                                    
                                </tr>
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