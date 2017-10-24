
@extends('layouts.app')
<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">User Login/SignUp</h4>
</div>


@section('content')
<div class="modal-body">
<!--<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-default">
                 <div class="panel-heading">Login/SignUP</div>-->

              <!--  <div class="panel-body">-->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" data-toggle="modal" data-target="#forgot" >
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="form-horizontal col-md-offset-2 ">
                                <button type="submit" class="btn btn-primary btn-custom">
                                    Login
                                </button>

                                
                                <a class="btn btn-primary btn-custom" href="{{ url('/register') }}"  data-toggle="modal" data-target="#registermodal" >
                                    Register
                                </a>

                            </div>
                        </div>
                    </form>
                <!--</div>-->
            <!-- </div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->

                
</div>
@endsection
        
            
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            

         <!--   <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            

         <!--   <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->