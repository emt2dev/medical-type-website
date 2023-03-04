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
  include 'methods/getAPIKey.php'; // here we include of sanitizer method
  include 'methods/getDueDate.php'; // here we include of sanitizer method

  include 'methods/getAddressId.php'; // here we include of sanitizer method
  include 'methods/getVehicleId.php'; // here we include of sanitizer method

  include 'methods/updateAddressHistory.php'; // here we include of sanitizer method
  include 'methods/updateVehicleHistory.php'; // here we include of sanitizer method
  include 'methods/updateSession.php'; // here we include of sanitizer method

  include 'methods/sanitizer.php'; // here we include of sanitizer method
  include 'methods/sanitizerSpacing.php'; // here we include of sanitizer method
  
  include 'methods/signIn.php'; // here we include of sign in method
  include 'methods/vendorSignIn.php'; // here we include of sign in method
  include 'methods/register.php'; // here we include register method

  include 'methods/searchPatient.php'; // here we include register method
  include 'methods/searchAddress.php'; // here we include register method
  include 'methods/searchVehicle.php'; // here we include register method

  include 'methods/addStaffPriv.php'; // here we include addStaffPriv method
  include 'methods/removeStaffPriv.php'; // here we include addStaffPriv method
  
  // Classes
  
  include 'models/newAddressModel.php'; // here we include our new user model
  include 'models/newVendorModel.php'; // here we include our new user model
  include 'models/newVehicleModel.php'; // here we include our new user model
  include 'models/newUserModel.php'; // here we include our new user model
  // include '../models/userInit/support__request.php'; // here we include our new user model
?>
