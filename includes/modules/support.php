<?php
if ($_SESSION['header_routing'] == 'account' && $_SESSION['account_routing'] == 'support') {
  echo "
  <div class='container'>
  <center>
    <h4>Contact Our Support</h4>
  </center>
    <form method='post' action='".$_SESSION['base_url']."/includes/controllers/account.php'>
      <div class='row'>
      <div class='input-group input-group-icon'><br />
        <select class='form-select' name='support_reason' >
          <option value='account'>Account</option>
          <option value='history'>Medical History</option>
          <option value='tickets'>Tickets</option>
          <option value='other'>Something Else</option>
        </select><br />
      </div>
      <div class='input-group input-group-icon'>
        <label class='form-label' for='request_comments'>How can we help?</label><br />
          <textarea name='request_comments' rows='8' cols='80' required></textarea><br />
      </div>
      </div>
    <div class='row'>
      <div class='col-md-6'>
        <button class='btn btn-large btn-info text-light' type='submit' name='support_btn'>Send</button>
      </div>
      <div class='col-md-6'>
        <a href='#'></a>
        <button class='btn btn-large btn-outline-info text-dark' type='submit' name='cancel_btn'>Cancel</button>
      </div>
    </div>
    </form>
  </div>"
;
} else if ($_SESSION['header_routing'] == 'am' && $_SESSION['am_routing'] == 'am_dashboard') {
  echo "

  <div class='container'>
  <center>
    <h4>Contact Our Support</h4>
  </center>
    <form method='post' action='".$_SESSION['base_url']."/includes/controllers/account_management.php'>
      <div class='row'>
      <div class='input-group input-group-icon'><br />
        <select class='form-select' name='support_reason' >
          <option value='account_management'>Account Management</option>
          <option value='payment'>Payment</option>
          <option value='other'>Something Else</option>
        </select><br />
      </div>
      <div class='input-group input-group-icon'>
        <label class='form-label' for='request_comments'>How can we help?</label><br />
          <textarea name='request_comments' rows='8' cols='80' required></textarea><br />
      </div>
      </div>
    <div class='row'>
      <div class='col-md-6'>
        <button class='btn btn-large btn-info text-light' type='submit' name='support_btn'>Send</button>
      </div>
      <div class='col-md-6'>
        <a href='#'></a>
        <button class='btn btn-large btn-outline-info text-dark' type='submit' name='cancel_btn'>Cancel</button>
      </div>
    </div>
    </form>
  </div>
  ";
}

?>
