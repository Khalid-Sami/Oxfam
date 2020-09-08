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
                                    <h1>Sections
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-11" style="padding-top: 15px">
                                    <button type="button" class="btn btn-primary" id="newSection">New Section</button>
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
                                            <table class="table table-bordered" id="sections-table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Section Code</th>
                                                    <th>Area</th>
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

        <div id="addSectionModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="addSectionForm" class="addSectionForm" method="post" action="{{ action('AdminController@storeNewSection') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Section</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="section_code">Section Code</label>
                                    <input name="section_code" type="text" class="form-control" id="section_code" placeholder="Enter section code">
                                    <div id="section_code_validate1" class="font-red" style="color: red;"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="areas">Area</label>
                                    <select name="areas" id="areas" class="form-control">
                                        <option value="">Select area</option>
                                    </select>
                                    <div id="areas_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary addSectionBTN">Save</button>
                            {{ csrf_field() }}
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="editSectionModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="editSectionForm" class="editSectionForm" method="post" action="{{ action('AdminController@updateSectionInfo') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Section</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row edit">
                                <input type="hidden" class="sd" name="sd">
                                <div class="form-group col-sm-12">
                                    <label for="e_section_code">Section Code</label>
                                    <input name="e_section_code" type="text" class="form-control" id="e_section_code" placeholder="Enter section code">
                                    <div id="e_section_code_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="e_areas">Area</label>
                                    <select name="e_areas" id="e_areas" class="form-control">
                                        <option value="">Select area</option>
                                    </select>
                                    <div id="e_areas_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary editSectionBTN">Save</button>
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

        $('#newSection').click(function(){
            $('#addSectionModal').modal('show');
            $('#areas').find('option').not(':eq(0)').remove()
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/getSectionArea/0',
                dataType: "json",
                beforeSend: function() {
                    $('.addSectionBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.areas, function (i, item) {
                            $('#areas').append($("<option></option>").attr("value",item.id).text(item.area_name));
                        })
                    }
                },
                complete:function(){
                    $('.addSectionBTN').prop('disabled', false);
                }
            })
        })
        $('#addSectionForm').validate({
            rules: {
                section_code: "required",
                areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                section_code: "Please enter section code",
                areas: "Please select section area"
            },submitHandler: function(form) {
                form.submit();
            }
        });

        table = $('#sections-table').DataTable({
            processing: true,
            serverSide: true,
            render: true,
            pagingType: "input",
            ajax: '{{ url('/allSections')}}',

            columns: [
                {
                    mRender: function (data, type, row, full) {
                        return full['row'] + 1;
                    }
                },
                {data: 'sec_code', name: 'sec_code', orderable: false},
                {data: 'area_sec.area_name', name: 'area_sec.area_name', orderable: false},
                {
                    mRender: function (data, type, row, full) {
                        return '<input class="editAreaSection hidden" value="'+row['area']+'"><input class="editSectionCode hidden" value="'+row['sec_code']+'">' +
                            '<a class="btn btn-xs btn-primary editSection" data-val="'+row['id']+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteSection" data-val="'+row['id']+'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>'

                    }
                }
            ],
        });

        $('body').on('click','.editSection', function(){
            $('#editSectionModal').modal('show');
            $('#e_areas').find('option').not(':eq(0)').remove()
            $('div.edit').find('#e_section_code').val($(this).siblings('.editSectionCode').val())
            var addID = $(this).siblings('.editAreaSection').val()
            $('div.edit').find('.sd').val($(this).data('val'))
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/getSectionArea/'+$(this).data('val'),
                dataType: "json",
                beforeSend: function() {
                    $('.editSectionBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.areas, function (i, item) {
                            $('#e_areas').append($("<option></option>").attr("value",item.id).text(item.area_name));
                        })
                    }
                },
                complete:function(){
                    $('div.edit').find('#e_areas').val(addID)
                    $('.editSectionBTN').prop('disabled', false);
                }
            })
        })

        $('#editSectionForm').validate({
            rules: {
                e_section_code: "required",
                e_areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            messages: {
                e_section_code: "Please enter section code",
                e_areas: "Please select section area",
            },submitHandler: function(form) {
                form.submit();
            }
        });

        $('body').on('click','.deleteSection', function(){
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
                        url: '{{url('/')}}/deleteSection/'+id,
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Section successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })

    </script>

@endsection

