<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location: login.php');
  }
?>

<?php include_once "header.php";?>
  <body>
    <table>
      <tr>
        <td>
          <input type="checkbox" id="check">
          <div class="header">
            <h2><img src="relayfinal.png" width="50px" height="50px"></h2>
            <div class="navigation">
              <a href="#"> 
                <span></span>
                <span></span>
                <span></span>
                <span></span>Home</a>
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>About</a>
              <a href="#">
               <span></span>
               <span></span>
               <span></span>
               <span></span>Info</a>
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Services</a>
                <!-- todo -->
                <!-- Bug when loging out -->
              <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']?>" class="logout">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Logout</a>
            </div>
            <p> for="check">
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
                <!-- Groups -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success" onclick="polymorphicAppend()">Request</button>
                                    <form action="#" id="forma1">
                                        <input type="text" name="outgoing_id" value="16"hidden>
                                        
                                        <!-- ovo treba da bude groupID -->
                                        <input type="text" name="incoming_id" value="121"hidden>
                            
                        
                                    </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Request</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Request</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Request</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Arangements -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-warning">Accept</button>
                            </div>
                        </div>
                    </div>

                    <!-- My Groups -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row group">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>ETF GRUPA</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Chat</button>
                                <button class="btn btn-warning">Members</button>
                                <button class="btn btn-primary">Arrangements</button>
                            </div>
                        </div>
                    </div>

                    <!-- Members in Group ID -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row name">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Elon</p>
                                    <p>Musk</p>
                            </div>
                            <div class="col-3">
                                <!-- this section is currently empty -->
                            </div>
                        </div>
                    </div>
                    <!-- Request in Group ID -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row request">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>ETF Grupa</p>
                                    <p>Elon</p>
                                    <p>Musk</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Accept</button>
                                <button class="btn btn-danger">Reject</button>
                            </div>
                        </div>
                    </div>

                    <!-- Paid for specific arrangement -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row pay">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Elon</p>
                                    <p>Musk</p>
                                    <p>price: $500</p>
                                    <p>paid: $150</p>
                            </div>
                            <div class="col-3">
                            <button class="btn btn-success">Pay</button>
                            </div>
                        </div>
                    </div>
                    <!-- Wishes -->
                    <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </div>

                    <!-- Accepted Arrangements -->
                     <div class="col-11 col-md-5 order-1 result-container">
                        <div class="row trip">
                            <div class="col-3">
                                <img class="slika" src="php/images/1620843858relayfinal.png">
                            </div>
                            <div class="col-6">
                                    <p>Belgrade</p>
                                    <p> 12/6/2021</p>
                                    <p> 20/6/2021</p>
                                    <p>Budget: $500</p>
                                    <p>members: 4</p>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-warning">Check Paid</button>
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
   
    
  </body>
</html>
