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
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="{{ route('view-five') }}"> Field Officer
                                                <span class="arrow"></span>
                                            </a>

                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <li class="nav-item dropdown active">
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
                                    <h1>Addresses
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-11" style="padding-top: 15px">
                                    <button type="button" class="btn btn-primary" id="newAddress">New Address</button>
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
                                                    <th>Governorate</th>
                                                    <th>City</th>
                                                    <th>Locality</th>
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

        <div id="addAddressModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="addAddressForm" class="addAddressForm" method="post" action="{{ action('AdminController@storeNewAddress') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Address</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="governorate">Governorate</label>
                                    <input name="governorate" type="text" class="form-control" id="governorate" placeholder="Enter governorate">
                                    <div id="governorate_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="city">City</label>
                                    <input name="city" id="city" type="text" class="form-control" placeholder="Enter city">
                                    <div id="city_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="locality">Locality</label>
                                    <input name="locality" type="text" class="form-control" id="" placeholder="Enter locality">
                                    <div id="locality_validate1" class="font-red" style="color: red;"></div>
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

        <div id="editAddressModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="editAddressForm" class="editAddressForm" method="post" action="{{ action('AdminController@updateAddressInfo') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Address</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row edit">
                                <input type="hidden" class="ad" name="ad">
                                <div class="form-group col-sm-12">
                                    <label for="egovernorate">Governorate</label>
                                    <input name="egovernorate" type="text" class="form-control" id="egovernorate" placeholder="Enter governorate">
                                    <div id="egovernorate_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="ecity">City</label>
                                    <input name="ecity" id="ecity" type="text" class="form-control" placeholder="Enter city">
                                    <div id="ecity_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="elocality">Locality</label>
                                    <input name="elocality" type="text" class="form-control" id="elocality" placeholder="Enter locality">
                                    <div id="elocality_validate1" class="font-red" style="color: red;"></div>
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

        $('#newAddress').click(function(){
            $('#addAddressModal').modal('show');
        })
        $('#addAddressForm').validate({
            rules: {
                governorate: "required",
                city: "required",
                locality: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                governorate: "Please enter governorate name",
                city: "Please enter city name",
                locality: "Please enter locality name"
            },submitHandler: function(form) {
                form.submit();
            }
        });

        table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            render: true,
            pagingType: "input",
            ajax: '{{ url('/allAddresses')}}',

            columns: [
                {
                    mRender: function (data, type, row, full) {
                        return full['row'] + 1;
                    }
                },
                {data: 'governorate', name: 'governorate', orderable: false},
                {data: 'city', name: 'city', orderable: false},
                {data: 'locality', name: 'locality', orderable: false},
                {
                    mRender: function (data, type, row, full) {
                        return '<input class="editGovernorate hidden" value="'+row['governorate']+'"><input class="editCity hidden" value="'+row['city']+'"><input class="editLocality hidden" value="'+row['locality']+'">' +
                            '<a class="btn btn-xs btn-primary editAddress" data-val="'+row['id']+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteAddress" data-val="'+row['id']+'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>'

                    }
                }
            ],
        });

        $('body').on('click','.editAddress', function(){
            $('#editAddressModal').modal('show');
            $('div.edit').find('#egovernorate').val($(this).siblings('.editGovernorate').val())
            $('div.edit').find('#ecity').val($(this).siblings('.editCity').val())
            $('div.edit').find('#elocality').val($(this).siblings('.editLocality').val())
            $('div.edit').find('.ad').val($(this).data('val'))
        })

        $('#editAddressForm').validate({
            rules: {
                egovernorate: "required",
                ecity: "required",
                elocality: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                egovernorate: "Please enter governorate name",
                ecity: "Please enter city name",
                elocality: "Please enter locality name"
            },submitHandler: function(form) {
                form.submit();
            }
        });

        $('body').on('click','.deleteAddress', function(){
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
                        url: '{{url('/')}}/deleteAddress/'+id,
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Address successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })

    </script>

@endsection

