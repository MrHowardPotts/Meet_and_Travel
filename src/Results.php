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
        </td>
      </tr>
    </table>
    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
    <script src="javascript/buttons.js"></script> 
  
  </body>
</html>
