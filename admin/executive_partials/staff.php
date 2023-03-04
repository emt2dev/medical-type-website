<div class="form-control mb-3 bg-dark text-light">
  <form class="form" action="controllers/Main.php" method="post">
    <div class="mb-3">
      <label class="form-label" for="first">First Name</label>
        <input type="text" class="bg-dark text-light" value="debug first" name="first" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="middle">Middle Name</label>
        <input type="text" class="bg-dark text-light" value="debug middle" name="middle" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="last">Last Name</label>
        <input type="text" class="bg-dark text-light" value="debug last" name="last" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="last">Phyisical Address</label>
        <input type="text" class="bg-dark text-light" value="debug last" name="address1" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="city_district">City / District</label>
        <input type="text" class="bg-dark text-light" value="debug city_district" name="city_district" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="state_region">State / Region</label>
        <select class="bg-dark text-light"name="state_region" required>
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
    <div class="mb-3">
      <label class="form-label" for="postal_code">Postal Code</label>
        <input type="text" class="bg-dark text-light" name="postal_code" value="33805" maxlength="12" required />
        <br />
    </div>
    <div class="mb-3">
      <?php
        if(isset($_SESSION['error_7'])) {
          echo "<pre>";
          echo   $_SESSION['error_7'];
          echo "</pre>";
        }
      ?>
      <label class="form-label" for="residence_country">Country of Residence</label>
        <select class="bg-dark text-light"class="country_code" name="residence_country" required>
          <!-- <option value="blank"></option> -->
          <option value="USA">USA</option>
          <option value="Canada">CANADA</option>
          <option value="United Kingdom">UNITED KINGDOM</option>
        </select>
    </div>
    <div class="mb-3">
      <?php
        if(isset($_SESSION['error_6'])) {
          echo "<pre>";
          echo   $_SESSION['error_6'];
          echo "</pre>";
        }
      ?>
      <label class="form-label" for="country_code">Telephone Country</label>
        <select class="bg-dark text-light" name="country_code" required>
          <!-- <option value="blank"></option> -->
          <option value="1">USA & CANADA</option>
          <option value="44">UNITED KINGDOM</option>
        </select>
    </div>
    <div class="mb-3">
      <label class="form-label" for="phone_number">Phone Number</label>
        <input type="text" class="bg-dark text-light" name="phone_number" value="8636148468" required />
        <br />
    </div>
    <div class="mb-3">
      <label class="form-label" for="email">Email Address</label>
        <input type="email" class="bg-dark text-light" name="email" value="duronemt@gmail.com" required />
        <br />
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <br />
    </div>
    <div class="mb-3">
      <button type="submit" class="btn-success btn btn-large btn-outline-light" name="can_create_button">Create!</button>
      <br />
    </div>
  </form>
</div>
