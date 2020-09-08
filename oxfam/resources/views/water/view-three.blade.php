@extends('layouts.master')

@section('content')

    <div class="page-wrapper">
        <div class="page-wrapper-row">
            <div class="page-wrapper-top">
                <!-- BEGIN HEADER -->
                <div class="page-header">
                    <!-- BEGIN HEADER TOP -->
                    <div class="page-header-top">
                        <div class="container">
                            <h2 style="text-align: center">Water Voucher System Update</h2>
                        </div>
                    </div>
                    <!-- END HEADER TOP -->
                    <!-- BEGIN HEADER MENU -->
                    <div class="page-header-menu">

                        <div class="container">

                            <div class="hor-menu  ">
                                <ul class="nav navbar-nav">
                                    @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                                            <a href="{{ route('dashboard') }}"> Dashboard
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="{{ route('view-two') }}"> Beneficiaries
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="{{ route('view-three') }}"> Water Voucher
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="{{ route('view-four') }}"> Vendors
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="{{ route('view-five') }}"> Field Officer
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                        @if(Auth::user()->type == 1)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage Distribution Areas
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a style="display: block;color: white;text-decoration:none" class="dropdown-item address" href="{{ route('view-six') }}">Address</a>
                                                    <a style="display: block;color: white;text-decoration:none" class="dropdown-item address" href="{{ route('view-seven') }}">Area</a>
                                                    <a style="display: block;color: white;text-decoration:none" class="dropdown-item address" href="{{ route('view-eight') }}">Section</a>
                                                </div>
                                            </li>
                                        @endif

                                </ul>
                            </div>
                            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu pull-left" role="menu" >
                                            <li>
                                                @if(Auth::check())
                                                    <a  style="color: darkblue;" href=" {{ route('logout') }}"> logout</a>

                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <!-- END MEGA MENU -->
                        </div>
                    </div>
                    <!-- END HEADER MENU -->
                </div>
                <!-- END HEADER -->
            </div>
        </div>
        <div class="page-wrapper-row full-height">
            <div class="page-wrapper-middle">
                <!-- BEGIN CONTAINER -->
                <div class="page-container">

                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <!-- BEGIN PAGE HEAD-->
                        <div class="page-head">
                            <div class="container">
                                <!-- BEGIN PAGE TITLE -->
                                <div class="page-title">
                                    <h1>Water Voucher
                                        <small>General Statistics</small>
                                    </h1>
                                </div>

                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content table-responsive">
                            <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">

                                  <div id="datatable_wrapper">

                                  </div>

                                        <div class="col-lg-12 col-xs-12 col-sm-12 users-table">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th>Beneficiary #</th>
                                                    <th>Beneficiary Name</th>
                                                    <th>Beneficiary ID</th>
                                                    <th>Area</th>
                                                    <th>Water Amount</th>
                                                    <th>Transaction Date</th>
                                                </tr>
                                                </thead>

                                                <tfoot class="tfoot">
                                                <tr>
                                                    <th>Beneficiary #</th>
                                                    <th>Beneficiary Name</th>
                                                    <th>Beneficiary ID</th>
                                                    <th>Area</th>
                                                    <th>Water Amount</th>
                                                    <th id="date-col"
                                                        data-provide="datepicker">


                                                    </th>



                                                </tr>
                                                </tfoot>

                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!-- END PAGE CONTENT INNER -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT BODY -->
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->
                    <!-- BEGIN QUICK SIDEBAR -->
                    <a href="javascript:;" class="page-quick-sidebar-toggler">
                        <i class="icon-login"></i>
                    </a>
                    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                        <div class="page-quick-sidebar">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                        <span class="badge badge-success">7</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                                <i class="icon-bell"></i> Alerts </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                                <i class="icon-info"></i> Notifications </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                                <i class="icon-speech"></i> Activities </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                                <i class="icon-settings"></i> Settings </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- END QUICK SIDEBAR -->
                </div>
                <!-- END CONTAINER -->
            </div>
        </div>
        <div class="page-wrapper-row">
            <div class="page-wrapper-bottom">
                <div class="page-footer">
                    <div class="container"> 2016 &copy;  By
                        <a target="_blank" href="#">Shift</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN QUICK NAV -->

    <div class="quick-nav-overlay"></div>

@endsection

@section('extra-js')

    <script>
        $(function () {
              $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pagingType: "input",
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                    }
                  ],
                ajax: '{{ url('/data_table_three')}}',
                columns: [
                    {data: 'ben_no', name: 'ben_no', orderable: false},
                    {data: 'ben_name', name: 'ben_name', orderable: false},
                    {data: 'ben_id', name: 'ben_id', orderable: false},
                    {data: 'area_name', name: 'area_name', orderable: false},
                    {data: 'trans_water_amount', name: 'trans_water_amount', orderable: false},
                    {data: 'trans_date', name: 'trans_date', orderable: false},

                ], initComplete: function () {
                    this.api().columns([0,1,2,3,4,5]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute('class','col-xs-12');
                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                },

            });
        });



        $(document).ready(function () {
            $('.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter').css('display', 'none');
        });

        $('.tfoot').css('display', 'table-header-group');
        $('.page-content').css('padding', '15px');

        $('div.users-table').find('#date-col').css({
            'font-family' : 'FontAwesome',
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '-3d'
        });

    </script>

@endsection


