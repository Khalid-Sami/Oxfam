@extends('layouts.login')

@section('content')


    <!-- BEGIN LOGO -->
    <div class="logo">
        <h2 style="text-align: center; color: darkred">Water Voucher System </h2>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('user.post.login') }}" method="post">
            {{ csrf_field() }}
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control" type="text" autocomplete="off" placeholder="Username"
                           name="username"/></div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Password" name="password"/></div>
            </div>
            <div class="form-actions" style="border-bottom: none;">

                <button type="submit" class="btn green pull-left"> Login</button>
            </div>

            <div class="create-account">
                <p> Don't have an account yet ?&nbsp;
                    <a href="javascript:;" id="register-btn"> Create an account </a>
                </p>
            </div>
        </form>


        <form class="register-form" action="{{ route('user.create') }}" method="post">
            {{ csrf_field() }}
            <h3>Sign Up</h3>

            <p> Enter your account details below: </p>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username"
                           name="username"/></div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                           id="register_password" placeholder="Password" name="password"/></div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                <div class="controls">
                    <div class="input-icon">
                        <i class="fa fa-check"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                               placeholder="Re-type Your Password" name="rpassword"/></div>
                </div>
            </div>
            <div class="form-group">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="tnc"/> I agree to the
                    <a href="javascript:;">Terms of Service </a> &
                    <a href="javascript:;">Privacy Policy </a>
                    <span></span>
                </label>
                <div id="register_tnc_error"></div>
            </div>
            <div class="form-actions">
                <button id="register-back-btn" type="button" class="btn grey-salsa btn-outline"> Back</button>
                <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up</button>
            </div>
        </form>
        <!-- END REGISTRATION FORM -->
    </div>



@endsection