<?php
include 'bootstrap.php'; // Here we set headers, open our db, and more!

/* add staff member button */
if(isset($_POST['staff__formButton'])) {

  if ($_POST['staff_decision'] == 'add') {
    addStaffPriv($connection, $_POST['staff_username']);
  } else {
    removeStaffPriv($connection, $_POST['staff_username']);
  }

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

/* change common Address button */
if(isset($_POST['commonAddress_Btn'])) {
  
  echo $_POST['commonAddressQuery'];

  if ($_POST['commonAddress'] == 'work') {
    $wAQ = $_POST['commonAddressQuery'];

    $id = $_SESSION['id'];
  
    $query = "UPDATE users SET workAddressQuery='$wAQ' WHERE id='$id'";
    $querySend = mysqli_query($connection, $query);

    header('Location: http://localhost/basic_workshop/dashboard');
    exit();
  } else {
    $hAQ = $_POST['commonAddressQuery'];

    $id = $_SESSION['id'];
  
    $query = "UPDATE users SET homeAddressQuery='$hAQ' WHERE id='$id'";
    $querySend = mysqli_query($connection, $query);

    header('Location: http://localhost/basic_workshop/dashboard');
    exit();
  }
}

/* change current vehicle button */
if(isset($_POST['cVQ_Btn'])) {

  $cVQ_num = $_POST['cVQ_num'];
  $id = $_SESSION['id'];

  $query = "UPDATE users SET currentVehicleQuery='$cVQ_num' WHERE id='$id'";
  $querySend = mysqli_query($connection, $query);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

/* change current address button */
if(isset($_POST['cLQ_Btn'])) {

  $cLQ_num = $_POST['cLQ_num'];
  $id = $_SESSION['id'];

  $query = "UPDATE users SET currentLocationQuery='$cLQ_num' WHERE id='$id'";
  $querySend = mysqli_query($connection, $query);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

/* add vehicle button */
if(isset($_POST['vehicle__formButton'])) {

  $make = sanitize($_POST['make']);
  $vin = sanitize($_POST['vin']);
  $color = sanitize($_POST['color']);
  $plate = sanitizeSpacing($_POST['plate']);
  $state = sanitize($_POST['state']);
  $engine = sanitize($_POST['engine']);
  $type = sanitize($_POST['type']);
  $insured_boolean = sanitize($_POST['insured']);

  $newVehicleModel = new newVehicleModel($vin, $color, $plate, $state, $engine, $type, $make, $insured_boolean, $_SESSION['id']);

  $newVehicleModel->vehicleQueryCheck($connection);
  $newVehicleModel->vehicleInsert($connection, $_SESSION['id']);

  $vId = getVehicleId($connection, $newVehicleModel->getVehicleQuery());

  updateVehicleHistory($connection, $_SESSION['id'], $vId);
  updateSession($connection, $_SESSION['id']);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

/* add address button */
if(isset($_POST['address__formButton'])) {

  $address_numericals = sanitize($_POST['address_numericals']);
  $address_street = sanitize($_POST['address_street']);
  $address_apt = sanitize($_POST['address_apt']);
  $address_city = sanitize($_POST['address_city']);
  $address_state = sanitize($_POST['address_state']);
  $address_country = sanitize($_POST['address_country']);
  $address_postal = sanitize($_POST['address_postal']);

  $newAddressModel = new newAddressModel($address_numericals, $address_street, $address_apt, $address_city, $address_state, $address_country, $address_postal);

  $newAddressModel->addressQueryCheck($connection);
  $newAddressModel->addressInsert($connection, $_SESSION['id']);

  $addressId = getAddressId($connection, $newAddressModel->getAddressQuery());
  updateAddressHistory($connection, $_SESSION['id'], $addressId);
  updateSession($connection, $_SESSION['id']);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

/* add vendor button */
if(isset($_POST['vendor__formButton'])) {

  $vendor_name = sanitize($_POST['vendor_name']);
  $billing_info = sanitize($_POST['billing_info']);
  $due_date = sanitize($_POST['due_date']);
  $invoice_status = sanitize($_POST['invoice_status']);

  $newVendor = new newVendorModel($vendor_name, $billing_info, $due_date, $invoice_status);

  if ($_POST['vendor_type'] == 'software') {
    $newVendor->saveAPIkey($connection);
  } else if ($_POST['vendor_type'] == 'affiliate') {
  $newVendor->saveAffiliate($connection);
  }
}

/* login button */
if(isset($_POST['login__formButton'])) {
    
  if (isset($_SESSION['incorrectLogin'])) {
    unset($_SESSION['incorrectLogin']);
  }

  if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
  }

  if (isset($_SESSION['staff_boolean'])) {
    unset($_SESSION['staff_boolean']);
  }


  $username = sanitize($_POST['login__email']);

  signIn($connection, $username, $_POST['login__password']);
}

/* Here is our registration code block */
if(isset($_POST['register__formButton'])) {
  
  if (isset($_SESSION['incorrectLogin'])) {
    unset($_SESSION['incorrectLogin']);
  }

  if (isset($_SESSION['staff_id'])) {
    unset($_SESSION['staff_id']);
  }

  if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
  }
  
  $username = sanitize($_POST['register__username']);
  $email = sanitize($_POST['register__email']);
  register($connection, $username, $email, $_POST['register__password']);
}

/* #stripeAPI */
// if(isset($_POST['stripeAPI_checkout_btn'])) {

// }


?>
