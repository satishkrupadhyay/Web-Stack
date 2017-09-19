
<!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>View Orders</strong></div>

                <div class="panel-body col-md-4">
                    
                    
                   <img src="/upload/1505473424.jpg" width="400px" height="600px">

                </div>

                 <div class="panel-body col-md-7 col-md-offset-1">
                   
                    
                    <form id="bookForm" method="post" class="form-horizontal" action="">
                    
                    <div class="panel panel-default">
  
                    <div class="panel-heading">Medicine Details</div>
                    <div class="panel-body">
                      
                    <div id="education_fields">
                              
                    </div>
                    <div class="col-xs-4">                      
                        <input type="text" class="form-control" id="medname" name="medname[]" value="" placeholder="Medicine" required>                      
                    </div>

                    <div class="col-xs-4">                      
                        <input type="text" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" required>                     
                    </div>

                    <div class="col-xs-2">                      
                        <input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price" required>                      
                    </div>

                    <div class="col-xs-1">                 
                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>                                                 
                    </div>


                    <div class="clear"></div>

                      
                    </div>
                      
                      
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass"+room);
    var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-xs-4"><input type="text" class="form-control" id="medname" name="medname[]" value="" placeholder="Medicine" required></div><div class="col-xs-4 nopadding"><input type="text" class="form-control" id="quantity" name="quantity[]" value="" placeholder="Quantity" required></div><div class="col-xs-2 nopadding"><input type="text" class="form-control" id="price" name="price[]" value="" placeholder="Price" required></div><div class="col-xs-1 nopadding"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
       $('.removeclass'+rid).remove();
   }
</script>