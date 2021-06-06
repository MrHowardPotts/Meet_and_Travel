<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location: login.php');
  }
?>

<?php include_once "header.php";?>
  <body onload="onLoad()">
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
          
            <div class="wrapper results-wrapper container-fluid">
                <div class='row'>
                </div>
            </div>
            

              <!--Modals CONES_CODE -->
              <div class="container">
                
                <!-- Modal -->
                <div class="modal fade" id="PayID" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" align="center">Enter Ammount</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group destination">
                          <input type="text" style="width: 98%;"required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" align="center">
                        <button type="button" name="submit" id="submit"class="btn btn-default" style="margin-top:5px;">Pay</button>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" align="center">
                          <button type="button" name="cancel" id="cancel" style="margin-top:5px;" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

              <!--Modal Arrangement -->

              <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="ArrangementID" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center">Create Wish</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
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

  <!-- Wish -->
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="WishID" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center">Create Arrangement</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
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
            </div>
            <div class="text-center" >
              <button type="button" name="search" id="search" class="btn btn-default" style="height: 52px; margin-right: 10px;">Search</button> <!--If not found add to my wishes-->
              <button type="button" name="wish" id="wishes"class="btn btn-default" style="height: 52px; margin-right: 10px;">Save to<br>my wishes</button>
              <button type="button" name="group" id="group"class="btn btn-default">Create<br>group</button>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-sm-3 col-md-3 col-lg-5 col-xl-4" hidden>
              <input type="file" name="pictureGroup" required>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-5 col-xl-4" hidden>
              <input type="text" name="groupName" required>
              <label>Group name</label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-2" align="center" hidden>
            <button type="button" name="save" id="save"class="btn btn-default">Save</button>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-2" align="center">
              <button type="button" name="cancel" id="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

    <!-- Groups-AcceptArrangment -->
            <div class="container">
                
                <!-- Modal -->
                <div class="modal fade" id="GroupID" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" align="center">Select Group</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group destination">
                        <select id="selectGroup" class="form-select" aria-label="Default select example" style="margin:auto;">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" align="center">
                        <button type="button" name="submit" id="submit"class="btn btn-default" style="margin-top:5px;">Accept</button>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" align="center">
                          <button type="button" name="cancel" id="cancel" style="margin-top:5px;" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

              <!--Modal Arrangement -->


                <!--CONE CODE END  -->
        </td>
      </tr>
    </table>

   
    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
   
    
  </body>
</html>
