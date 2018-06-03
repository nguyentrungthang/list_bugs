@extends('layouts.login')
@section('content')

<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>


        <form action="{{url('/register')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username')}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p style="color: red">
                    @if($errors->has('username'))
                        {{ $errors->first('username')}}
                    @endif
                </p>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p style="color: red">
                    @if($errors->has('first_name'))
                        {{ $errors->first('first_name')}}
                    @endif
                </p>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p style="color: red">
                    @if($errors->has('last_name'))
                        {{ $errors->first('last_name')}}
                    @endif
                </p>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p style="color: red">
                    @if($errors->has('email'))
                        {{ $errors->first('email')}}
                    @endif
                </p>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p style="color: red">
                    @if($errors->has('password'))
                        {{ $errors->first('password')}}
                    @endif
                </p>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="r_password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>