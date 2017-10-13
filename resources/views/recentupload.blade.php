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
                <div class="panel-heading">Recent Upload:</div>
                
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

                                             
                                    @if($message = Session::get('success'))

                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <strong>{{ $message }}</strong>
                                        
                                    </div>

                                    
                                    @endif  
                                
                           @foreach ($data as $value)

                                    

                                    <div class="col-md-12 list-group-item">
                                    <div class="col-md-8">
                                    <li style="list-style-type:none"><b>ORDER ID:</b> {{$value->order_id}}</li> 
                                    <li style="list-style-type:none"><b>DATE OF ORDER:</b> {{$value->date_of_purchase}}</li></br> 
                                    <a href="{{action('recentuploadController@cancelorder', $value->order_id)}}" class="btn btn-danger btn-xs">Cancel Order</a>
                                    </div>
                                    <div class="col-md-4">
                                    <img src="/pres/{{$value->image}}" width="150px" height="100px" onclick="window.open(this.src)" alt="Prescription"style="border:solid 1px #999;">
                                    </div>

                                
                                    </div> 
                           @endforeach

                    
                     {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
