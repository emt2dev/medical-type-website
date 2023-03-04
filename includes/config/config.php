<?php
/* HEADERS */
header('X-Frame-Options: DENY'); // prevents iframes

/* SESSION STARTS */
if(!isset($_SESSION)) {
    session_start();
} else {
    session_start();
}

/* this file stores all session information. */
$_SESSION['base_url'] = 'http://localhost/basic_workshop/';
$_SESSION['vendors_url'] = "http://vendors.localhost/basic_workshop/";
$_SESSION['base_assets'] = 'http://localhost/basic_workshop/includes/assets/';
$_SESSION['base_products'] = 'http://localhost/basic_workshop/includes/assets/uploads/products/';
$_SESSION['base_controllers'] = 'http://localhost/basic_workshop/includes/controllers/';
$_SESSION['base_models'] = 'http://localhost/basic_workshop/includes/models/';
$_SESSION['base_db'] = 'http://localhost/basic_workshop/includes/dbSession/db.php';


// $__db[] array
$__db[0] ="localhost"; // server
$__db[1] ="root"; // user
$__db[2] =""; // pass
$__db[3] ="cand_api"; //db name

// Create our database connection
$connection = new mysqli($__db[0], $__db[1], $__db[2], $__db[3]);

// Ensure our database connection works
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// here, we ensure remove login attempt errors
if (isset($_SESSION['no_user_found'])) {
    unset($_SESSION['no_user_found']);
  }
  
  if (isset($_SESSION['incorrect_password'])) {
    unset($_SESSION['incorrect_password']);
  }

  /*** HERE WE INCLUDE OUR CUSTOM METHODS AND OUR MODELS ***/
  // Methods
  include 'includes/controllers/methods/getAPIKey.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/getDueDate.php'; // here we include of sanitizer method

  include 'includes/controllers/methods/getAddressId.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/getVehicleId.php'; // here we include of sanitizer method

  include 'includes/controllers/methods/updateAddressHistory.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/updateVehicleHistory.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/updateSession.php'; // here we include of sanitizer method
  
  include 'includes/controllers/methods/sanitizer.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/sanitizerSpacing.php'; // here we include of sanitizer method

  include 'includes/controllers/methods/vendorSignIn.php'; // here we include of sanitizer method
  include 'includes/controllers/methods/signIn.php'; // here we include of sign in method
  include 'includes/controllers/methods/register.php'; // here we include register method

  include 'includes/controllers/methods/searchPatient.php'; // here we include register method
  include 'includes/controllers/methods/searchAddress.php'; // here we include register method
  include 'includes/controllers/methods/searchVehicle.php'; // here we include register method

  include 'includes/controllers/methods/addStaffPriv.php'; // here we include addStaffPriv method
  include 'includes/controllers/methods/removeStaffPriv.php'; // here we include addStaffPriv method
  
  // // Classes
  // include 'includes/config/models/backend/newProductModel.php'; // here we include our new product model
  include 'includes/controllers/models/newAddressModel.php';
  include 'includes/controllers/models/newVendorModel.php';
  include 'includes/controllers/models/newUserModel.php'; // here we include our new user model
  include 'includes/controllers/models/newVehicleModel.php'; // here we include our new user model
  // include 'includes/config/models/userInit/support__request.php'; // here we include our new user model
?>
