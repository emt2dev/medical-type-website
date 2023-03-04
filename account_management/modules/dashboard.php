<div class="container">
  <div class="col">
    <h4>Welcome <?= $_SESSION['full_name'] ?></h4>
    <?php
    if (isset($_SESSION['am_passport_creation_message'])) {
        echo "
        <form action='".$_SESSION['base_url']."/includes/controllers/account_management.php' method='post'>
          <button class='btn btn-outline-info' type='submit' id='acknowledge' name='am_ack_btn'>".$_SESSION['am_passport_creation_message']."</button>
        </form>
        ";
      }
    ?>
    <?php
    if (isset($_SESSION['am_veh_creation_message'])) {
        echo "
        <form action='".$_SESSION['base_url']."/includes/controllers/account_management.php' method='post'>
          <button class='btn btn-outline-info' type='submit' id='acknowledge' name='am_veh_ack_btn'>".$_SESSION['am_veh_creation_message']."</button>
        </form>
        ";
      }
    ?>
  </div>
  <div class="row">
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#createPassport">
        Create Medical Passport
      </button>
      <br />
    </div>
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#createVehicle">
        Add Vehicle
      </button>
      <br />
    </div>
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createAddress">
        Add Address, coming soon
      </button>
      <br />
    </div>
  </div>
  <br />
  <div class="row">
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
    <div class='col'>
      <form class="form" action='<?= $_SESSION['base_url']; ?>/includes/controllers/account_management.php' method="post">
        <!-- Button trigger modal -->
          <button type="submit" class="btn btn-primary" name='view_sr_button'>
            View Support Requests
          </button>
      </form>
      <br />
    </div>
    <div class='col'>
      <!-- Button trigger modal -->
      <a href="payment.php">
        <button type="button" class="btn btn-success">
          Make a Payment
        </button>
      </a>
      <br />
    </div>
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#assignAddress">
        Assign account to address
      </button>
      <br />
    </div>
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#assignVehicle">
        Assign account to vehicles
      </button>
      <br />
    </div>
  </div>
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="createPassport" tabindex="-1" aria-labelledby="createPassport" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col">
            <h4 class="modal-title" id="staticBackdropLabel">Create a passport</h4>
          </div>
          <div class="col">
              <?php
                if ($_SESSION['current_patient_limit'] < 1) {
                  echo "<p class='bg-dark btn btn-outline-danger text-light'>You cannot create any more passport accounts<br />Please upgrade your account.</p>";
                } else {
                  echo "<p class='btn btn-success text-light'>".$_SESSION['current_patient_limit']." accounts left</p>";
                }
              ?>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <li class='text-dark'>These passports can have their own logins created too</li>
          <li class='text-dark'>They can add their own emergency contacts, insurance</li>
          <li class='text-dark'>They can request medical information from their physician</li>
          <li class='text-dark'>They will receive an email to create a password and activate their account</li>
          <li class='text-dark'>Once activated, instructions will be emailed and posted on the passport dashboard</li>
          <br />
        <small class="card-text text-dark">This information is inaccessible to the Account Manager (US Federal Law & GDPR)</small>
        </div>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="form" action='<?= $_SESSION['base_url']; ?>/includes/controllers/account_management.php' method="post">
            <div class='input-group input-group-icon'>
              <label class='form-label' for='fn'>First</label><br />
                <input type='text' name='fn' required />
                <br />
              <label class='form-label' for='mn'>Middle</label><br />
                <input type='text' name='mn' required />
                <br />
              <label class='form-label' for='ln'>Last</label><br />
                <input type='text' name='ln' value='<?= $_SESSION['last']?>' required />
                <br />
              <label class='form-label' for='dob'>Date of Birth</label><br />
                <input type='date' name='dob' required />
                <br />
              <label class='form-label' for='email'>Email</label><br />
                <input type='text' name='email' value='<?= $_SESSION['email'] ?>'/>
                <br />
            </div>
            <div class="mb-3">
              <h4>Legal Age?</h4>
              <select class="form-select" name="underage">
                <option value="0">Not under age</option>
                <option value="1">Under age</option>
              </select>
            </div>
            <div class="mb-3">
              <h4>Parent / Guardian / POA</h4>
              <select class="form-select" name="guardian">
                <option value="0">No legal guardian</option>
                <option value="1">I am the legal parent / guardian / POA</option>
                <option value="2">Someone else is the legal parent / guardian / POA</option>
              </select>
            </div>
            <div class="mb-3">
              <h4>Have their own email?</h4>
              <select class="form-select" name="own_email">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button
                <?php
                  if ($_SESSION['current_patient_limit'] < 1) {
                    echo "type='reset'";
                  } else {
                    echo "type='submit'";
                  }
                ?>
              name='passport_create_btn' class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="createVehicle" tabindex="-1" aria-labelledby="createVehicle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col">
            <h4 class="modal-title" id="staticBackdropLabel">Add vehicle</h4>
          </div>
          <div class="col">
              <?php
                if ($_SESSION['current_vehicles_limit'] < 1) {
                  echo "<p class='bg-dark btn btn-outline-danger text-light'>You cannot create any more passport accounts<br />Please upgrade your account.</p>";
                } else {
                  echo "<p class='btn btn-success text-light'>".$_SESSION['current_vehicles_limit']." vehicles left</p>";
                }
              ?>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <li class='text-dark'>Add up to three addresses</li>
          <li class='text-dark'>Remove or add at any time</li>
          <li class='text-dark'>You can assign accounts to these vehicles</li>
          <li class='text-dark'>Paramedics will be able to see who is currently in that vehicle</li>
          <br />
        </div>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="form" action='<?= $_SESSION['base_url']; ?>/includes/controllers/account_management.php' method="post">
            <div class='input-group input-group-icon'>
              <label class='form-label' for='veh_insurance_num'>Insurance Number</label><br />
                <input type='text' name='veh_insurance_num' required />
                <br />
              <label class='form-label' for='veh_insurance_company'>Insurance Company</label><br />
                <input type='text' name='veh_insurance_company' required />
                <br />
              <label class='form-label' for='lp_num'>License Plater Number</label><br />
                <input type='text' name='lp_num' value='<?= $_SESSION['last']?>' required />
                <br />
              <label class='form-label' for='lp_state'>License Plate State</label><br />
                <input type='text' name='lp_state' required />
                <br />
              <label class='form-label' for='email'>Email</label><br />
                <input type='text' name='email' value='<?= $_SESSION['email'] ?>'/>
                <br />
            </div>
            <div class="mb-3">
              <h4>Legal Age?</h4>
              <select class="form-select" name="underage">
                <option value="0">Not under age</option>
                <option value="1">Under age</option>
              </select>
            </div>
            <div class="mb-3">
              <h4>Parent / Guardian / POA</h4>
              <select class="form-select" name="guardian">
                <option value="0">No legal guardian</option>
                <option value="1">I am the legal parent / guardian / POA</option>
                <option value="2">Someone else is the legal parent / guardian / POA</option>
              </select>
            </div>
            <div class="mb-3">
              <h4>Have their own email?</h4>
              <select class="form-select" name="own_email">
                <option value="0">No</option>
                <option value="1">Yes</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button
                <?php
                  if ($_SESSION['current_patient_limit'] < 1) {
                    echo "type='reset'";
                  } else {
                    echo "type='submit'";
                  }
                ?>
              name='vehicle_create_btn' class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="createAddress" tabindex="-1" aria-labelledby="createAddress" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add Address</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>This new feature is coming soon!</h4>
        <li class='text-dark'>Add up to three addresses</li>
        <li class='text-dark'>Remove or add at any time</li>
        <li class='text-dark'>You can assign accounts to these addresses</li>
        <li class='text-dark'>Paramedics will be able to see who is currently at that address</li>
        <br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="createSupport" tabindex="-1" aria-labelledby="createSupport" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Contact Support</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
          include "../includes/modules/support.php";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
