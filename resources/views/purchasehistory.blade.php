@extends('layouts.app2')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5" style="border-radius: 10px; border: 1px solid #bdc3c7; padding: 10px; width: 250px;  margin-left: 5px;" >
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
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Purchase History</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                     @if (session('statusreg'))
                    <div class="alert alert-success">
                        {{ session('statusreg') }}
                    </div>
                    @endif

                   <div class="list-group">
                               
                                
                                
                           @foreach ($data as $value)

                                <a href="" class="list-group-item col-md-12"> 
                                    <div class="col-md-8">
                                    <li style="list-style-type:none"><b>ORDER ID:</b> {{$value->order_id}}</li> 
                                    <li style="list-style-type:none"><b>DRUGS:</b> {{$value->drug_name}}</li>
                                    <li style="list-style-type:none"><b>PRICES:</b> {{$value->price}}</li> 
                                    <li style="list-style-type:none"><b>QUANTITY:</b> {{$value->quantity}}</li>
                                    <li style="list-style-type:none"><b>AMOUNT:</b> {{$value->amount}}</li>   
                                    <li style="list-style-type:none"><b>DATE OF ORDER:</b> {{$value->date_of_purchase}}</li> 
                                    </div>
                                    <div class="col-md-4">
                                    <img src="/upload/{{$value->image}}" width="150px" height="150px" onclick="window.open(this.src)" style="border:solid 1px #999;">
                                    </div>
                                </a>



                           @endforeach

                    </div> 
                     {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
