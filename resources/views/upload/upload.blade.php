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
    </style>
    
    
    <script src="{{ asset('js/app.js') }}"></script>
  
		
    @section('content')
		<div class="container"> 
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Upload prescription to place your order</h4>					
				</div>
				<div class="panel-body">

                    @if (count($errors)== 0)
                    <div>                    
                        <ul>
                            <li><h6>The File must be of type: jpeg, jpg, png </h6></li>
                            <li><h6>The Size must be < 2MB</h6></li>
                        </ul>                           
                    </div>
                    @endif

					@if (count($errors)>0)
					<div class="alert alert-danger">
						<strong>Oops !</strong> There were some problem with your file.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if($message = Session::get('success'))

					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert"></button>
						<strong>{{ $message }}</strong>
						
					</div>

					
					@endif
					@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                     @endif  
       <center>    <img src="images/upload-2-512.png" style="width:80px; height:80px;" alt="" /> </center> <br>




	<form action="{{ route('upload.file')}}" enctype="multipart/form-data" method="post" >
					{{csrf_field()}}
					
                
                    
                                    <div class="input-group">
                                        <input id='urlname' type="text" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file ">
                                                Browse <input type="file" id="imgInp" name="file">
                                            </span>
                                        </span>                                   
                                        
                                    </div>
                                  <br>
                                    <div>
                                    <input type="submit" name="Upload" class="btn btn-md btn-success pull-right" value="Upload">
                                    </div>
                                </br>
                                    <div class="col-md-6 col-md-offset-3">
                                    <img id='img-upload' />
                                    </div>

                                    <input type="hidden" name="usr_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="usr_email" value="{{ Auth::user()->email }}">

                                    <input type="hidden" name="user_locality" value="{{ Auth::user()->user_locality }}">

                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">

                                    <input type="hidden" name="user_phone" value="{{ Auth::user()->phone }}">
                                </br>
                                <!--
                                    <div class="col-md-10 col-md-offset-5">
                                    
                                    <input type="submit" name="Upload" class="btn-bs-file btn btn-md btn-success" value="Upload">
                                    </div>
                                -->
                      
				    </form>
				

                </div>
			</div>
		</div>

@endsection
		
<script type="text/javascript">
    $(document).ready( function() {
    
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
        
        $("#clear").click(function(){
            $('#img-upload').attr('src','');
            $('#urlname').val('');
        });
    });
</script>
