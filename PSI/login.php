<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
 
  <div class="login-box">
    <section class="form signup">
      <h2><img src="relayfinal.png" width="150px" height="150px"></h2>
      <form action="#">
        <div class="errorMsg"></div>
        <div class="user-box">
          <input type="text" name="username" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="">
          <label>Password</label>
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
  <script src="javascript/login.js"></script>
</body>
</html>