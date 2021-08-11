@extends('layouts.master')

@section('title')
    إضافه فاتوره
@stop

@section('css')
    <style>
        #detail
        {
            display:none;
        }
    </style>    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">إضافه فاتوره</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item active">إضافه فاتوره</li>
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
                
                <form action="{{ route('Invoice.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
    
                    <div class="modal-body">
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="mr-sm-2">اسم الصندوق:</label>
                                <select name="box_id" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    @foreach ($boxes as $name => $id)
                                        <option value="{{ $id }}"> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        

                            <div class="col">
                                <label for="inputName" class="mr-sm-2">اسم العميل:</label>
                                <select name="customer_id" class="custom-select">
                                    <option value="0" selected disabled>--- اختر ---</option>
                                    @foreach ($customers as $name => $id)
                                        <option value="{{ $id }}"> {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            
                            <div class="col">
                                <label for="inputName" class="mr-sm-2">نوع الفاتوره:</label>
                                <select name="type" class="custom-select">
                                    <option value="" selected disabled>--- اختر ---</option>
                                    <option value="0">دفع</option>
                                    <option value="1">قبض</option>
                                </select>
                            </div>
                            <br>

                        </div>
                        <br>

                        <div class="row">

                            <div class="col-4">
                                <label class="mr-sm-2">تاريخ الفاتوره :</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <br>
                        
                            <div class="col-4">
                                <label class="mr-sm-2">قيمه الفاتوره :</label>
                                <input type="number" name="amount" class="form-control">
                            </div>
                            <br>

                            
                            <div class="col-4">
                                <label class="mr-sm-2">صورةالفاتوره:</label>
                                <input type="file" name="image">
                            </div>
                            <br>

                        </div>
                        <br>


                        <div class="row">

                            <div class="col">
                                <label class="mr-sm-2">ملاحظات:</label>
                                <textarea name="notes" class="form-control"></textarea>
                            </div>
                            
                        </div>

                        <br>

                        <div class="row">

                            <div class="col-3">
                                <button id="details" type="button" class="button x-small">إضافه تفاصيل الفاتوره</button>
                            </div>
                            
                        </div>
                        <br>

                        <div id="detail" class="repeater">
                            <div data-repeater-list="List_Details">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">الاسم:</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">النوع:</label>
                                            <input class="form-control" type="text" name="type">
                                        </div>

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">العدد:</label>
                                            <input class="form-control" type="number" name="count">
                                        </div>

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">السعر:</label>
                                            <input class="form-control" type="number" name="price">
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">حذف تفصيل:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="حذف تفصيل" />
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="إضافه تفصيل"/>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">حفظ</button>
                    </div>
    
                </form> 
                
            </div>
          
@endsection



@section('js')
    <script>

        $('#details').click(function(){
            $('#detail').toggle();
        });

    </script>    
@endsection