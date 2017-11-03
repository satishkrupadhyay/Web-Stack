@extends('layouts.app2')

    <!-- alert for confirmation -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" data-semver="3.1.1" data-require="bootstrap-css" />
     <script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" data-semver="3.1.1" data-require="bootstrap"></script>
    <script src="http://bootboxjs.com/bootbox.js"></script>
    <!-- end alert for confirmation -->

    

<!--<script src="{{ asset('js/app.js') }}"></script> -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          <center> 
            <img src="images/Flier.jpg" alt="" style="width: 80%;"/>
               
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

                    @if (count($data)== 0)
                    <div>                    
                       
                        <h5>You don't have any recent upload ! </h5>
                                         
                    </div>
                    @endif  
                                
                           @foreach ($data as $value)

                                    

                                    <div class="col-md-12 list-group-item">
                                    <div class="col-md-8">
                                   <!-- <li style="list-style-type:none"><b>ORDER ID:</b> {{$value->order_id}}</li> -->
                                    <li style="list-style-type:none"><b>DATE OF ORDER:</b> {{\Carbon\Carbon::parse($value->date_of_purchase)->format('d-M-Y h:i:s a')}}</li></br> 
                                    <a href="{{action('recentuploadController@cancelorder', $value->order_id)}}" class="btn btn-danger btn-xs" id="cancel" name="cancel" data-bb="confirm" onclick="myFunction()">Cancel Order</a>
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

<!-- Scripts for alert on proceed -->
    <script type="text/javascript">

    $(document).ready(function(){
        $("#cancel").click(function(e){

        var currentForm = this;
        e.preventDefault();
            bootbox.confirm({
            message: "Are you sure you want to cancel your order ?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                 if (result) {
             window.location = $("a[data-bb='confirm']").attr('href');
                }
            }
            });
            });
    });
    </script>
<!-- end Scripts for alert on proceed -->