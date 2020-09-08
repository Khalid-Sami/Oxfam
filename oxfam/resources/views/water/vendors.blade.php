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
                                    <h1>Vendors
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-10" style="padding-top: 15px">
                                    <button type="button" class="btn btn-primary" id="newVendor">New Vendor</button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="edit-section" tabindex="-1"   data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog custom-class" role="document">
                                <div class="modal-content">

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
                                                    <th>E-mail</th>
                                                    <th>Mobile</th>
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

        <div id="addVendorModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="newVendorForm" class="newVendorForm" method="post" action="{{ action('AdminController@storeNewVendor') }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">New Vendor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Vendor Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                                <div id="name_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email">E-mail</label>
                                <input name="email" type="text" class="form-control" id="" placeholder="Enter email">
                                <div id="email_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="mobile">Mobile #</label>
                                <input name="mobile" type="text" class="form-control" id="" placeholder="Enter mobile">
                                <div id="mobile_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            {{--<div class="form-group col-sm-6">--}}
                                {{--<div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" id="from">--}}
                                    {{--<input type="text" class="form-control dateFrom" id="dateFrom" readonly>--}}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button class="btn default" type="button"><i class="glyphicon glyphicon-calendar"></i></button>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-sm-6">--}}
                                {{--<div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" id="to">--}}
                                    {{--<input type="text" class="form-control dateFrom" id="dateTo" readonly>--}}
                                    {{--<span class="input-group-btn">--}}
                                        {{--<button class="btn default" type="button"><i class="glyphicon glyphicon-calendar"></i></button>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="areas">Areas</label>
                                    <select name="areas[]" id="areas" class="multiselect-ui form-control" multiple="multiple">
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                <div id="areas_validate1" class="font-red" style="color: red;"></div>
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

        <div id="editVendorModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="editVendorForm" class="editVendorForm" method="post" action="{{ action('AdminController@updateVendorInfo') }}">
                    <div class="modal-content" id="editVendorDiv">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Vendor</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="vd" id="vd" value="">
                                <div class="form-group col-sm-12">
                                    <label for="ename">Vendor Name</label>
                                    <input name="ename" type="text" class="form-control" id="ename" placeholder="Enter name">
                                    <div id="ename_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="eemail">E-mail</label>
                                    <input name="eemail" type="text" class="form-control" id="eemail" placeholder="Enter email">
                                    <div id="eemail_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="emobile">Mobile #</label>
                                    <input name="emobile" type="text" class="form-control" id="emobile" placeholder="Enter mobile">
                                    <div id="emobile_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="eareas">Areas</label>
                                    <select name="eareas[]" id="editAreas" class="multiselect-ui form-control" multiple="multiple">
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="eareas_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="editVendorBTN" type="submit" class="btn btn-primary">Save</button>
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
//        $('.date-picker').datepicker({
//            startDate: '-0m'
//        }).on('changeDate', function(ev){
//            $('#sDate1').text($('.date-picker').data('date'));
//            $('.date-picker').datepicker('hide');
//        });

        var table;
        $("#newVendorForm").submit(function(e) {
            e.preventDefault();
        }).validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    minlength: 5
                },
//                areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter vendor name",
                mobile: {
                    required: "Please provide a mobile number",
                    minlength: "Mobile number must be at least 5 characters long"
                },
                email: {
                    required: "Please provide vendor email",
                    email: "Please enter correct email"
                },
//                areas:"Please select at least one area"
            },submitHandler: function(form) {
                if($('#areas').val() != null){
                    form.submit();
                }
                else{
                    swal(
                        'Opsss ...',
                        'Please select at least one area',
                        'error'
                    )
                }
            }
        });

        $("#editVendorForm").submit(function(e) {
            e.preventDefault();
        }).validate({
            rules: {
                ename: "required",
                eemail: {
                    required: true,
                    email: true
                },
                emobile: {
                    required: true,
                    minlength: 5
                },
//                areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            // Specify the validation error messages
            messages: {
                ename: "Please enter vendor name",
                emobile: {
                    required: "Please provide a mobile number",
                    minlength: "Mobile number must be at least 5 characters long"
                },
                eemail: {
                    required: "Please provide vendor email",
                    email: "Please enter correct email"
                },
//                areas:"Please select at least one area"
            },submitHandler: function(form) {
                if($('#editAreas').val() != null){
                    form.submit();
                }
                else{
                    swal(
                        'Opsss ...',
                        'Please select at least one area',
                        'error'
                    )
                }
            }
        });
    </script>

    <script>
        $(function() {
            $('.multiselect-ui').multiselect({
                includeSelectAllOption: true
            });
        });
        $('#newVendor').click(function(){
            $('#addVendorModal').modal('show');
        })
    </script>

    <script>
        $(function () {
            table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                render: true,
                pagingType: "input",
                ajax: '{{ url('/allVendors')}}',

                columns: [
                    {
                        mRender: function (data, type, row, full) {
                            return full['row'] + 1;
                        }
                    },
                    {data: 'name', name: 'name', orderable: false},
                    {data: 'email', name: 'email', orderable: false},
                    {data: 'phone', name: 'phone', orderable: false},
//                    {
//                        mRender: function (data, type, row, full) {
//                            return '<input class="editName hidden" value="'+row['name']+'"><input class="editEmail hidden" value="'+row['email']+'"><input class="editMobile hidden" value="'+row['phone']+'">' +
//                                '<a class="btn btn-xs btn-primary editVendor" data-val="'+row['no']+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteVendor" data-val="'+row['no']+'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>'
//
//                        }
//                    }
                    {data:'action', name:'action',orderable: false}
                ],
            });

        });
        $(document).ready(function () {
            $('.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter').css('display', 'none');
        });

        $('body').on('click','.editVendor',function(e){
            $('#editVendorModal').modal('show');
            $('option', $('#editAreas')).each(function(element) {
                $(this).removeAttr('selected').prop('selected', false);
            });
            $("#editAreas").multiselect('refresh');
            var id = $(this).data('val')
            $('#vd').val(id)
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/vendor/areas/'+id,
                dataType: "json",
                beforeSend: function() {
                    $('#editVendorBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        var ar = []
                        $.each(data.areas, function (i, item) {
                            ar.push(item.area.id)
                        });
                        $.each(ar, function(i,item){
                            $('#editAreas').multiselect('select', item);
                        })
                    }
                },
                complete:function(){
                    $('#editVendorBTN').prop('disabled', false);
                }
            })
            $('#editVendorDiv').find('#ename').val($(this).siblings('.editName').val())
            $('#editVendorDiv').find('#eemail').val($(this).siblings('.editEmail').val())
            $('#editVendorDiv').find('#emobile').val($(this).siblings('.editMobile').val())
            e.preventDefault();
        })

        $('body').on('click','.deleteVendor',function(e){
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
                        url: '{{url('/')}}/deleteVendor/'+id,
                        dataType: "json",
                        beforeSend: function() {
                            $('#editVendorBTN').prop('disabled', true);
                        },
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Vendor successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })


    </script>

@endsection

