@extends('layouts.master')

@section('title')
    إضافه صندوق
@stop

@section('css')
    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">إضافه صندوق</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item active">إضافه صندوق</li>
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
                
                <form action="{{ route('Box.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
    
                    <div class="modal-body">
                        <div class="col">
                            <label class="mr-sm-2">اسم الصندوق:</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">كود الصندوق:</label>
                            <input type="text" name="code" class="form-control">
                            @error('code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">ملاحظات:</label>
                            <textarea name="notes" class="form-control"></textarea>
                        </div><br>

                        <div class="col">
                            <label class="mr-sm-2">صورة:</label>
                            <input type="file" name="image" onchange="loadFile(event)">
                            <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                        </div><br>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button x-small" type="submit">حفظ</button>
                    </div>
    
                </form> 
                
            </div>
          
@endsection

@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>	
@endsection




            
            