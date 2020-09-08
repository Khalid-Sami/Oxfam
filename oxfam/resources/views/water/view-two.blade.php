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
                                        @if(Auth::user()->type == 1)
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
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
                                    <h1>Beneficiaries
                                        <small>General & Statistics</small>
                                    </h1>
                                </div>
                                <div class="col-sm-offset-9" style="padding-top: 15px">
                                    @if(!$adoption || Auth::user()->type == 1)
                                        <button type="button" class="btn btn-primary" id="newBeneficiary">New Beneficiary</button>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <button type="button" class="btn btn-success" id="adoption" @if($adoption) disabled @endif>Adoption</button>
                                        {{--<button type="button" class="btn btn-info" id="qrCode">QR Code</button>--}}
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

                                        <div class="col-md-12 ">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th>Beneficiary Name</th>
                                                    <th>Beneficiary ID</th>
                                                    <th>Mobile</th>
                                                    <th>City</th>
                                                    <th>Area</th>
                                                    <th>Section</th>
                                                    <th>Address</th>
                                                    <th>Options</th>
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

        <div id="addBeneficiaryModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="addBeneficiaryForm" class="addBeneficiaryForm" method="post" action="{{ action('AdminController@storeBeneficiaryInfo') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Beneficiaries</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="vd" id="vd">
                                <div class="form-group col-sm-6">
                                    <label for="name">Beneficiary Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                                    <div id="name_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="id">Beneficiary Identity Number</label>
                                    <input name="id" type="text" class="form-control" id="id" placeholder="Enter Identity Number">
                                    <div id="id_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="mobile">Beneficiary Mobile #</label>
                                    <input name="mobile" type="text" class="form-control" id="mobile" placeholder="Enter mobile">
                                    <div id="mobile_validate1" class="font-red" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row add">
                                <div class="form-group col-sm-6">
                                    <label for="address">Address</label>
                                    <select name="address" id="address" class="form-control address">
                                        <option value="">Select address</option>
                                        @foreach($address as $add)
                                            <option value="{{$add->id}}">{{ $add->city.' , '.$add->locality }}</option>
                                        @endforeach
                                    </select>
                                    <div id="address_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="area">Area</label>
                                    <select name="area" id="area" class="form-control area">
                                        <option value="">Select area</option>
                                    </select>
                                    <div id="area_validate1" class="font-red" style="color: red;"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="section">Section</label>
                                    <select name="section" id="section" class="form-control section">
                                        <option value="">Select section</option>
                                    </select>
                                    <div id="section_validate1" class="font-red" style="color: red;"></div>
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
    <div id="editBeneficiaryModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="editBeneficiaryForm" class="editBeneficiaryForm" method="post" action="{{ action('AdminController@updateBeneficiaryInfo') }}">
                <div class="modal-content" id="editVendorDiv">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Beneficiary</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row editNN">
                            <input type="hidden" name="vd" id="vds">
                            <div class="form-group col-sm-6">
                                <label for="name">Beneficiary Name</label>
                                <input name="name" type="text" class="form-control name" id="" placeholder="Enter name">
                                <div id="name_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="id">Beneficiary Identity Number</label>
                                <input name="id" type="text" class="form-control id" id="" placeholder="Enter Identity Number">
                                <div id="id_validate1" class="font-red" style="color: red;"></div>
                            </div>
                        </div>
                        <div class="row editM">
                            <div class="form-group col-sm-12">
                                <label for="mobile">Beneficiary Mobile #</label>
                                <input name="mobile" type="text" class="form-control mobile" id="" placeholder="Enter mobile">
                                <div id="mobile_validate1" class="font-red" style="color: red;"></div>
                            </div>
                        </div>
                        <div class="row edit">
                            <div class="form-group col-sm-6">
                                <label for="address">Address</label>
                                <select name="address" id="" class="form-control address">
                                <option value="">Select address</option>
                                    @foreach($address as $add)
                                        <option value="{{$add->id}}">{{ $add->city.' , '.$add->locality }}</option>
                                    @endforeach
                                </select>
                                <div id="address_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="area">Area</label>
                                <select name="area" id="" class="form-control area">
                                <option value="">Select area</option>
                                </select>
                                <div id="area_validate1" class="font-red" style="color: red;"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="section">Section</label>
                                <select name="section" id="" class="form-control section">
                                    <option value="">Select section</option>
                                </select>
                                <div id="section_validate1" class="font-red" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="editBeneficiaryBTN" type="submit" class="btn btn-primary">Save</button>
                        {{ csrf_field() }}
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--<div id="qrCodeModal" class="modal fade" tabindex="-1" role="dialog">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<form id="qrCodeForm" class="qrCodeForm" method="post" action="{{ action('AdminController@updateBeneficiaryInfo') }}">--}}
                {{--<div class="modal-content" id="qrCodeDiv">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
                                    {{--aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title">QR Code</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="row">--}}
                            {{--<h3 class="text-center">Beneficiaries</h3>--}}
                            {{--<div class="well" style="max-height: 300px;overflow: auto;">--}}
                                {{--<!-- List group -->--}}
                                {{--<div class="">--}}
                                    {{--<button class="btn btn-default" id="checkAll">Check All</button>--}}
                                    {{--<button class="btn btn-default" id="unCheckAll">UnCheck All</button>--}}
                                {{--</div>--}}
                                {{--<ul class="list-group">--}}
                                    {{--@foreach($beneficiaries as $beneficiary)--}}
                                        {{--<li class="list-group-item">--}}
                                            {{--<div class="custom-checkbox">--}}
                                                {{--<input type="checkbox" value="{{ $beneficiary->ben_no }}"><span>&nbsp;&nbsp;{{ $beneficiary->ben_name }}</span>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                        {{--<button id="editBeneficiaryBTN" type="submit" class="btn btn-primary">Export</button>--}}
                        {{--{{ csrf_field() }}--}}
                    {{--</div>--}}
                {{--</div><!-- /.modal-content -->--}}
            {{--</form>--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}

    <div class="quick-nav-overlay"></div>

@endsection

@section('extra-js')
    <script>
        $(document).ready(function(){
            $('#cb4').prop('indeterminate', true)
                .attr('data-indeterminate', true);
        });
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

        $('#editBeneficiaryForm').validate({
            rules: {
                name: "required",
                id: {
                    required: true,
                    number: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 5
                },
                address: "required",
//                city: "required",
                area: "required",
                section: "required"
//                areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter beneficiary name",
                mobile: {
                    required: "Please provide a mobile number",
                    number: "Please enter correct mobile number",
                    minlength: "Mobile number must be at least 5 characters long"
                },
                id: {
                    required: "Please provide beneficiary identity number",
                    number: "Please enter correct identity number"
                },
                address: "Please select address",
//                city: "Please select city",
                area: "Please select area",
                section: "Please select section"
//                areas:"Please select at least one area"
            },submitHandler: function(form) {
                 form.submit();
            }
        });

        $('#addBeneficiaryForm').validate({
            rules: {
                name: "required",
                id: {
                    required: true,
                    number: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 5
                },
                address: "required",
//                city: "required",
                area: "required",
                section: "required"
//                areas: "required"
            },
            errorPlacement: function (error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate1"));
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter beneficiary name",
                mobile: {
                    required: "Please provide a mobile number",
                    number: "Please enter correct mobile number",
                    minlength: "Mobile number must be at least 5 characters long"
                },
                id: {
                    required: "Please provide beneficiary identity number",
                    number: "Please enter correct identity number"
                },
                address: "Please select address",
//                city: "Please select city",
                area: "Please select area",
                section: "Please select section"
//                areas:"Please select at least one area"
            },submitHandler: function(form) {
                 form.submit();
            }
        });

        $(function () {
            table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                render: true,
                pagingType: "input",
                ajax: '{{ url('/data_table_two')}}',
                columns: [
                    {data: 'ben_name', name: 'ben_name', orderable: false},
                    {data: 'ben_id', name: 'ben_id', orderable: false},
                    {data: 'mobile', name: 'mobile', orderable: false},
                    {data: 'section.area_sec.address_area.city', name: 'section.area_sec.address_area.city', orderable: false},
                    {data: 'section.area_sec.area_name', name: 'section.area_sec.area_name', orderable: false},
                    {data: 'section.sec_code', name: 'section.sec_code', orderable: false},
                    {data: 'section.area_sec.address_area.locality', name: 'section.area_sec.address_area.locality', orderable: false},
                    {data: 'action', name: 'action', orderable: false},
                ],
                initComplete: function () {
                    this.api().columns([0,1]).every(function () {
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
            $('.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter').css('display', 'none');
        });

        $('.tfoot').css('display', 'table-header-group');
        $('.page-content').css('padding', '0');

        var seq = []

        $(document).on('click','a[name="editBeneficiary"]', function(){
            $('#editBeneficiaryModal').modal('show');
            var id = $(this).data('val')
            $('#vds').val(id)
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/beneficiary/info/'+id,
                dataType: "json",
                beforeSend: function() {
                    $('#editBeneficiaryBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $('div.editNN').find('.name').val(data.beneficiary.ben_name)
                        $('div.editNN').find('.id').val(data.beneficiary.ben_id)
                        $('div.editM').find('.mobile').val(data.beneficiary.mobile)
                        seq = data.seq
                        if(seq.length > 0){
                            $('div.edit').find(".address").val(seq[0]);
                            $('div.edit').find(".address").change();
                            seq = seq.filter(function(elem){
                                return elem != data.seq[0];
                            });
                        }
                    }
                },
                complete:function(){
                    $('#editBeneficiaryBTN').prop('disabled', false);
                }
            })
        });

        $('body').on('change','.address', function(){
            var addSelect = $(this)
            addSelect.closest('.row').find('.area').find('option').not(':eq(0)').remove()
            addSelect.closest('.row').find('.section').find('option').not(':eq(0)').remove()
            var id = $(this).val()
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/address/getAreas/'+id,
                dataType: "json",
                beforeSend: function() {
                    $('#editBeneficiaryBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.areas, function (i, item) {
                            addSelect.closest('.row').find('.area').append($("<option></option>").attr("value",item.id).text(item.area_name));
                        });
                    }
                },
                complete:function(){
                    if(seq.length > 0){
                        $('div.edit').find(".area").val(seq[0]);
                        $('div.edit').find(".area").change();
                    }
                    seq = seq.filter(function(elem){
                        return elem != seq[0];
                    });
                    $('#editBeneficiaryBTN').prop('disabled', false);
                }
            })
        });

        $('body').on('change','.area', function(){
            var areaSelect = $(this)
            areaSelect.closest('.row').find('.section').find('option').not(':eq(0)').remove()
            var id = $(this).val()
            $.ajax({
                method: "GET",
                url: '{{url('/')}}/area/getSections/'+id,
                dataType: "json",
                beforeSend: function() {
                    $('#editBeneficiaryBTN').prop('disabled', true);
                },
                success: function (data, textStatus, jqXHR) {
                    if(data.status){
                        $.each(data.sections, function (i, item) {
                            areaSelect.closest('.row').find('.section').append($("<option></option>").attr("value",item.id).text(item.sec_code));
                        });
                    }
                },
                complete:function(){
                    if(seq.length > 0)
                        $('div.edit').find(".section").val(seq[0]);
                    seq = seq.filter(function(elem){
                        return elem != seq[0];
                    });
                    $('#editBeneficiaryBTN').prop('disabled', false);
                }
            })
        });

        $('body').on('click','.deleteBeneficiary',function(e){
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
                        url: '{{url('/')}}/beneficiary/delete/'+id,
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Beneficiary successfully deleted", "success");
                                table.ajax.reload();
                            }
                        }
                    })
                });

            e.preventDefault();
        })

        $('#newBeneficiary').click(function(){
            $('#addBeneficiaryModal').modal('show');
        })

        $('#adoption').click(function(){
            var id = $(this).data('val')
            swal({
                    title: "Are you sure ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Adoption",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function () {
                    $.ajax({
                        method: "GET",
                        url: '{{url('/')}}/adoptionBeneficiary',
                        dataType: "json",
                        success: function (data, textStatus, jqXHR) {
                            if(data.status){
                                swal("The process has been done", "Beneficiaries successfully adoption", "success");
                                $('#adoption').prop('disabled',true);
                            }
                        }
                    })
                });

            e.preventDefault();
        })

        $('#qrCode').click(function(){
            $('#qrCodeModal').modal('show');
        })

    </script>

@endsection

