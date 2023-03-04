<?php
session_start();
if(!isset($_SESSION['is_account_holder'])) {
  header('Location: http://localhost/basic_workshop/login.php');
  exit();
}

$_SESSION['header_routing'] = 'account';
$_SESSION['sub_routing'] = 'update';

$_SESSION['base_url'] = 'http://localhost/basic_workshop';
include "../../includes/partials/header.php";

if ($_SESSION['account_routing'] == 'update_addr_1') {
  include "../../includes/forms/verify_pg_1.php";
} else if ($_SESSION['account_routing'] == 'update_addr_2') {
  include "../../includes/forms/verify_pg_2.php";
} else if ($_SESSION['account_routing'] == 'econtact') {
  include "../../includes/forms/econtact.php";
} else if ($_SESSION['account_routing'] == 'insurance') {
  include "../../includes/forms/insurance.php";
} else if ($_SESSION['account_routing'] = "clinic_medical_request") {
  include "../../includes/forms/medical_request.php";
} else {

  header('Location: http://localhost/basic_workshop/accounts');
  exit();
}
