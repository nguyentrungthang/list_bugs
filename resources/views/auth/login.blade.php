@extends('layouts.login')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b> List Bugs</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <p style="color:red" align="center"> @if(Session::get('message')) {{Session::get('message')}} @endif</p>
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="User name" name="user_name" value="{{ old('user_name') }}" required >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="#">I forgot my password</a><br>
            <a href="{{url('/register')}}" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>

    {{--modal--}}

    @if(isset($messages))
        {{dd($messages)}}
    <div class="alert alert-success alert-dismissible modal-lg" id="register_success" aria-hidden="true" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        Success alert preview. This alert is dismissable.
    </div>
    @endif
@endsection
<!-- /.login-box -->

@section('scripts')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@stop

