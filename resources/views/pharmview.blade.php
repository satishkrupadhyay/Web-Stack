<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmacy</title>
    <link rel="icon" href="../images/favicon.ico">
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

               @include('layouts.pharm_nav')
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
                                            @if(isset($order_id))
                                        <strong>ORDER ID:</strong>{{$order_id}}
                                            @endif
                                        </div>
                                        <div>
                                            @if(isset($name))
                                         <strong>CUSTOMER NAME:</strong>{{$name}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="panel-body col-md-4">
                                        
                                    @if(isset($results))    
                                        @foreach ($results as $value)
                                       <img src="/pres/{{$value->image}}" width="400px" height="600px">
                                       @endforeach
                                    @endif
                                    </div>

                                     <div class="panel-body col-md-7 col-md-offset-1">
                                       
                                        
                                        <form id="bookForm" method="post" class="form-horizontal" action="pharmview">
                                        {{ csrf_field() }}
                                        <div class="panel panel-default">
                      
                                        <div class="panel-heading"><strong>Medicine Details:</strong></div>
                                        <div class="panel-body">
                                        <div class="col-xs-4">
                                        <label for="medicine">Medicine</label>
                                        </div>
                                        <div class="col-xs-4">
                                        <label for="quantity">Quantity</label>
                                        </div>
                                        <div class="col-xs-3">
                                        <label for="price">Price</label>
                                        </div>   

                                        <div class="col-xs-4">
                                                             
                                            <input type="text" class="form-control" id="medname" name="medname[]" value="" placeholder="" required>                      
                                        </div>

                                        <div class="col-xs-4">
                                                              
                                            <input type="number" class="form-control" id="quantity" name="quantity[]" value="" placeholder="" required onkeyup="calculate();">                     
                                        </div
>
                                        <div class="col-xs-3">
                                                             
                                            <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="" required onkeyup="calculate();">                      
                                        </div>

                                        <div class="col-xs-1">                 
                                                <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>                                                 
                                        </div>
                                        <br><br><br>

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

                                        if()
                                        <input type="hidden" id="ord_id" name="ord_id" value="{{$order_id}}">


                                        </div>
                                         
                                        
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-8">
                                            @if( count($results) > 0 && isset($results)) 
                                                 @foreach ($results as $value)
                                                  <a href="{{action('InvoiceCreator@cancelorder', $value->order_id)}}" class="btn btn-danger" id="cancel" name="cancel" data-bb="confirm" > Cancel Order</a>

                                                  @endforeach
                                            @endif
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
         bootbox.confirm({
            message: "<p>Once you <b>Proceed</b> you wont be able to come back to this page.</p>Are you sure you want to <b>proceed</b> ?",
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
                            currentForm.submit();
                            }
            }
            });
    });
    </script>
    <!-- end Scripts for alert on proceed -->

    <script type="text/javascript">

    $(document).ready(function(){
        $("#cancel").click(function(e){

        var currentForm = this;
        e.preventDefault();
            bootbox.confirm({
            message: "Are you sure you want to cancel order ?",
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

    <!-- Scripts for valid quantity of numeric type only -->
    <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $("#quantity").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                return ret;
            });
            $("#quantity").bind("paste", function (e) {
                return false;
            });
            $("#quantity").bind("drop", function (e) {
                return false;
            });
        });
    </script>
    <!-- end Scripts for valid quantity of numeric type only -->

    <!-- Scripts for valid price -->
     <script type="text/javascript">

      $("#price").on("input", function(evt) {
       var self = $(this);
       self.val(self.val().replace(/[^0-9\.]/g, ''));
       if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
       {
         evt.preventDefault();
       }
     });


    @if(isset($status) && $status == 2)
        
        var order_id = $order_id;
        alert("$status is been Cancelled" + order_id);
        window.location = '/admin';
        
    @endif

    </script>
});
     <!-- end Scripts for valid price -->

    <!-- Scripts for alert on cancel -->
    <!-- <script type="text/javascript">

    $(document).ready(function(){
        $("#cancel").click(function(e){

        var currentForm = this;
        e.preventDefault();
            bootbox.confirm({
            message: "Are you sure you want to cancel this order ?",
            buttons: {
                confirm: {
                    label: 'No',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Yes',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                 if (result) {
             window.location = $("a[data-bb='cancel']").attr('href');
                }
            }
            });
            });
    });
    </script> -->
<!-- end Scripts for alert on cancel -->

    <!--<script src="{{ asset('js/app.js') }}"></script>-->

    <script>
    var room = 1;
    function education_fields() {
     
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="col-xs-4"><input type="text" class="form-control" id="medname" name="medname[]" value=""  required></div><div class="col-xs-4 nopadding"><input type="number" class="form-control" id="quantity" name="quantity[]" value=""  required onkeyup="calculate();"></div><div class="col-xs-3 nopadding"><input type="text" class="form-control" id="price" name="price[]" value="" required onkeyup="calculate();"></div><div class="col-xs-1 nopadding"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
        
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
<!-- script for back button disable -->
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
<!-- end script for back button disable -->
</body>
</html>






































