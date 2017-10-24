@extends('layouts.app2')

<script src="{{ asset('js/app.js') }}"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"  >
          <center> 
            <img src="images/flier.jpg" alt="" style="width: 80%;"/>
               
          </center>  
        </div>
        <div class="col-md-8">
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

                                
                                    <div class="col-md-12 list-group-item">
                                    <div class="col-md-8">
                                    <li style="list-style-type:none"><b>ORDER ID:</b> {{$value->order_id}}</li> 
                                    <li style="list-style-type:none"><b>DRUGS:</b> {{$value->drug_name}}</li>
                                    <li style="list-style-type:none"><b>PRICES:</b> {{$value->price}}</li> 
                                    <li style="list-style-type:none"><b>QUANTITY:</b> {{$value->quantity}}</li>
                                    <li style="list-style-type:none"><b>AMOUNT:</b> {{$value->amount}}</li>   
                                    <li style="list-style-type:none"><b>DATE OF ORDER:</b> {{\Carbon\Carbon::parse($value->date_of_purchase)->format('d-M-Y')}}</li>
                                    <a href="/prescription_file/{{$value->file}}" class="btn btn-primary btn-xs" target="_blank">Download Invoice</a> 
                                    </div>
                                    <div class="col-md-4">
                                    <img src="/pres/{{$value->image}}" width="150px" height="150px" onclick="window.open(this.src)" style="border:solid 1px #999;">
                                    </div>
                                </div>



                           @endforeach

                    </div> 
                     {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
