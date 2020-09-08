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
        <div class="parent" style="position:relative;">
            <img width="550px" height="300px" style="position: absolute" src="{{ asset('/images/card.png') }}" />
            <strong style="position:relative;text-align: right;float:right;margin-right:81%;margin-top:115px ">خالد سامي محمد سامي محمد </strong>
            <strong style="position:relative;text-align: right;float:right;margin-right:81%;margin-top:5px">20024545414120</strong>
            <strong style="position:relative;text-align: right;float:right;margin-right:81%;margin-top:5px ">QRtrtr46456546201S</strong>
            <strong style="position:relative;text-align: right;float:right;margin-right:81%;margin-top:5px ">الصناعة</strong>
            <strong style="position:relative;text-align: right;float:right;margin-right:81%;margin-top:5px ">SEN</strong>
            <img style="position:relative;text-align: right;float:right;margin-right:64%;margin-top:-120px " src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(222, 222, 246)->size(100)->generate('Make me into an QrCode!')) !!} ">
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
    </script>

@endsection

