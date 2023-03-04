
<!-- CREATE ADMIN -->
<a class="btn btn-success" data-bs-toggle="collapse" href="#createCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Create Admin</a>
<div id="createCollapse" class="container collapse multi-collapse">
  <div class=" form-control">
    <form class="form" action="../includes/controllers/admin.php" method="post">
      <div class="row">
        <h4>Information</h4>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="first">First Name</label>
            <br /><input type="text"  value="debug first" name="first" required />
        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="middle">Middle Name</label>
            <br /><input type="text"  value="debug middle" name="middle" required />

        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="last">Last Name</label>
            <br /><input type="text"  value="debug last" name="last" required />

        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="postal_code">Postal Code</label>
            <br /><input type="text"  name="postal_code" value="33805" maxlength="12" required />

        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="last">Phyisical Address</label>
            <br /><input type="text"  value="debug last" name="address" required />

        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="city_district">City / District</label>
            <input type="text"  value="debug city_district" name="city_district" required />
        </div>
      </div>
        <div class="col">
          <label class="form-label" for="state_region">State / Region</label>
            <br /><select name="state_region" required>
              <!-- <option value="blank"></option> -->
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
            </select>
        </div>
        <div class="row">
          <div class="">
            <label class="form-label" for="residence_country">Country of Residence</label>
              <br /><select class="country_code" name="residence_country" required>
                <!-- <option value="blank"></option> -->
                <option value="USA">USA</option>
                <option value="Canada">CANADA</option>
                <option value="United Kingdom">UNITED KINGDOM</option>
              </select>
          </div>
          <div class="">
            <label class="form-label" for="country_code">Telephone Country</label>
              <br /><select  name="country_code" required>
                <!-- <option value="blank"></option> -->
                <option value="1">USA & CANADA</option>
                <option value="44">UNITED KINGDOM</option>
              </select>
          </div>
        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="phone_number">Phone Number</label>
            <br /><input type="text"  name="phone_number" value="8636148468" required />
        </div>
        <div  class="input-group input-group-icon">
          <?php
          if(isset($_SESSION['admin_new_error'])) {
            echo $_SESSION['admin_new_error'];
          }
          ?>
          <label class='form-label' for='email'>Email Address</label>
            <br /><input type="email"  name="email" value="duronemt@gmail.com" required />
        </div>
        <div  class="input-group input-group-icon">
          <button type="submit" class="btn-success btn btn-large btn-outline-light" name="admin_create_button">Create!</button>
        </div>
    </form>
  </div>
</div>
<!-- UPDATE ADMIN -->
<a class="btn btn-warning" data-bs-toggle="collapse" href="#updateCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Update Admin</a>
<div id="updateCollapse" class="container collapse multi-collapse">
    <div class=" form-control">
      <form class="form" action="../includes/controllers/admin.php" method="post">
        <div class="row">
          <h4>Update Admin Information</h4>
        <div class="col">
          <label class="form-label" for="column_to_be_updated">Column</label>
          <br /><select name="column_to_be_updated" required>
            <!-- <option value="blank"></option> -->
            <option value="first">First Name</option>
            <option value="middle">Middle Name</option>
            <option value="last">Last Name</option>
            <option value="phone">Phone Number</option>
            <option value="email">Email Address</option>
            <option value="address">Address</option>
            <option value="city">City</option>
            <option value="state">State</option>
            <option value="postal">Postal</option>
            <option value="country">Country</option>
            <option value="active">Is Active?</option>
            <option value="exective">Is Executive?</option>
          </select>
        </div>
        <div  class="input-group input-group-icon">
          <label class="form-label" for="new_value">New Value</label><br />
            <input type="text"  name="new_value" value="test" required />
        </div>
        <div  class="input-group input-group-icon">
            <div class='col'>
              <label class='form-label' for='recipient'>Admin Email</label>
              <br />
              <select name='admin_to_be_updated' required>
                <option value='blank'></option>";
                <?php
                $admin_query0x1 = "SELECT email FROM can_staff";
                $admin_query0xsend1 = mysqli_query($connection, $admin_query0x1);

                if ($admin_query0xview1 = $admin_query0xsend1->fetch_assoc()) {
                  foreach ($admin_query0xsend1 as $option) {
                    echo "<option value='".$option['email']."'>".$option['email']."</option>";
                  };
                };
                ?>
              </select>
            </div>

        </div>
        <div  class="input-group input-group-icon">
          <button type="submit" class="btn-success btn btn-large btn-outline-light" name="admin_update_button">Create!</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- DELETE ADMIN -->
<a class="btn btn-danger" data-bs-toggle="collapse" href="#deleteCollapse" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Delete Admin</a>
<div id="deleteCollapse" class="container collapse multi-collapse">
  <div class=" form-control">
    <form class="form" action="../includes/controllers/admin.php" method="post">
      <div class="row">
        <h4>Delete Admin</h4>
      <div class="col">
        <label class="form-label" for="action_to_be_taken">Disciplinary Action</label>
        <?php
        if (isset($_SESSION['debug_admin_disc'])) {
          echo $_SESSION['debug_admin_disc'];
        } else {
          echo "
          <br />
          <select name='action_to_be_taken' required>
            <!-- <option value='blank'></option> -->
            <option disabled selected></option>
            <option value='give_executive_privledges' disabled>Give Executive Privledges</option>
            <option value='give_active'>Give Active Status</option>
            <option value='remove_executive_privledges'>Remove Executive Privledges</option>
            <option value='remove_active'>Remove Active Status</option>
            <option value='delete'>Termination</option>
          </select>
          </div>
          <div class='col'>
            <label class='form-label' for='recipient'>Admin Email</label>
            <br />
            <select name='recipient' required>
              <option value='blank'></option>";
              $admin_query0x1 = "SELECT email FROM can_staff";
              $admin_query0xsend1 = mysqli_query($connection, $admin_query0x1);

              if ($admin_query0xview1 = $admin_query0xsend1->fetch_assoc()) {
                foreach ($admin_query0xsend1 as $option) {
                  echo "<option value='".$option['email']."'>".$option['email']."</option>";
                };
              };
              echo "
              ?>
            </select>
          </div>
          <div  class='input-group input-group-icon'>
            <label class='form-label' for='justify_change'>Justification</label><br />
            <textarea name='justify_change' rows='8' cols='80' required></textarea>
          </div>
          <div  class='input-group input-group-icon'>
            <label class='form-label' for='approved_by'>Executive Making the Change</label><br />
              <input type='text'  name='approved_by' value='".$_SESSION['email']."' disabled />
          </div>
          <div  class='input-group input-group-icon'>
            <button type='submit' class='btn-success btn btn-large btn-danger' name='admin_disciplinary_button'>Change</button>
          </div>
        </div>
      </form>
    </div>
  </div>
          ";
        }
?>
<!-- this escapes the admin mgmt -->
