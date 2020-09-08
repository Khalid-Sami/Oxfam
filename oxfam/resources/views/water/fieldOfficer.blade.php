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
                    <div class="page-header-menu">
                        <div class="container">
                            <div class="hor-menu  ">
                                <ul class="nav navbar-nav">
                                    @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
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
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
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
                                    <h1>Field Officers
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-11" style="padding-top: 15px">
                                    <button type="button" class="btn btn-primary" id="newOfficer">New Officer</button>
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
                                        <div class="col-md-12 ">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Created Date</th>
                                                    <th>Options</th>
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

                </div>
                <!-- END CONTAINER -->
            </div>
        </div>

        <div id="addOfficerModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="addOfficerForm" class="addOfficerForm" method="post" action="{{ action('AdminController@storeNewOfficer') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Field Officer</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="name">Officer Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                                    <div id="name_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="password">Password</label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Enter password">
                                    <div id="password_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="confirm">Confirm Password</label>
                                    <input name="confirm" type="password" class="form-control" id="" placeholder="Enter confirm">
                                    <div id="confirm_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                            {{ csrf_field() }}
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="editOfficerModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="editOfficerForm" class="editOfficerForm" method="post" action="{{ action('AdminController@updateOfficerInfo') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Field Officer</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row edit">
                                <input type="hidden" name="od" class="od">
                                <div class="form-group col-sm-12">
                                    <label for="name">Officer Name</label>
                                    <input name="name" type="text" class="form-control name" placeholder="Enter name">
                                    <div id="name_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="password">Password</label>
                                    <input name="password" id="pass" type="password" class="form-control" placeholder="Enter password">
                                    <div id="password_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="confirm">Confirm Password</label>
                                    <input name="confirm" type="password" class="form-control" placeholder="Enter confirm">
                                    <div id="confirm_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                            {{ csrf_field() }}
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
        var table;
        $('.alert-dismissible').delay(3000).fadeOut('slow');

        $('#newOfficer').click(function(){
            $('#addOfficerModal').modal('show');
        })
        $('#addOfficerForm').validate({
            rules: {
                name: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                confirm: {
                    equalTo: "#password"
                },
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                name: "Please enter officer name",
                password: {
                    required: "Please provide a correct password",
                    minlength: "Password must be at least 5 characters long"
                },
                confirm: {
                    equalTo: "Password must be matched",
                },
            },submitHandler: function(form) {
                form.submit();
            }
        });

        table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            render: true,
            pagingType: "input",
            ajax: '{{ url('/allOfficers')}}',

            columns: [
                {
                    mRender: function (data, type, row, full) {
                        return full['row'] + 1;
                    }
                },
                {data: 'name', name: 'name', orderable: false},
                {
                    mRender: function (data, type, row, full) {
                        return 'Field Officer'
                    }
                },
                {data: 'created_at', name: 'created_at', orderable: false},
                {
                    mRender: function (data, type, row, full) {
                        return '<input class="editName hidden" value="'+row['name']+'"><input class="editCreated hidden" value="'+row['created_at']+'">' +
                            '<a class="btn btn-xs btn-primary editOfficer" data-val="'+row['id']+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteOfficer" data-val="'+row['id']+'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>'

                    }
                }
            ],
        });

        $('body').on('click','.editOfficer', function(){
            $('#editOfficerModal').modal('show');
            $('div.edit').find('.name').val($(this).siblings('.editName').val())
            $('div.edit').find('.od').val($(this).data('val'))
        })

         $('#editOfficerForm').validate({
            rules: {
                name: "required",
                password: {
                    minlength: 5
                },
                confirm: {
                    equalTo: "#pass"
                },
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($('div.edit').find("#" + name + "_validate1"));
            },
            messages: {
                name: "Please enter officer name",
                password: {
                    minlength: "Password must be at least 5 characters long"
                },
                confirm: {
                    equalTo: "Password must be matched",
                },
            },submitHandler: function(form) {
                form.submit();
            }
        });

        $('body').on('click','.deleteOfficer', function(){
            var id = $(this).data('val')
            swal({
                    title: "Are you sure ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function () {
                    $.ajax({
                        method: "GET",
                        url: '{{url('/')}}/deleteOfficer/'+id,
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Field Officer successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })

    </script>

@endsection

