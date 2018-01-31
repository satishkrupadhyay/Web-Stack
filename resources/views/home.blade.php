@extends('layouts.app2')
<style type="text/css">

    body
    {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden; 
    }
</style>
<script src="{{ asset('js/app.js') }}"></script>
@section('content')
<!--<div class="container">-->
    <div class="row ">
        <div class="col-md-12">
        <div class="col-md-3"  >
          <center> 
            <img src="images/flier.jpg" alt="" style="width: 70%; "/>
                  
          </center>  f
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   @if(Session::has('welcome_message'))
                        <div class="alert alert-success">
                            {{ Session::get('welcome_message') }}
                        </div>
                    @endif

                    You are logged in!
                     @if (session('statusreg'))
    <div class="alert alert-success">
        {{ session('statusreg') }}
    </div>
@endif
                </div>
            </div>
        </div>

        <div class="col-md-3"  >
          <center> <img src="images/flier.jpg" alt="" style="width: 70%;"/>
               
               
          </center>  
        </div>
    </div>
</div>
<!--</div>-->
@endsection
