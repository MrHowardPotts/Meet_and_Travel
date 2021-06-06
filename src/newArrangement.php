<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location: login.php');
  }
?>

<?php include_once "header.php";?>
  <body onload="onLoadArrangement()" style="align-items: start;">
   
  <table>
      <tr>
        <td>
          <input type="checkbox" id="check">
          <div class="header">
            <h2><img src="relayfinal.png" width="50px" height="50px"></h2>
            <div class="navigation">
              <?php
              require('links.php');
              ?>
            </div>
            <label for="check">
              <i class="fas fa-bars menu-btn"></i>
              <i class="fas fa-times close-btn"></i>
            </label>
          </div> 
        </td>
      </tr>
      <tr>
        <td>
            

        <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="ArrangementID" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center">Create Arrangment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div class="destination" style="margin-bot: 20px;">
              <input id="arrImage" type="file" name="pictureDest" required> 
            </div>
            <div class="destination">
              <input id="arrDestination" type="text" name="destination" required="">
              <label>Name of the place</label>
            </div>
            <div class="date">
              <p>Select date range:</p>
              <input id="arrDate" type="text" name="daterange" required="" placeholder="Select date range:"> 
            </div>
            <div class="input-group destination">
              <input id="arrPrice" type="text" style="width: 98%;"required="">
              
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="center">
            <button type="button" name="save" id="save"class="btn btn-default" onclick="saveArr()">Submit Arrangemnt</button>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="center">
              <button type="button" name="cancel" id="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

    <!-- Groups-AcceptArrangment -->
    

              <!--Modal Arrangement -->


                <!--CONE CODE END  -->
        </td>
      </tr>
    </table>
    
   
    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
    <script src="javascript/buttons.js"></script> 
  
  </body>
</html>
