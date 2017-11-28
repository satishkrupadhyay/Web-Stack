<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmacy</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/jquery.datatables.min.css') }}">
    
    <style type="text/css">
        .blank {
            display: none;
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
                    <a href="{{ url('/home') }}" class="navbar-brand"><img src="images/Final Logo3x.png" alt="Logo" style="width:40px; height:40px; margin-top: -10px; "/></a>

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Hello {{ Auth::user()->store_name  }}
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
                                    <i class="fa fa-user-circle-o fa-2x " aria-hidden="true"></i>
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
      @include('layouts.pharm_nav')
               
            </div>
        </nav>

        @yield('content')
    </div>  

        <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Added Drug Details</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <!-- <div class="list-group">  -->
                <div class="table-responsive"> 
                <table class="table table-hover display" id="datatable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>Sl. No</th> -->
                        <th>Drug Name</th>
                        <th>Generic Name</th>
                        <th>Price</th>
                        <th>Manufacturer</th>
                        <!-- <th>Exp. Date</th>
                        <th>Mfd. Date</th> -->
                        <th>Strength</th>
                        
                        <th>Drug Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                        <tbody>

                            <?php $i=1; ?>
                           @foreach ($data as $value)

                                <!-- <a href="" class="list-group-item"> 
                                    <li style="list-style-type:none"><b>Drug Name:</b> {{$value->brand_name}}</li> 
                                    <li style="list-style-type:none"><b>Generic name:</b> {{$value->generic_name}}</li> 
                                    <li style="list-style-type:none"><b>Price:</b> {{$value->price}}</li>  
                                    <li style="list-style-type:none"><b>Manufacturer:</b> {{$value->manufacturer}}</li> 
                                    <li style="list-style-type:none"><b>Expiry Date:</b> {{$value->exp_date}}</li>
                                    <li style="list-style-type:none"><b>Manufactured Date:</b> {{$value->mfg_date}}</li>
                                    <li style="list-style-type:none"><b>Dosage:</b> {{$value->dosage}}</li>
                                    <li style="list-style-type:none"><b>Type:</b> {{$value->type}}</li>
                                </a> -->
                                <tr>
                                   <!--  <td>{{$i}}</td> -->
                                    <td>{{$value->brand_name}}</td>
                                    <td>{{$value->generic_name}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->manufacturer}}</td>

                           @foreach($data as $value)

                                <tr id="row-{{ $value->drug_id }}" >
                                    <td>
                                       {{$value->brand_name}}
                                    </td>
                                    <td>
                                        {{$value->generic_name}}
                                    </td>
                                    <td>
                                        {{$value->price}}
                                    </td>
                                    <td>
                                        {{$value->manufacturer}}
                                    </td>

                                    <!-- <td>{{\Carbon\Carbon::parse($value->exp_date)->format('d-M-Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($value->mfg_date)->format('d-M-Y')}}</td> -->
                                    <td>
                                        {{$value->dosage}}
                                    </td>
                                    
                                    <td>
                                        {{$value->type}}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary edit" id="entry-{{ $value->drug_id }}">Edit</a>
                                    </td>
                                </tr>
                           @endforeach
                           </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--
Modal for editing drug details
    -->
<div class="modal fade" id="edit-modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body" style="min-height: 229px">
                <form id="drugDetailForm">
                    <div class="col-md-6">
                        <label class="control-label">Drug/Brand Name</label>
                        <input id="brandname" type="text" class="form-control" name="brandname" required autofocus >
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Generic Name</label>
                        <input id="genericname" type="text" class="form-control" name="genericname" required autofocus >
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Manufacturer Name</label>
                        <input id="manufacturer" type="text" class="form-control" name="manufacturer" required autofocus >
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Price</label>
                        <input id="price" type="text" class="form-control" name="price" required autofocus >
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12" style="padding: 0">
                        <label class="control-label">Strength</label>
                        </div>
                        <div class="col-md-6" style="padding: 0">
                        <input id="strength" type="text" class="form-control" name="strength" required autofocus >
                        </div>
                        <div class="col-md-6">
                        <select id ="strength_unit" class = "form-control" name="strength_unit" required>
                          <option value="mg">mg</option>
                          <option value="ml">ml</option>
                          <option value="gm">gm</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Drug Type</label>
                        <select id ="type" class = "form-control" name="type" required>
                          <option value="tablets">Tablets</option>
                          <option value="syrup">Syrup</option>
                          <option value="gel">Gel</option>
                          <option value="injection">Injection</option>
                          <option value="capsules">Capsules</option>
                        </select>
                    </div>
                     <input type="hidden" name="drug_id" id="drug_id">
                </form>
            
            </div>
            <div style="clear: both;"></div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary" id="save_changes">Save changes</button>
            </div>
        </div>
    </div>
</div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.datatables.min.js') }}"></script>
</body>



<script type="text/javascript">
    $(document).ready(function() {
    $('#datatable').DataTable({
        "aLengthMenu": [[7, 10, 25, -1], [7, 10, 25, "All"]],
        "iDisplayLength": 7
    });
} );
</script>


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });


    $('#datatable').on('click', '.edit', function() {

        var id = $(this).attr('id').split('-')[1];

        $('#edit-modal').modal('show');

        $.ajax({

            type : 'GET',
            url : "/ViewDrugdetail/ajax-edit-drugs",
            data: 'id=' + id,
            dataType: 'json',

            success: function(response) {

                $('#brandname').val(response.brand_name);
                $('#genericname').val(response.generic_name);
                $('#strength').val(response.dosage.split(" ")[0]);
                $('#strength_unit').val(response.dosage.split(" ")[1]);
                $('#manufacturer').val(response.manufacturer);
                $('#price').val(response.price);
                $('#type').val(response.type);
                $('#drug_id').val(response.drug_id);
                

            }

        });


        return false;

    });


    $('#save_changes').on('click', function() {

        var drug_id = $('#drug_id').val();

        $.ajax({

            type : 'GET',
            url : "/ViewDrugdetail/ajax-postedit-drugs",
            data: $('#drugDetailForm').serialize(),

            success: function(response) {

                //$('#edit-modal').modal('hide');
                
                 var datatable = $('#datatable').DataTable();
                // datatable.row("#row-"+drug_id).remove().draw();
                // datatable.row.add(response).draw();
                // var rowIndex = datatable.row.add(response).index();
                // datatable.rows(rowIndex).nodes().to$().attr("id", 'but');
                // console.log(rowIndex);
                //window.location.href = '/ViewDrugdetail';
                $('#edit-modal').modal('hide');
                datatable.search('').draw();
                 $('#app').after('<div class="alert alert-dismissable alert-info col-md-8 col-md-offset-2" id="alert_edit"><p>Drug details updated successfully</p></div>');
                 $('#alert_edit').delay(2000).fadeOut();
            }

        });

        return false;

    });



</script>



</html>
