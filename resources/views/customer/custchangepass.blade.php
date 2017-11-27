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
  
    
    <script src="{{ asset('js/app.js') }}"></script>
  
    
    @section('content')
     <div class="container" id="my_div">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
    <h3>Change Password</h3>
    <hr>
                <div class="row">
                  
                  
                  <!-- edit form column -->
                  <div class="col-md-12 personal-info">
                    
                    @if(Session::has('message_1'))
                    <div class="alert alert-warning alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message_1') }}
                    </div>
                    @endif

                    @if(Session::has('message_2'))
                    <div class="alert alert-warning alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message_2') }}
                    </div>
                    @endif

                    @if(Session::has('message'))
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message') }}
                    </div>
                    @endif
                    
                    <form class="form-horizontal" role="form" method="post" action="{{ route('view.cust.changepass') }}">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Old Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="old_password" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">New Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="new_password" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Confirm Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="con_password" required="true">
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

                


              </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

