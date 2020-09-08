@extends('layouts.master')

@section('content')

    <div class="page-wrapper">
        <div class="page-wrapper-row">
            <div class="page-wrapper-top">
                <!-- BEGIN HEADER -->
                <div class="page-header">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">


                        </div>
                    </div>


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
                                    <h1>Dashboard
                                        <small>General Statistics</small>
                                    </h1>
                                </div>

                            </div>
                        </div>

                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content">

                            <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">



                                        <div class="col-lg-3 col-xs-12 col-sm-12">

                                            <table class="table table-bordered ">

                                                <thead>
                                                <th>General Stats</th>
                                                <tr>
                                                    <th>BENEFICIARIES</th>
                                                    <th>AREAS</th>
                                                </tr>
                                                </thead>
                                                <tbody style="background-color: white">

                                                <div id="datatable_wrapper"></div>
                                                <tr>
                                                    <td>{{ $beneficiary_count }}</td>
                                                    <td>{{ $area_count }}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="col-lg-8 col-xs-12 col-sm-12">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>SECTION</th>
                                                    <th>AREA</th>
                                                    <th>GOVERNORATE</th>
                                                    <th>CITY</th>
                                                    <th>BENEFICIARIES</th>
                                                </tr>
                                                </thead>
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


@endsection

@section('extra-js')

    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                pagingType: "input",
                ajax: '{{ url('/data_table_one')}}',
                columns: [
                    {data: 'id', name: 'id' , orderable: false},
                    {data: 'sec_code', name: 'sec_code' , orderable: false},
                    {data: 'area_sec.area_name', name: 'area_sec.area_name', orderable: false},

                    {data: 'area_sec.address_area.governorate', name: 'area_sec.address_area.governorate', orderable: false },
                    {data: 'area_sec.address_area.city', name: 'area_sec.address_area.city', orderable: false},
                    {data: 'beneficiaries_count', name: 'beneficiaries_count' , orderable: false},
                ],
            });

        });



    </script>


@endsection


