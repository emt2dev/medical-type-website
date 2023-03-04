<div>
  <center>
    <div class="container">
      <div class="row">
        <div class="col">
          <h4>News</h4>
          <p>We have two new features coming soon! You will be able to place yourself at an address and in a vehicle that will allow Paramedics to view occupants and access your medical record in the event of an emergency</p>
        </div>
        <div class="card" hidden>
            <div class="card-header text-dark">
                New feature coming soon (vehicles)
            </div>
            <div class="card-body">
              <form class="" action="<?= $_SESSION['base_url'].'/includes/controllers/account.php'?>" method="post">
                <button class='btn btn-large btn-success text-light' name="#" type="#">Start</button>
              </form>
            </div>
        </div>
        <div class="card" hidden>
            <div class="card-header text-dark">
                New feature coming soon (addresses)
            </div>
            <div class="card-body">
              <form class="" action="<?= $_SESSION['base_url'].'/includes/controllers/account.php'?>" method="post">
                <button class='btn btn-large btn-success text-light' name="#" type="#">Start</button>
              </form>
            </div>
        </div>
      </div>
      <div class="row">
          <?php
          if(isset($_SESSION['cs_found'])) {
            if ($_SESSION['clinic_request_email']) {
                echo "
                <form action='".$_SESSION['base_url']."'/includes/controllers/account.php' method='post'>
                  <button class='btn btn-outline-info' type='submit' id='acknowledge' name='cs_added_ack_btn'>'Your doctor still has not added your medical records. They will soon though!</button>
                </form>
                ";
            } else if ($_SESSION['cs_added_by_clinic'] || $_SESSION['epic_mychart_bool'] || $_SESSION['cerna_bool']) {
              echo "
              <form action='".$_SESSION['base_url']."'/includes/controllers/account.php' method='post'>
                <button class='btn btn-outline-info' type='submit' id='acknowledge' name='cs_added_ack_btn'>".$_SESSION['cs_added_message']."</button>
              </form>
              ";
            } else {
              echo "<div class='card'>
                  <div class='card-header text-dark'>
                      Get Medical Information
                  </div>
                  <div class='card-body'>
                    <form class='' action='".$_SESSION['base_url']."'/includes/controllers/account.php' method='post'>
                      <button class='btn btn-large btn-success text-light' name='request_medical' type='submit'>Start</button>
                    </form>
                  </div>
              </div>
              ";
            }
          }
          ?>
          <br />
        <div class="col">
          <div class="card">
              <div class="card-header text-dark">
                  See who has accessed your information
              </div>
              <div class="card-body">
                <form class="" action="<?= $_SESSION['base_url'].'/includes/controllers/account.php'?>" method="post">
                  <button class='btn btn-large btn-info text-light' name="see_tickets" type="submit">See Tickets</button>
                </form>
              </div>
          </div>
          <br />
        </div>
        <div class="col">
          <div class="card">
              <div class="card-header text-dark">
                  Contact our support
              </div>
              <div class="card-body">
                <form class="" action="<?= $_SESSION['base_url'].'/includes/controllers/account.php'?>" method="post">
                  <button class='btn btn-large btn-outline-danger' name="request_support" type="submit">Request Support</button>
                </form>
              </div>
          </div>
          <br />
        </div>
      </div>
    </div><br />
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header text-dark">
            Demographics
        </div>
        <div class="card-body">
            <p class="card-text text-dark">NAME: <em><?php if(isset($_SESSION['full_name'])) { echo $_SESSION['full_name']; } else { echo "debug full_name"; }; ?></em></p>
            <p class="card-text text-dark">TELEPHONE: <em><?php if(isset($_SESSION['phone_number'])) { echo $_SESSION['phone_number']; } else { echo "debug phone_number"; }; ?></em></p>
            <p class="card-text text-dark">STREET ADDRESS: <em><?php if(isset($_SESSION['street'])) { echo $_SESSION['street']; } else { echo "debug street"; }; ?></em></p>
            <p class="card-text text-dark">CITY: <em><?php if(isset($_SESSION['city_district'])) { echo $_SESSION['city_district']; } else { echo "debug city_district"; }; ?></em></p>
            <p class="card-text text-dark">STATE: <em><?php if(isset($_SESSION['state_region'])) { echo $_SESSION['state_region']; } else { echo "debug state_region"; }; ?></em></p>
            <p class="card-text text-dark">POSTAL CODE: <em><?php if(isset($_SESSION['postal_code'])) { echo $_SESSION['postal_code']; } else { echo "debug postal_code"; }; ?></em></p>
            <p class="card-text text-dark">COUNTRY: <em><?php if(isset($_SESSION['residence_country'])) { echo $_SESSION['residence_country']; } else { echo "debug residence_country"; }; ?></em></p>
            <form class="" action="<?= $_SESSION['base_url'].'/includes/controllers/account.php'?>" method="post">
              <button class='btn btn-large btn-warning text-dark' name="update_address" type="submit">Update</button>
            </form>
        </div>
      </div>
    </div>
    <br />
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-dark">
                EMERGENCY CONTACT INFORMATION
            </div>
            <div class="card-body">
              <p class="card-text text-dark"><?php if(isset($_SESSION['emergency_contact_info'])) { echo $_SESSION['emergency_contact_info']; }; ?></p>
              <form class='' action='<?= $_SESSION['base_url']?>/includes/controllers/account.php' method='post'>
                <button class='btn btn-large btn-warning text-dark' name='update_ec' type='submit'>Update</button>
              </form>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-dark">
                    PRIMARY INSURANCE INFORMATION
                </div>
                <div class="card-body">
                  <p class="card-text text-dark"><?php if(isset($_SESSION['medical_insurance_info_one'])) { echo $_SESSION['medical_insurance_info_one']; }; ?></p>
                  <form class='' action='<?= $_SESSION['base_url']?>/includes/controllers/account.php' method='post'>
                    <button class='btn btn-large btn-warning text-dark' name='update_ins_1' type='submit'>Update</button>
                  </form>
                </div>
            </div>
          <br />
        </div>
        <br />
        <div class="col">
            <div class="card">
                <div class="card-header text-dark">
                    SECONDARY INSURANCE INFORMATION
                </div>
                <div class="card-body">
                  <p class="card-text text-dark"><?php if(isset($_SESSION['medical_insurance_info_two'])) { echo $_SESSION['medical_insurance_info_two']; }; ?></p>
                  <form class='' action='<?= $_SESSION['base_url']?>/includes/controllers/account.php' method='post'>
                    <button class='btn btn-large btn-warning text-dark' name='update_ins_2' type='submit'>Update</button>
                  </form>
                </div>
            </div>
            <br />
          </div>
          <br />
        <div class="col">
            <div class="card">
                <div class="card-header text-dark">
                    ADDITIONAL INSURANCE INFORMATION
                </div>
                <div class="card-body">
                  <p class="card-text text-dark"><?php if(isset($_SESSION['medical_insurance_info_three'])) { echo $_SESSION['medical_insurance_info_three']; }; ?></p>
                  <form class='' action='<?= $_SESSION['base_url']?>/includes/controllers/account.php' method='post'>
                    <button class='btn btn-large btn-warning text-dark' name='update_ins_3' type='submit'>Update</button>
                  </form>
                </div>
            </div>
            <br />
          </div>
        <br />
      </div>
    </div>
  </center>
</div>
