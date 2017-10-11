@extends('layouts.app2')


@section('content')
<!--<div class="container">-->
    <div class="row ">
        <div class="col-md-12">
        <div class="col-md-3" style="border-radius: 10px; border: 1px solid #bdc3c7; padding: 10px; width: 250px;  margin-left: 5px;" >
          <center> <img src="images/Asset 34x.png" alt="" style="width: 60px; height: 60px;"/>
               <p> Pharmacy Name</p>
               <img src="images/08.jpg" alt="" style="width: 200px; height: 200px;"/>
               <p> Offer Name</p>
               <p> Offer Short description</p>
               <p> Offer Short description</p>
               <p> Offer Short description</p>
               <p> Pharmacy Details</p>
               <p> Pharmacy Details</p>
          </center>  
        </div>
        <div class="col-md-7 ">
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

        <div class="col-md-3" style="border-radius: 10px; border: 1px solid #bdc3c7; padding: 10px; width: 250px;  margin-left: 5px;" >
          <center> <img src="images/Asset 34x.png" alt="" style="width: 60px; height: 60px;"/>
               <p> Pharmacy Name</p>
               <img src="images/08.jpg" alt="" style="width: 200px; height: 200px;"/>
               <p> Offer Name</p>
               <p> Offer Short description</p>
               <p> Offer Short description</p>
               <p> Offer Short description</p>
               <p> Pharmacy Details</p>
               <p> Pharmacy Details</p>
          </center>  
        </div>
    </div>
</div>
<!--</div>-->
@endsection
