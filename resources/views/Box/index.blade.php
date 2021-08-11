@extends('layouts.master')

@section('title')
    الصناديق
@stop

@section('css')
    @toastr_css
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">الصناديق</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item active">الصناديق</li>
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
                <button type="button" class="button x-small"><a href="{{ route('Box.create') }}">
                    إضافه صندوق
                </a></button>
                <br><br>

                
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>صورة الصندوق</th>
                                <th>اسم الصندوق</th>
                                <th>كود الصندوق</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($boxes as $box)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>
                                        @if($box->image)
                                            <img src="{{ URL::asset('image/'. $box->image) }}" height="50px" width="50px">
                                        @else
                                            <img src="{{ URL::asset('image/account.jpg') }}" height="50px" width="50px">
                                        @endif
                                    </td>

                                    <td>{{ $box->name }}</td>

                                    <td>{{ $box->code }}</td>
                                    
                                    <td>{{ ($box->notes == '' ? '-' : $box->notes) }}</td>
                                                                        
                                    <td>
                                        <a href="{{ route('Box.edit' , $box->id) }}" class="btn btn-info btn-sm" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a> 
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $box->id }}"
                                            title="حذف"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                @include('box.delete')

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