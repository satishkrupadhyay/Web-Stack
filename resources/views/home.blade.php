@extends('layouts.app2')

<script src="{{ asset('js/app.js') }}"></script>
@section('content')
<!--<div class="container">-->
    <div class="row ">
        <div class="col-md-12">
        <div class="col-md-3"  >
          <center> 
            <img src="images/flier.jpg" alt="" style="width: 70%; "/>
                  
          </center>  
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
