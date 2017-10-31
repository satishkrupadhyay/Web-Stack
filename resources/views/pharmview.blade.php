<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmacy</title>
    <link rel="icon" href="images/favicon.ico">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- alert for confirmation -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" data-semver="3.1.1" data-require="bootstrap-css" />
     <script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" data-semver="3.1.1" data-require="bootstrap"></script>
    <script src="http://bootboxjs.com/bootbox.js"></script>
    <!-- end alert for confirmation -->

    <style>
            
            #summation {
                
                
                color:#174C68;
            }
            .txt {
                background-color: #FEFFB0;
                
                text-align: right;
            }
        </style>

    <!--<script type="text/javascript">
        $(document).ready(function(e){
            $("input").change(function(){
                var price=0;
                $('input[name^="price"]').each(function(){
                    price = sum + parsInt($(this).val());
                    //alert($(this).val());
                });
                $("input[name=total]").val(price);
            });
        });
        
    </script>-->
  
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-default navbar-static-top" style="background-color: #e3f2fd;">
            <div class="container">
                <div class="navbar-header">

                    <!--Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}">

                        Hello {{Auth::user()->store_name}}

                       
                    </a>
                </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('pharmrecent') }}">Past Orders</a></li>
                        <li><a href="{{ url('Drugdetail') }}">Add Drug Detail</a></li>
                        <li><a href="{{ url('ViewDrugdetail') }}">View Drug Detail</a></li>
                       
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Pharmacy <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
  
                        
                    </ul>
                </div>
            </div>
        </nav>

    @yield('content')
    </div>
        

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div>
                                        <strong>ORDER ID:</strong>{{$order_id}}
                                        </div>
                                        <div>
                                         <strong>CUSTOMER NAME:</strong>{{$name}}
                                        </div>
                                    </div>

                                    <div class="panel-body col-md-4">
                                        
                                        @foreach ($results as $value)
                                       <img src="/pres/{{$value->image}}" width="400px" height="600px">
                                       @endforeach
                                    </div>

                                     <div class="panel-body col-md-7 col-md-offset-1">
                                       
                                        
                                        <form id="bookForm" method="post" class="form-horizontal" action="pharmview">
                                        {{ csrf_field() }}
                                        <div class="panel panel-default">
                      
                                        <div class="panel-heading"><strong>Medicine Details:</strong></div>
                                        <div class="panel-body">
                                          
                                        
                                        <div class="col-xs-4">                      
                                            <input type="text" class="form-control" id="medname" name="medname[]" value="" placeholder="Medicine" required>                      
                                        </div>

                                        <div class="col-xs-4">                      
                                            <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" required onkeyup="calculate();">                     
                                        </div>

                                        <div class="col-xs-3">                      
                                            <input type="number" class="form-control" id="price" name="price[]" value="" placeholder="Price" required onkeyup="calculate();">                      
                                        </div>

                                        <div class="col-xs-1">                 
                                                <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>                                                 
                                        </div>
                                        <br><br>

                                        <div id="education_fields" class="panel-body">
                                                  
                                        </div>


                                        <div class="clear"></div>

                                        
                                          
                                        </div>
                                         <div class="panel-heading">
                                            <div class="form-group">
                                          <label class="col-xs-2 control-label">Amount:</label>
                                            <div class="col-xs-2"> 
                                                             
                                            <input type="number" class="form-control" id="total" name="total" value="" placeholder="Total" required readonly>                     
                                        </div>
                                        </div>
                                         </div> 
                                          
                                        <input type="hidden" id="medname2" name="medname2">
                                        <input type="hidden" id="quantity2" name="quantity2">
                                        <input type="hidden" id="price2" name="price2">
                                        <input type="hidden" id="pharmacy_id" name="pharmacy_id" value="{{Auth::user()->id}}">

                                        <input type="hidden" id="ord_id" name="ord_id" value="{{$order_id}}">

      

                                        </div>
                                         
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-8">
                                                 @foreach ($results as $value)
                                                  <a href="{{action('InvoiceCreator@cancelorder', $value->order_id)}}" class="btn btn-danger"> Cancel Order</a>
                                                  @endforeach
                                                <button type="submit" class="btn btn-success">Proceed</button>

                                                

                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
   


    <!-- Scripts for alert on proceed -->
    <script type="text/javascript">
    $('form').submit(function(e) {
        var currentForm = this;
        e.preventDefault();
        bootbox.confirm("Do you want to proceed ?", function(result) {
            if (result) {
                currentForm.submit();
            }
        });
    });
    </script>
    <!-- end Scripts for alert on proceed -->

    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script>
    var room = 1;
    function education_fields() {
     
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="col-xs-4"><input type="text" class="form-control" id="medname" name="medname[]" value="" placeholder="Medicine" required></div><div class="col-xs-4 nopadding"><input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" required onkeyup="calculate();"></div><div class="col-xs-3 nopadding"><input type="number" class="form-control" id="price" name="price[]" value="" placeholder="Price" required onkeyup="calculate();"></div><div class="col-xs-1 nopadding"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
        
        objTo.appendChild(divtest)

        

    }
    function remove_education_fields(rid) {
           $('.removeclass'+rid).remove();
           calculate();
    }


    $('.form-horizontal').on('submit', function(){
        var medname1 = $("input[name='medname\\[\\]']")
                      .map(function(){return $(this).val();}).get();

        var quantity1 = $("input[name='quantity\\[\\]']")
                      .map(function(){return $(this).val();}).get();
        var price1 = $("input[name='price\\[\\]']")
                      .map(function(){return $(this).val();}).get();

        //alert(medname);
        //alert(quantity);
        //alert(price);
        document.getElementById("medname2").value = medname1;
        document.getElementById("quantity2").value = quantity1;
        document.getElementById("price2").value = price1;

        });



        function calculate(){
          var elems = document.getElementsByName('price[]');
          var elems_qty = document.getElementsByName('quantity[]');
          var sum = 0;
          var pro = 1;
          for (var i = 0; i < elems.length; i++)
          {
            pro = parseFloat(elems[i].value) * parseFloat(elems_qty[i].value)
            sum += pro;

          }
          document.getElementById('total').value = sum;
        }


   
</script>


</body>
</html>






































