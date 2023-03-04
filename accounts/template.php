<?php
session_start();
if(!isset($_SESSION['is_account_holder'])) {
  header('Location: http://localhost/basic_workshop/login.php');
  exit();
}
$_SESSION['header_routing'] = 'account';
$_SESSION['base_url'] = 'http://localhost/basic_workshop';
include "../includes/partials/header.php";
?>
  <!-- Account Information -->
  <div class='container'>
    <form method='post' action='<?= $_SESSION['base_url']; ?>/includes/controllers/account.php'>
      <div class='row'>
        <h4>Please Verify Account Information</h4>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='first'>First Name</label><br />
            <input type='text' value='Thomas' name='first' value='<?= $_SESSION['first']?>' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='middle'>Middle Name</label><br />
            <input type='text' value='Smith' name='middle' value='<?= $_SESSION['middle']?>' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='last'>Last Name</label><br />
            <input type='text' value='Greg' name='last' value='<?= $_SESSION['last']?>' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='email'>Email</label><br />
            <input type='text' value='smith@email.com' value='<?= $_SESSION['email']?>' name='email' required /><br />
        </div>
        <div class='col-half input-group input-group-icon'>
          <label class='form-label' for='residence_country'>Country of Residence</label><br />
          <select name='residence_country' required>
            <!-- <option value='blank'></option> -->
            <?php
              if ($_SESSION['residence_country'] == 'USA') {
                echo "
                  <option value=".$_SESSION['residence_country'].">".$_SESSION['residence_country']."</option>
                  <option value='Canada'>CANADA</option>
                  <option value='Mexico'>MEXICO</option>
                ";
              } else if ($_SESSION['residence_country'] == 'Canada') {
                echo "
                  <option value=".$_SESSION['residence_country'].">".$_SESSION['residence_country']."</option>
                  <option value='Canada'>USA</option>
                  <option value='Mexico'>MEXICO</option>
                ";
              } else {
                echo "
                  <option value=".$_SESSION['residence_country'].">".$_SESSION['residence_country']."</option>
                  <option value='Canada'>USA</option>
                  <option value='Canada'>CANADA</option>
                ";
              }
            ?>
          </select><br />
        </div>
        <div class="col-half input-group input-group-icon">
          <label class="form-label" for="postal_code">Postal Code</label><br />
            <input type="text" value="33805" name="postal_code" minlength="5" value="<?= $_SESSION['postal_code']?>" maxlength="5" required /><br />
        </div>
        <div class="input-group input-group-icon">
          <label class="form-label" for="phone_number">Telephone Number, Beginning with country code</label><br />
            <input type="text" name="phone_number" value="<?= $_SESSION['phone_number']?>" maxlength="15" required /><br />
        </div>
      </div>
      <!-- Terms and Conditions -->
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-large btn-success text-light" type="submit" name="verify_pg_1">Verify</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-large btn-outline-success text-dark" type="reset" name="cancel">View Current Info</button>
        </div>
      </div>
    </form>
  </div>
