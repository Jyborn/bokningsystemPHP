<?php function loginPopUp() { ?>
<div id="loginContainer">
  <div class="container">
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Admin Login</h2>
          <p>Please enter your email and password</p>
        </div>

        <form id="Login" method="get">

          <div class="form-group">
            <input type="username" name="username" class="form-control" id="inputUsername" placeholder="Username">
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>

          <div class="forgot">
            <a href="reset.html">Forgot password?</a>
          </div>
          <button id="submitLoginButton" type="button" class="btn btn-primary">Login</button>
        </form>
      </div>
      <p class="botto-text"> Designed by Alexander Jyborn</p>
    </div>
  </div>
</div>
<?php }
loginPopUp(); ?>
