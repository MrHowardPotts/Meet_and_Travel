<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <img src="final.png" width="50px" height="50px" style="border-radius:50%;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile2.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Find.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="onClickLoadMyGroups()">My Groups</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="onClickLoadArrangments()">Arrangements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chat.php">Chat</a>
        </li>
        <li class="nav-item">
        <?php
          if($_SESSION['type']=="agency"){
          echo "<a class='nav-link' href='newArrangement.php'>Create Arrangement</a>";
          }
        ?> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="onClickLoadWishes()">My Wishes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']?>" class="logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>