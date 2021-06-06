<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="modal/modal.css">
  <link rel="stylesheet" href="css/welcomeLogin&SignUp.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
  <div class="container">
    <h2>Modal Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="myBtn">Open Modal</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Create Wish</h4>
          </div>
          <div class="modal-body">
            <div class="destination" style="margin-bot: 20px;">
              <input type="file" name="pictureDest" required> 
            </div>
            <div class="destination">
              <input type="text" name="destination" required="">
              <label>Name of the place</label>
            </div>
            <div class="date">
              <p>Select date range:</p>
              <input type="text" name="daterange" required="" placeholder="Select date range:"> 
            </div>
            <div class="input-group destination">
              <input type="text" style="width: 98%;"required="">
              <div class="input-group-btn">
                <button type="button" name="price" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RSD <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#">RSD</a></li>
                  <li><a href="#">EUR</a></li>
                  <li><a href="#">DOL</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="center">
            <button type="button" name="save" id="save"class="btn btn-default">Submit wish</button>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="center">
              <button type="button" name="cancel" id="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <!--Date range picker-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="modal/modal.js"></script>
  <script>
    $(document).ready(function(){
      $('#myBtn').click(function(){
        $('#myModal').modal();
      });
    });
  </script>
</body>
</html>