<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">لوحه التحكم</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">برنامج الحساب </li>

                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">الصناديق</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Box.index') }}">عرض الصناديق</a></li>
                            <li><a href="{{ route('Box.create') }}">إضافه صندوق</a></li>
                        </ul>
                    </li>

                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">العملاء</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Customer.index') }}">عرض العملاء</a></li>
                            <li><a href="{{ route('Customer.create') }}">إضافه عميل</a></li>
                        </ul>
                    </li>

                    <!-- menu item todo-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#todo">
                            <div class="pull-left"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">الفواتير</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="todo" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Invoice.index') }}">عرض الفواتير</a></li>
                            <li><a href="{{ route('Invoice.create') }}">إضافه فاتوره</a></li>
                        </ul>
                    </li>
                                       
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i>
                                <span class="right-nav-text">حسابات الصناديق</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">فواتير الدفع</a> </li>
                            <li> <a href="chart-morris.html">فواتير القبض </a> </li>
                            <li> <a href="chart-sparkline.html">جميع الفواتير</a> </li>
                            <li> <a href="chart-sparkline.html">الأرباح</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i>
                                <span class="right-nav-text">حسابات العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">فواتير الدفع</a> </li>
                            <li> <a href="chart-morris.html">فواتير القبض </a> </li>
                            <li> <a href="chart-sparkline.html">جميع الفواتير</a> </li>
                            <li> <a href="chart-sparkline.html">الأرباح</a> </li>
                        </ul>
                    </li>
                   
                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font
                                    icon</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>
                                  
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================