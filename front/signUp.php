<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="signup.css">
  <title>Document</title>
</head>
<body>
  <div class="signup-box">
    <section class="form signup">
      <h2><img src="relayfinal.png" width="150px" height="150px"></h2>
      <form action="#">
        <div class="errorMsg">Ovde se ispisuje greska</div>
        <div class="field input">
          <label>Select picture</label>
          <input type="file" name="Slika" required="">
        </div>
        <div class="user-box">
          <input type="text" name="Ime" required="">
          <label>First name</label>
        </div>
        <div class="user-box">
          <input type="text" name="Prezime" required="">
          <label>Last name</label>
        </div>
        <div class="user-box">
          <input type="text" name="Username" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="text" name="Email" required="">
          <label>Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="Password" required="">
          <label>Password</label>
        </div>
        <div class="user-box">
          <input type="password" name="Confirm" required="">
          <label>Confirm password</label>
        </div>
        <div align="center">
          <a href="welcome.html" class="back">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Back
          </a>
          <a href="#" class="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </a>
        </div>
      </form>
    </section>
  </div>
  <script src="javascript/signup.js"></script>
</body>
</html>