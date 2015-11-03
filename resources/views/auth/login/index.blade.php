@extends('master.header')
@include('master.navbar')
@section('title','Login')
@section('content')
    <div class="account-wrapper">

       <!-- <div class="account-logo">
            <img src="img/logo-login.png" alt="Target Admin">
        </div> -->

        <div class="account-body">

            <h3 class="account-body-title">Welcome back to Fractals. {{ Session('name') }}</h3>

            <h5 class="account-body-subtitle">Please sign in to get access.</h5>
            <ul>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li class="text-danger"> {{ $error }} </li>
                    @endforeach

                @endif
            </ul>
            <form class="form account-form" method="POST" action="{{ action('LoginController@login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="login-email" class="placeholder-hidden">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="User Email" tabindex="1" value="{{old('email')}}">

                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label for="login-password" class="placeholder-hidden">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" tabindex="2" value="{{old('password')}}">
                </div> <!-- /.form-group -->

          <!--      <div class="form-group clearfix">
                    <div class="pull-left">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="" value="" tabindex="3">Remember me
                        </label>
                    </div>

                    <div class="pull-right">
                        <a href="account-forgot.html">Forgot Password?</a>
                    </div>
                </div> --> <!-- /.form-group -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
                        Signin &nbsp; <i class="fa fa-play-circle"></i>
                    </button>
                </div> <!-- /.form-group -->

            </form>


        </div> <!-- /.account-body -->

        <div class="account-footer">
            <p>
                Don't have an account? &nbsp;
                <a href="{{ action('SettingsController@create') }}" class="">Create an Account!</a>
            </p>
        </div> <!-- /.account-footer -->

    </div> <!-- /.account-wrapper -->
@stop