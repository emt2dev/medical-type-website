<div class="container">
  <form method="post" action="../includes/controllers/general.php">
    <div class="row">
      <h4>Admin Login</h4>
      <div class="input-group input-group-icon">
        <?php
        if(isset($_SESSION['email_unfound'])) {
          echo "<label class='form-label btn btn-outline-danger text-dark' for='email'>".$_SESSION['email_unfound']."</label><br />";
          echo"
              <input type='email' value='curved_arrow@protonmail.com' name='email' required /><br />
          ";
        } else {
            echo"
              <label class='form-label' for='email'>Email</label><br />
                <input type='email' value='curved_arrow@protonmail.com' name='email' required /><br />
            ";
        }?>
      </div>
    </div>
    <div class="row">
      <h4>Password</h4>
      <div class="input-group input-group-icon">
      <?php
      if(isset($_SESSION['password_incorrect'])) {
        echo "<label class='form-label btn btn-warning' for='password'>".$_SESSION['password_incorrect']."</label><br />";
        echo"
            <input type='password' value='Test123456' name='password' minlength='8' maxlength='16' required /><br />
        ";
      } else {
          echo"
          <label class='form-label' for='password'>Enter today's password</label><br />
            <input type='password' value='Test123456' name='password' minlength='8' maxlength='16' required /><br />
          ";
      }?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-large btn-success text-light" type="submit" name="admin_login">Login</button>
      </div>
      <div class="col-md-6">
        <button class="btn btn-large btn-outline-success text-dark" type="reset" name="cancel">Cancel</button>
      </div>
    </div>
  </form>
</div>
