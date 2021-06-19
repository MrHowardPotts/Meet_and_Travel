<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location: login.php');
  }
?>

<?php include_once "header.php";?>
  <body onload="onLoadWish()" style="align-items: start;">
   
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
            

  <!-- Wish -->
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="WishID" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center">Create Wish</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div class="destination" style="margin-bot: 20px;">
              <input id="groupWishPicture" type="file" name="pictureDest" required> 
            </div>
            <div class="destination">
              <input id="destination" type="text" name="destination" placeholder="enter destination" required="">
              <label>Name of the place</label>
            </div>
            <div class="date">
              <p>Select date range:</p>
              <input id="WishDate" type="text" name="daterange" required="" placeholder="Select date range:"> 
            </div>
            <div class="input-group destination">
              <input id="groupBudget" type="text" style="width: 98%;" placeholder="enter your budget" required="">
            </div>
            <div class="text-center" >
              <button type="button" name="search" id="search" class="btn btn-default" style="height: 52px; margin-right: 10px;" onclick="searchWish()">Search</button> <!--If not found add to my wishes-->
              <button type="button" name="wish" id="wishes"class="btn btn-default" style="height: 52px; margin-right: 10px;" onclick="saveWish()" data-dismiss="modal">Save to<br>my wishes</button>
              <button type="button" name="group" id="group"class="btn btn-default" onclick="showGroupFileds()">Create<br>group</button>
            </div>
          </div>
          <div class="modal-footer">
            <div id="groupPictureDiv" class="col-sm-3 col-md-3 col-lg-5 col-xl-4" hidden>
              <input id="groupPicture" type="file" name="pictureGroup" required>
            </div>
            <div id="groupNameDiv" class="col-sm-3 col-md-3 col-lg-5 col-xl-4" hidden>
              <input id="groupName" type="text" name="groupName" placeholder="enter group name" required>
              <label>Group name</label>
            </div>
            <div id="groupSaveDiv" class="col-sm-3 col-md-3 col-lg-1 col-xl-2" align="center" hidden>
            <button id="groupSave" type="button" name="save" id="save"class="btn btn-default" onclick="saveGroup()" data-dismiss="modal">Save</button>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-1 col-xl-2" align="center">
              <button type="button" name="cancel" id="cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </td>
      </tr>
    </table>
    
   
    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
    <script src="javascript/buttons.js"></script> 
  
  </body>
</html>
