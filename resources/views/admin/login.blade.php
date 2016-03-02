@extends('admin.layouts.auth')

@section('content')
<style type="text/css">
    .ball {
        background-color: rgba(0,0,0,0);
        border: 5px solid rgba(0,183,229,0.9);
        opacity: .9;
        border-top: 5px solid rgba(0,0,0,0);
        border-left: 5px solid rgba(0,0,0,0);
        border-radius: 50px;
        width: 90px;
        height: 90px;
        margin: 0 auto;
        -moz-animation: spin .5s infinite linear;
        -webkit-animation: spin .5s infinite linear;
        box-shadow: 0 0 20px #2187e7;
    }

    .ball1 {
        background-color: rgba(0,0,0,0);
        border: 5px solid rgba(0,183,229,0.9);
        opacity: .9;
        border-top: 5px solid rgba(0,0,0,0);
        border-left: 5px solid rgba(0,0,0,0);
        border-radius: 50px;
        width: 75px;
        height: 75px;
        margin: 0 auto;
        position: relative;
        top: -83px;
        -moz-animation: spinoff .5s infinite linear;
        -webkit-animation: spinoff .5s infinite linear;
    }
    @-moz-keyframes spin {
        0% { -moz-transform:rotate(0deg); }
        100% { -moz-transform:rotate(360deg); }
    }
    @-moz-keyframes spinoff {
        0% { -moz-transform:rotate(0deg); }
        100% { -moz-transform:rotate(-360deg); }
    }
    @-webkit-keyframes spin {
        0% { -webkit-transform:rotate(0deg); }
        100% { -webkit-transform:rotate(360deg); }
    }
    @-webkit-keyframes spinoff {
        0% { -webkit-transform:rotate(0deg); }
        100% { -webkit-transform:rotate(-360deg); }
    }
    .logologin{
        width: 90px;
        height: 90px;
        display: block;
        margin: auto;
        margin-top: -67px;
        background: #fff;
        border-radius: 100%;
        color: #353D47;
        cursor: pointer;
        box-shadow: 0px 0px 0px 7px rgb(255, 255, 255);
        transition: 0.2s ease-out;
        -webkit-animation: rotate360 *s;
        -moz-animation: rotate360 *s;
        -ms-animation: rotate360 *s;
        -o-animation: rotate360 *s;
        animation: rotate360 *s;
    }
    .logologin i{
        line-height: 80px;
    }
</style>    
<div class="login-box">
    <div>
        <div class="login-form row">
            <!-- <div class="col-sm-12 text-center login-header">
                <i class="login-logo glyphicon glyphicon-user fa-5x"></i>
                <h4 class="login-title">Admin Panel</h4>
            </div> -->
            <div class="col-sm-12">
                <div class="login-body">
                    <div class="logologin text-center">
                        <div class="ball"></div>
                        <div class="ball1"></div>
                        <i style="font-size:3.5em; top: -165px;" class="login-logo glyphicon glyphicon-user"></i>
                    </div>
                    <div class="progress hidden" id="login-progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            Log In...
                        </div>
                    </div>
                    <form method="POST" action="{{ url('/admin/login') }}">
                        {!! csrf_field() !!}
                        <div class="control{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="control{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="login-button text-center">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                        <div class="login-button text-center">
                            <p class="message" style="margin: 15px 0 0;color: #b3b3b3;font-size: 12px;">Forgot password? <a style="color: #4CAF50;
  text-decoration: none;" href="#">Password recovery.</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection