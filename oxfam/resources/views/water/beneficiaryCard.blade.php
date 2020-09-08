@extends('layouts.master')

@section('content')
    @if(session('error_msg'))
        <div class="alert alert-danger alert-dismissible text-center" style=" position: absolute;width: 100%;z-index: 1;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('error_msg') }}
        </div>
    @endif
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

                            <!-- END HEADER SEARCH BOX -->
                            <!-- BEGIN MEGA MENU -->
                            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                            <div class="hor-menu  ">
                                <ul class="nav navbar-nav">
                                    @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
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
                                    @if(Auth::user()->type == 1)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                                            <a href="{{ route('view-nine') }}"> QR Code
                                                <span class="arrow"></span>
                                            </a>

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
                                    <h1>Beneficiary Cards
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-11" style="padding-top: 15px">
                                    @if(Auth::user()->type == 1)
                                        <a type="button" class="btn btn-success" id="export" href="{{ action('AdminController@exportCards') }}">Export Cards</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content ">
                            <div class="container">
                                <div class="page-content-inner">
                                    <div class="mt-content-body">
                                        <br>
                                        <div class="col-md-12" style="padding-bottom: 20px">
                                            <button class="btn btn-default" id="checkAll">Check All</button>
                                            <button class="btn btn-default" id="unCheckAll">UnCheck All</button>
                                        </div>
                                        <div class="col-md-12 ">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Beneficiary Name</th>
                                                    <th>Beneficiary ID</th>
                                                    <th>Mobile</th>
                                                    <th>City</th>
                                                    <th>Area</th>
                                                    <th>Section</th>
                                                    <th>Address</th>
                                                </tr>
                                                </thead>
                                                <tfoot class="tfoot">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
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

    <div class="quick-nav-overlay"></div>

@endsection

@section('extra-js')
    <script>
        $('#checkAll').click(function(e){
            $( "input[type='checkbox']" ).prop('checked', true);
            e.preventDefault();
        })
        $('#unCheckAll').click(function(e){
            $( "input[type='checkbox']" ).prop('checked', false);
            e.preventDefault();
        })
    </script>
    <script>
        var table;
        $('.alert-dismissible').delay(3000).fadeOut('slow');

        $(function () {
            table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                render: true,
                paging: true,
                lengthMenu: [[10, 25, 50,100,200,300, -1], [10, 25, 50,100,200,300, "All"]],
                iDisplayLength: 10,
                pagingType: "input",
                ajax: '{{ url('/data_table_two')}}',
                columns: [
                    {
                        mRender: function (data, type, row, full) {
                            return '<div style="text-align: center"><input name="ids[]" class="ids" type="checkbox" value="'+row['ben_no']+'"><span></span></div>'
                        }
                    },
                    {data: 'ben_name', name: 'ben_name', orderable: false},
                    {data: 'ben_id', name: 'ben_id', orderable: false},
                    {data: 'mobile', name: 'mobile', orderable: false},
                    {data: 'section.area_sec.address_area.city', name: 'section.area_sec.address_area.city', orderable: false},
                    {data: 'section.area_sec.area_name', name: 'section.area_sec.area_name', orderable: false},
                    {data: 'section.sec_code', name: 'section.sec_code', orderable: false},
                    {data: 'section.area_sec.address_area.locality', name: 'section.area_sec.address_area.locality', orderable: false},
                ],
                initComplete: function () {
                    this.api().columns([1,2]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute('class','col-xs-12');
                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });

        });
        $(document).ready(function () {
            $('.dataTables_wrapper .dataTables_filter').css('display', 'none');
        });

        $('.tfoot').css('display', 'table-header-group');
        $('.page-content').css('padding', '0');

//        $('#export').click(function(){
//
//        })

    </script>

@endsection

