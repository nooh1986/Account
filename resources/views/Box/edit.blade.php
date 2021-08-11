@extends('layouts.master')

@section('title')
    تعديل معلومات الصندوق
@stop

@section('css')
    
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تعديل معلومات الصندوق</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                <li class="breadcrumb-item">الصناديق</li>
                <li class="breadcrumb-item active">تعديل معلومات الصندوق</li>
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
                
                <form action="{{ route('Box.update' , 'test') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <input type="hidden" name="id" value="{{ $box->id }}">

                    <div>
                        @if($box->image)
                            <img style="border-radius:20%"
                                 src="{{URL::asset('image/'. $box->image)}}" height="150px" width="150px" alt="$box->name">
                        @endif
                    </div>
                    <br><br>
    
                    <div class="modal-body">
                        <div class="col">
                            <label class="mr-sm-2">اسم الصندوق:</label>
                            <input type="text" name="name" class="form-control" value="{{ $box->name }}">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                        <div class="col">
                            <label class="mr-sm-2">مود الصندوق:</label>
                            <input type="text" name="code" class="form-control" value="{{ $box->code }}">
                            @error('code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div><br>
    
                          
                        <div class="col">
                            <label class="mr-sm-2">ملاحظات:</label>
                            <textarea name="notes" class="form-control">{{ $box->notes }}</textarea>
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


