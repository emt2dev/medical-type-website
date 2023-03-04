
<a class="btn btn-primary text-light" data-bs-toggle="collapse" href="#ticketsViewCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">View Tickets</a>
<div id="ticketsViewCollapse" class="collapse multi-collapse">
  <table id='account' class='table table-striped' style='width:100%'>
    <thead>
      <tr>
        <th>Reason For Access</th>
        <th>Type</th>
        <th>Access Date</th>
        <th>Organization</th>
        <th>Point of Contact</th>
        <th>Email</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $tix_query0x32 = "SELECT * FROM tickets INNER JOIN clinic_accounts ON tickets.clinic_id=clinic_accounts.clinic_id";
      $tix_query0x32send = mysqli_query($connection, $tix_query0x32);

      $tix_query0x32view = $tix_query0x32send->fetch_assoc();

      foreach ($tix_query0x32send as $clinic_row) {
        echo '<tr>';
          echo '<td>'. $clinic_row['reason'] .'</td>';
          echo '<td>'. $clinic_row['type'] .'</td>';
          echo '<td>'. $clinic_row['access_date'] .'</td>';
          echo '<td>'. $clinic_row['clinic_name'] .'</td>';
          echo '<td>'. $clinic_row['poc_name'] .'</td>';
          echo '<td>'. $clinic_row['email'] .'</td>';
          echo '<td>'. $clinic_row['phone_number'] .'</td>';
        echo '</tr>';
      };

      $tix_query0x52 = "SELECT * FROM tickets INNER JOIN agency_info ON tickets.agency_id=agency_info.agency_id";
      $tix_query0xsend52 = mysqli_query($connection, $tix_query0x52);

      if ($tix_query0xview52 = $tix_query0xsend52->fetch_assoc()) {
        foreach ($tix_query0xsend52 as $ems_row) {

          echo '<tr>';
            echo '<td>'. $ems_row['reason'] .'</td>';
            echo '<td>'. $ems_row['type'] .'</td>';
            echo '<td>'. $ems_row['access_date'] .'</td>';
            echo '<td>'. $ems_row['agency_name'] .'</td>';
            echo '<td>'. $ems_row['poc_name'] .'</td>';
            echo '<td>'. $ems_row['agency_email'] .'</td>';
            echo '<td>'. $ems_row['agency_phone'] .'</td>';
          echo '</tr>';
        };
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Reason For Access</th>
        <th>Type</th>
        <th>Access Date</th>
        <th>Organization</th>
        <th>Point of Contact</th>
        <th>Email</th>
        <th>Phone Number</th>
      </tr>
    </tfoot>
  </table>
  </div>
</div>

<a class="btn btn-info text-dark" data-bs-toggle="collapse" href="#supportRequestViewCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">View Support Requests</a>
<div id="supportRequestViewCollapse" class="collapse multi-collapse">
  <table id='account' class='table table-striped' style='width:100%'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Assigned to</th>
        <th>Count</th>
        <th>Invoice Status</th>
        <th>Invoice Due Date</th>
        <th>Reason</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Account Locked?</th>
        <th>Account Verified?</th>
        <th>Delete Request?</th>
        <th>Reinstate Request?</th>
        <th>Account Name</th>
        <th>Account Phone</th>
        <th>Account Email</th>
        <th>Guardian Name</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      $tix_query0x89 = "SELECT * FROM `support_request` INNER JOIN account_holders ON support_request.requester_account_id=account_holders.account_id";
      $tix_query0x89send = mysqli_query($connection, $tix_query0x89);

      $tix_query0x89view = $tix_query0x89send->fetch_assoc();

      foreach ($tix_query0x89send as $ah_row) {
        echo '<td>'. $ah_row['request_id'] .'</td>';
        if ($ah_row['assigned_to'] == '' || $ah_row['assigned_to'] == NULL) {
          echo "
          <td><form action='". $_SESSION['base_url']. "/includes/controllers/admin.php' method='post'>
              <input type='text' name='rid' value='".$ah_row['request_id']."' hidden>
            <button class='btn btn-success' type='submit' name='assign_to_me_btn'>Accept</button>
          </form></td>
          ";
        } else {
          echo '<td>'. $ah_row['assigned_to'] .'</td>';
        }
        echo '<td>'. $ah_row['request_count'] .'</td>';
        echo '<td>'. $ah_row['invoice_status'] .'</td>';
        echo '<td>'. $ah_row['invoice_due_date'] .'</td>';
        echo '<td>'. $ah_row['support_reason'] .'</td>';
        echo '<td>'. $ah_row['support_comments'] .'</td>';
        echo '<td>'. $ah_row['date_submitted'] .'</td>';
        echo '<td>'. $ah_row['account_locked'] .'</td>';
        echo '<td>'. $ah_row['account_verified'] .'</td>';
        echo '<td>'. $ah_row['request_to_delete'] .'</td>';
        echo '<td>'. $ah_row['request_to_reinstate'] .'</td>';
        echo '<td>'. $ah_row['first'] ." ". $ah_row['middle'] ." ". $ah_row['lastName']. '</td>';
        echo '<td>'. $ah_row['phone_number'] .'</td>';
        echo '<td>'. $ah_row['email'] .'</td>';
        $gq_helper001 = $ah_row['guardian_id'];
        $guardian_query001 = "SELECT * FROM guardian_accounts WHERE guardian_id=$gq_helper001";
        $guardian_query001send = mysqli_query($connection, $guardian_query001);
        $gq001fetch = $guardian_query001send->fetch_assoc();

        echo '<td>'. $gq001fetch['guardian_name'] .'</td>';
        echo '<td>'. $gq001fetch['guardian_position'] .'</td>';
        echo '<td>'. $gq001fetch['guardian_phone'] .'</td>';
        echo '<td>'. $gq001fetch['guardian_email'] .'</td>';
      };
      ?>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Assigned to</th>
        <th>Count</th>
        <th>Invoice Status</th>
        <th>Invoice Due Date</th>
        <th>Reason</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Account Locked?</th>
        <th>Account Verified?</th>
        <th>Delete Request?</th>
        <th>Reinstate Request?</th>
        <th>Account Name</th>
        <th>Account Phone</th>
        <th>Account Email</th>
        <th>Guardian Name</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </tfoot>
  </table>
</div>


<a class="btn btn-large-success btn-success" data-bs-toggle="collapse" href="#createAffiliateCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Create Affiliate</a>
<div id="createAffiliateCollapse" class="container collapse multi-collapse">
  <div class=" form-control">
    <h4>Create Affiliate Account</h4>
    <form method='post' action='<?= $_SESSION['base_url']; ?>/includes/controllers/admin.php'>
      <div class='row'>
        <div class='mb-3'>
          <select class='input-group input-group-icon' name="type">
            <option value="" disabled selected required>Company Type</option>
            <option value="Clinic" required>Clinic</option>
            <option value="EMS" required>EMS Agency</option>
          </select>
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='company_name'>Company's Name</label><br />
            <input type='text' name='company_name' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='npi_number'>Company's NPI Number</label><br />
            <input type='text' name='npi_number' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='poc_name'>Point of Contact's Name</label><br />
            <input type='text' name='poc_name' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='poc_phone'>Point of Contact's Phone Number</label><br />
            <input type='text' name='poc_phone' required /><br />
        </div>
        <div class='input-group input-group-icon'>
          <label class='form-label' for='poc_email'>Company's Email</label><br />
          <small>This is the email where patients can email for questions</small>
          <small>This is the email where your verification key will arrive</small>
            <input type='email' name='poc_email' /><br />
        </div>
        <div class='mb-3'>
          <select class='col input-group input-group-icon' name='state' required>
            <option value="" disabled selected required>State</option>
            <option value="AL">ALABAMA</option>
            <option value="AR">ARKANSAS</option>
            <option value="AZ">ARIZONA</option>
            <option value="CA">CALIFORNIA</option>
            <option value="CO">COLORADO</option>
            <option value="CT">CONNECTICUT</option>
            <option value="DE">DELAWARE</option>
            <option value="DC">DISTRICT OF COLUMBIA</option>
            <option value="FL">FLORIDA</option>
            <option value="GA">GEORGIA</option>
            <option value="GU">GUAM</option>
            <option value="HI">HAWAII</option>
            <option value="ID">IDAHO</option>
            <option value="IL">ILLINOIS</option>
            <option value="IN">INDIANA</option>
            <option value="IA">IOWA</option>
            <option value="KS">KANSAS</option>
            <option value="LA">LOUISIANA</option>
            <option value="ME">MAINE</option>
            <option value="MD">MARYLAND</option>
            <option value="MA">MASSACHUSSETTS</option>
            <option value="MI">MICHIGAN</option>
            <option value="MN">MINNESOTA</option>
            <option value="MS">MISSISSIPPI</option>
            <option value="MO">MISSOURI</option>
            <option value="MT">MONTANA</option>
            <option value="NE">NEBRASKS</option>
            <option value="NV">NEVADA</option>
            <option value="NH">NEW HAMPSHIRE</option>
            <option value="NJ">NEW JERSEY</option>
            <option value="NM">NEW MEXICO</option>
            <option value="NY">NEW YORK</option>
            <option value="NC">NORTH CAROLINA</option>
            <option value="ND">NORTH DAKOTA</option>
            <option value="OH">OHIO</option>
            <option value="OK">OKLAHOMA</option>
            <option value="OR">OREGON</option>
            <option value="PA">PENNSYLVANIA</option>
            <option value="PR">PUERTO RICO</option>
            <option value="RI">RHODE ISLAND</option>
            <option value="SC">SOUTH CAROLINA</option>
            <option value="SD">SOUTH DAKOTA</option>
            <option value="TN">TENESSEE</option>
            <option value="TX">TEXAS</option>
            <option value="UT">UTAH</option>
            <option value="VT">VERMONT</option>
            <option value="VI">VIRGIN ISLANDS</option>
            <option value="VA">VIRGINIA</option>
            <option value="WA">WASHINGTON</option>
            <option value="WV">WEST VIRGINIA</option>
            <option value="WI">WISCONSIN</option>
            <option value="WY">WYOMING</option>
          </select><br />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-large btn-success text-light" type="submit" name="affiliate_create_btn">Create</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-large btn-outline-success text-dark" type="submit" name="cancel_btn">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<a class="btn btn-warning" data-bs-toggle="collapse" href="#emsUpdateCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Update EMS Agency</a>
<div id="emsUpdateCollapse" class="container collapse multi-collapse">
  <div class=" form-control">
    <form method='post' action='<?= $_SESSION['base_url']; ?>/includes/controllers/admin.php'>
      <h4>Update EMS Agency</h4>
      <div class='row'>
        <div class='mb-3'>
          <label for="form-label">EMS Agency Name</label><br />
            <select class='col input-group input-group-icon' name='agency_found'>
              <option value="" disabled selected required></option>
              <?php
              $co_query_x1 = "SELECT agency_id, agency_name FROM agency_info";
              $co_query_x1send = mysqli_query($connection, $co_query_x1);

              if ($co_query_x1view = $co_query_x1send->fetch_assoc()) {
                foreach ($co_query_x1send as $option) {
                  echo "<option value='".$option['agency_id']."'>".$option['agency_name']."</option>";
                };
              };
              ?>
            </select>
        </div>
        <div class='mb-3'>
          <label for="form-label">Action</label><br />
          <select class='col input-group input-group-icon' name='update_ems_action' required>
            <option value="" disabled selected required></option>
            <option value="inactivate">Suspend, Enter 0</option>
            <option value="reactivate">Unuspend, Enter 1</option>
            <option value="password">Reset Password</option>
            <option value="email">Change email</option>
            <option value="poc_name">Change Point of Contact name</option>
            <option value="phone_number">Change Phone Number</option>
          </select><br />
        </div>
      </div>
      <div class='col input-group input-group-icon'>
        <label class='form-label' for='ems_new_value'>New Value<br />Enter 1 for active, 0 for inactive</label><br />
          <input type='text' name='ems_new_value' /><br />
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-large btn-warning text-dark" type="submit" name="update_ems_btn">Update</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-large btn-outline-success text-dark" type="submit" name="cancel_btn">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<a class="btn btn-warning" data-bs-toggle="collapse" href="#clinicUpdateCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Update Clinic</a>
<div id="clinicUpdateCollapse" class="container collapse multi-collapse">
  <div class=" form-control">
    <form method='post' action='<?= $_SESSION['base_url']; ?>/includes/controllers/admin.php'>
      <h4>Update Clinic</h4>
      <div class='row'>
        <div class='mb-3'>
          <label for="form-label">Clinic Name</label><br />
            <select class='col input-group input-group-icon' name='clinic_found'>
              <option value="" disabled selected required></option>
              <?php
              $co_query_x2 = "SELECT clinic_id, clinic_name FROM clinic_accounts";
              $co_query_x2send = mysqli_query($connection, $co_query_x2);

              if ($co_query_x2sendview = $co_query_x2send->fetch_assoc()) {
                foreach ($co_query_x2send as $clinic) {
                  echo "<option value='".$clinic['clinic_id']."'>".$clinic['clinic_name']."</option>";
                };
              };
              ?>
            </select>
        </div>
        <div class='mb-3'>
          <label for="form-label">Action</label><br />
          <select class='col input-group input-group-icon' name='update_clinic_action' required>
            <option value="" disabled selected required></option>
            <option value="inactivate">Suspend, Enter 0</option>
            <option value="reactivate">Unuspend, Enter 1</option>
            <option value="password">Reset Password</option>
            <option value="email">Change email</option>
            <option value="poc_name">Change Point of Contact name</option>
            <option value="phone_number">Change Phone Number</option>
          </select><br />
        </div>
      </div>
      <div class='col input-group input-group-icon'>
        <label class='form-label' for='clinic_new_value'>New Value<br />Enter 1 for active, 0 for inactive</label><br />
          <input type='text' name='clinic_new_value' /><br />
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-large btn-warning text-dark" type="submit" name="update_clinic_btn">Update</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-large btn-outline-success text-dark" type="submit" name="cancel_btn">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
