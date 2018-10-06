@extends('layouts.logged-out')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>Voting </b>App</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login to vote</p>

        <div class="social-auth-links text-center">
            <a href="login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Login with Facebook</a>
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection