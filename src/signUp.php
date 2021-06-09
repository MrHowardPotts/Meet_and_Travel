<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/welcomeLogin&SignUp.css">
  <title>Document</title>
</head>
<body>
  <div class="signup-box">
    <section class="form signup">
      <h2><img src="relayfinal.png" width="150px" height="150px"></h2>
      <form id="form" action="#" enctype="multipart/form-data">
        <div id="error" class="errorMsg"></div>
        <div class="field input">
          <label>Select picture</label>
          <input type="file" name="picture" required>
        </div>
        <div class="user-box">
          <input id="fname" type="text" name="fname" required>
          <label>First name</label>
        </div>
        <div class="user-box">
          <input id="lname" type="text" name="lname" required>
          <label>Last name</label>
        </div>
        <div class="user-box">
          <input id="username" type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="user-box">
          <input id="email" type="text" name="email" required>
          <label>Email</label>
        </div>
        <div class="user-box">
          <input id="password1" type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="user-box">
          <input id="password2" type="password" name="confirm" required>
          <label>Confirm password</label>
        </div>
        <div>
          <input type="radio" name="gender" value="user"> User
          <input type="radio" name="gender" value="agency"> Agency
        </div>
        <div class="button" align="center">
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
  <script src="javascript/signup2.js"></script>
</body>
</html>