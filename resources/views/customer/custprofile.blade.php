@extends('layouts.app2')

    <style type="text/css">

    body
    {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden; 
    }
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
    }

    #ui-datepicker-div { font-size: 12px; } 


    </style>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
    
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
  
    
    @section('content')
   <div class="container" id="my_div">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
    <h3>Profile</h3>
    <hr>
                <div class="row">
                  
                  
                  <!-- edit form column -->
                  <div class="col-md-9 personal-info">
                    
                    @if(Session::has('success_edit'))
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong>Well done! </strong>{{ Session::get('success_edit') }}
                    </div>
                    @endif
                    
                    <form class="form-horizontal" role="form" method="post" action="{{ route('view.cust.profile') }}">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $custData->name }}" name="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">E-mail:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $custData->email }}" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Phone:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $custData->phone }}" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Gender:</label>
                        <div class="col-lg-8">
                          <label>Male <input type="radio" value="{{ $custData->gender }}" <?php echo ($custData->gender == 'male') ? 'checked="checked"' : ''; ?> name="gender"></label>
                          <label>Female <input type="radio" value="{{ $custData->gender }}" <?php echo ($custData->gender == 'female') ? 'checked="checked"' : ''; ?> name="gender"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">DOB:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $custData->dob }}" name="dob" id="dob">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                          <textarea name="address" class="form-control" name="address">{{ $custData->address }}</textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">User Locality:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $custData->user_locality }}" name="user_locality">
                        </div>
                      </div>

                        {{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                          <input type="submit" class="btn btn-primary" value="Save Changes">
                          <span></span>
                          <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                      </div>
                    </form>
                  </div>

                  <!-- left column -->
                  <div class="col-md-3">
                    <div class="text-center">
                      <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                      <h6>Upload a different photo...</h6>
                      
                      <input disabled type="file" class="form-control">
                    </div>
                  </div>


              </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
  
  $('#dob').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "m/d/yy",
    yearRange: "-80:+0",
});



</script>

@endsection

