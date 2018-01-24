<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Drug Detail</title>
    <link rel="icon" href="images/favicon.ico">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 





    <style type="text/css">
        
    .result {
        min-height: 31px;
        text-decoration: none;
        cursor: pointer;
        list-style: none;
        text-decoration: none;
    }

    .list {
    padding: 0;
    line-height: 25px;
    z-index: 9999999;
    background: white;
    border: 1px solid #ccc6c6;
    width: 100%;
    }

    .listTitle {
       list-style: none;
    padding: 5px 6px;
    text-decoration: none;
    cursor: pointer;
    }

    @media (max-width: 992px) {

        .strength_con {
            margin-bottom: 20px !important;
        }
    }

    .ui-autocomplete { min-height: 20px; max-height: 200px; overflow-y: scroll; overflow-x: hidden;}

    .force-overflow
        {
            min-height: 450px;
        }
/*
 *  STYLE 2
 */

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #D62929;
}







    </style>
  
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
                    <a href="{{ url('/admin') }}" class="navbar-brand"><img src="images/Final Logo3x.png" alt="Logo" style="width:40px; height:40px; margin-top: -10px; "/></a>

                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        Hello {{ Auth::user()->store_name  }}
                    </a>
                </div>

               @include('layouts.pharm_nav')

            </div>
        </nav>

        @yield('content')
    </div>
    <br>
		
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Drug Detail Form</strong></div>

                <div class="panel-body">
                   
                   @if($message = Session::get('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                        
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('submit.form') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('brandname') ? ' has-error' : '' }}">
                            <label for="brandname" class="col-md-4 control-label">Drug/brand Name</label>

                            <div class="col-md-6">
                                <input id="brandname" type="text" class="form-control" name="brandname" value="{{ old('brandname') }}" placeholder="e.g. Calpol 500 MG" required >
                                <div id="brand_result">
                                    
                                </div>

                                @if ($errors->has('brandname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brandname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genericname') ? ' has-error' : '' }}">
                            <label for="genericname" class="col-md-4 control-label">Generic Name</label>

                            <div class="col-md-6">
                                <input id="genericname" type="text" class="form-control" name="genericname" value="{{ old('genericname') }}" placeholder="e.g. Paracetamol" required  >

                                <div id="generic_result">
                                    
                                </div>



                                @if ($errors->has('genericname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genericname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label for="manufacturer" class="col-md-4 control-label">Manufacturer</label>

                            <div class="col-md-6">
                                <input id="manufacturer" type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="e.g.  Glaxosmithkline Pharmaceuticals Ltd" required>

                                 <div id="manufacturer_result">
                                    
                                </div>

                                @if ($errors->has('manufacturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="numeric" class="form-control" name="price" style="width: 30%" value="{{ old('price') }}" placeholder="16.50" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dosage" class="col-md-4 control-label">Strength</label>

                            <div class="col-md-2 strength_con">
                                <input id="strength" type="text" class="form-control" name="strength" value="{{ old('strength') }}" placeholder="e.g. 1-10000 " required >
                                @if ($errors->has('dosage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dosage') }}</strong>
                                    </span>
                                @endif      
                           </div>
                           <div class="col-md-3">
                                <select id ="strength_unit" class = "form-control" name="strength_unit" style="width: 35%" value="{{ old('strength_unit') }}" required>
                                      <option value="mg">mg</option>
                                      <option value="ml">ml</option>
                                      <option value="gm">gm</option>
                                </select>
                            </div> 
                            
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Drug Type</label>

                            <div class="col-md-6">
                                <select id ="type" class = "form-control" name="type" style="width: 30%" value="{{ old('type') }}" required>
                                      <option value="tablets">Tablets</option>
                                      <option value="syrup">Syrup</option>
                                      <option value="gel">Gel</option>
                                      <option value="injection">Injection</option>
                                      <option value="capsules">Capsules</option>
                                </select>
                                
                            </div>
                        </div>
                        <input type="hidden"  name="pharmacy_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                        @if (session('statusreg'))
    <div class="alert alert-success">
        {{ session('statusreg') }}
    </div>
@endif
                    </form>
                     
                 </div>
            </div>
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
</body>
</html>

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

    </script>
     <!-- end Scripts for valid price -->

<!-- Scripts for valid strength(only numbers) -->
     <script type="text/javascript">
        
       
            // function selectBrand(val) {
            //     $("#brandname").val(val);
            //     $("#brand_result").hide();
            // }

            // function selectGeneric(val) {
            //     $("#genericname").val(val);
            //     $("#generic_result").hide();
            // }

            // function selectManufacturer(val) {
            //     $("#manufacturer").val(val);
            //     $("#manufacturer_result").hide();
            // }
        
        


         $("#strength").on("input",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
<!-- end Scripts for valid strength(only numbers) -->

<script type="text/javascript">
 

 //this function colors the text typed by the user.. this method is called monkey patching
 // we are redefining the original renderItem function with this one
 function monkeyPatchAutocomplete() {

      var oldFn = $.ui.autocomplete.prototype._renderItem;

      $.ui.autocomplete.prototype._renderItem = function( ul, item) {
          var re = new RegExp("^" + this.term) ;
          var t = item.label.replace(re,"<span style='font-weight:bold;color:#3097D1;'>" + 
                  this.term + 
                  "</span>");
          return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append( "<a>" + t + "</a>" )
              .appendTo( ul );
      };
  }


$(function() {
     
     monkeyPatchAutocomplete(); // calling the function here
    
    //autocomplete
    $("#brandname").autocomplete({
        source: "{{ Route('ajax.searchbrandname') }}",
        minLength: 1,
    });  


    //autocomplete
    $("#genericname").autocomplete({
        source: "{{ Route('ajax.searchgenericname') }}",
        minLength: 1
    });  


    //autocomplete
    $("#manufacturer").autocomplete({
        source: "{{ Route('ajax.searchmanufacturer') }}",
        minLength: 1
    });                

});

</script>
