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
        <div class="card card-statistics h-100">    
            <div class="card-body">   
                <h5 class="card-title">تفاصيل الفاتوره</h5>
                <div class="tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">معلومات الفاتوره</a></li>
                        <li class="nav-item"><a class="nav-link" id="attachments-tab" data-toggle="tab" href="#attachments" role="tab" aria-controls="attachments" aria-selected="false">تفاصيل الفاتورة</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">المرفقات</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>رقم الفاتوره</th>
                                            <th>اسم الصندوق</th>
                                            <th>اسم العميل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
            
                                            <td>{{ $invoice->box->name }}</td>
            
                                            <td>{{ ($invoice->customer_id == '' ? '-' : $invoice->customer->name) }}</td>
                                              
                                        </tr>
                                            
                                    </tbody>
            
                                </table>
                            
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>تاريخ الفاتوره</th>
                                            <th>نوع الفاتورة</th>
                                            <th>المبلغ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>{{ $invoice->date }}</td>
            
                                            <td>{{ ($invoice->type == '0' ? 'دفع' : 'قبض' ) }}</td>
            
                                            <td>{{ ($invoice->credit == '0' ? $invoice->debt : $invoice->credit ) }}</td>
                                                       
                                        </tr>
            
                                    </tbody>
            
                                </table>
                            
                            </div>
                        </div>

                        <div class="tab-pane fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
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

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                    style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>1</td>
                                                        
                                            <td>{{ ($invoice->image == '' ? '-' : $invoice->image) }}</td>
                                            
                                            <td>
                                                <a href="{{ route('download' , $invoice->image) }}" class="btn btn-info btn-sm" title="تعديل"><i class="fa fa-edit"></i></a> 
                                                
                                                <a href="#" class="btn btn-primary btn-sm" title="عرض"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
            
                                </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>  
    
@endsection





@section('js')
    @toastr_js
    @toastr_render
@endsection