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
                                    <h1>Areas
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-11" style="padding-top: 15px">
                                    <button type="button" class="btn btn-primary" id="newArea">New Area</button>
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
                                            <table class="table table-bordered" id="areas-table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Area Name</th>
                                                    <th>Address</th>
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

        <div id="addAreaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="addAreaForm" class="addAreaForm" method="post" action="{{ action('AdminController@storeNewArea') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Area</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="area_name">Area Name</label>
                                    <input name="area_name" type="text" class="form-control" id="area_name" placeholder="Enter area name">
                                    <div id="area_name_validate1" class="font-red" style="color: red;"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="locality">Address</label>
                                    <select name="addresses" id="addresses" class="form-control">
                                        <option value="">Select address</option>
                                        {{--@foreach($addresses as $address)--}}
                                            {{--<option value="{{ $address->id }}">{{ $address->governorate.' , '.$address->city.' , '.$address->locality}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                    <div id="addresses_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary addAreaBTN">Save</button>
                            {{ csrf_field() }}
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="editAreaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="editAreaForm" class="editAreaForm" method="post" action="{{ action('AdminController@updateAreaInfo') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Area</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row edit">
                                <input type="hidden" class="ad" name="ad">
                                <div class="form-group col-sm-12">
                                    <label for="e_area_name">Area Name</label>
                                    <input name="e_area_name" type="text" class="form-control" id="e_area_name" placeholder="Enter area name">
                                    <div id="e_area_name_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="e_addresses">Address</label>
                                    <select name="e_addresses" id="e_addresses" class="form-control">
                                        <option value="">Select address</option>
                                        {{--@foreach($addresses as $address)--}}
                                            {{--<option value="{{ $address->id }}">{{ $address->governorate.' , '.$address->city.' , '.$address->locality}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                    <div id="e_addresses_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary editAreaBTN">Save</button>
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

        $('#newArea').click(function(){
            $('#addAreaModal').modal('show');
            $('#addresses').find('option').not(':eq(0)').remove()
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/getAreaAddress/0',
                dataType: "json",
                beforeSend: function() {
                    $('.addAreaBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.addresses, function (i, item) {
                            $('#addresses').append($("<option></option>").attr("value",item.id).text(item.governorate+' , '+item.city+' , '+item.locality));
                        })
                    }
                },
                complete:function(){
                    $('.addAreaBTN').prop('disabled', false);
                }
            })
        })
        $('#addAreaForm').validate({
            rules: {
                area_name: "required",
                addresses: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                area_name: "Please enter area name",
                addresses: "Please select address area"
            },submitHandler: function(form) {
                form.submit();
            }
        });

        table = $('#areas-table').DataTable({
            processing: true,
            serverSide: true,
            render: true,
            pagingType: "input",
            ajax: '{{ url('/allAreas')}}',

            columns: [
                {
                    mRender: function (data, type, row, full) {
                        return full['row'] + 1;
                    }
                },
                {data: 'area_name', name: 'area_name', orderable: false},
                {
                    mRender: function (data, type, row, full) {
                        return row['address_area']['governorate']+' , '+row['address_area']['city']+' , '+row['address_area']['locality']
                    }
                },
                {
                    mRender: function (data, type, row, full) {
                        return '<input class="editAddressArea hidden" value="'+row['address_id']+'"><input class="editAreaName hidden" value="'+row['area_name']+'">' +
                            '<a class="btn btn-xs btn-primary editArea" data-val="'+row['id']+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteArea" data-val="'+row['id']+'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>'

                    }
                }
            ],
        });

        $('body').on('click','.editArea', function(){
            $('#editAreaModal').modal('show');
            $('#e_addresses').find('option').not(':eq(0)').remove()
            $('div.edit').find('#e_area_name').val($(this).siblings('.editAreaName').val())
            var addID = $(this).siblings('.editAddressArea').val()
            $('div.edit').find('.ad').val($(this).data('val'))
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/getAreaAddress/'+$(this).data('val'),
                dataType: "json",
                beforeSend: function() {
                    $('.editAreaBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.addresses, function (i, item) {
                            $('#e_addresses').append($("<option></option>").attr("value",item.id).text(item.governorate+' , '+item.city+' , '+item.locality));
                        })
                    }
                },
                complete:function(){
                    $('div.edit').find('#e_addresses').val(addID)
                    $('.editAreaBTN').prop('disabled', false);
                }
            })
        })

        $('#editAreaForm').validate({
            rules: {
                e_area_name: "required",
                e_addresses: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                e_area_name: "Please enter area name",
                e_addresses: "Please select address area",
            },submitHandler: function(form) {
                form.submit();
            }
        });

        $('body').on('click','.deleteArea', function(){
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
                        url: '{{url('/')}}/deleteArea/'+id,
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Area successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })

    </script>

@endsection

