@extends('layouts.app2')

    <style type="text/css">
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
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Upload Your Prescription</h4>					
				</div>
				<div class="panel-body">
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
					
                <div class="col-md-12">
                    
                                    <div class="input-group col-xs-12">
                                        <input id='urlname' type="text" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file ">
                                                Browse <input type="file" id="imgInp" name="image">
                                            </span>
                                        </span>                                   
                                        
                                    </div>
                                  <br>
                                    <div class="input-group col-xs-12">
                                    <input type="submit" name="Upload" class="btn btn-md btn-success pull-right" value="Upload">
                                    </div>
                                
                                    <img id='img-upload' style="height: 600px; width: 700px; border: none;" class="col-md-4 col-md-offset-2" />
                                    <input type="hidden" name="usr_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="usr_email" value="{{ Auth::user()->email }}">
                                    
                           

                        </div>
                      
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
