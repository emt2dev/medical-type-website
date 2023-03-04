<?php
session_start();
if(!isset($_SESSION['is_am'])) {
  header('Location: http://localhost/basic_workshop/login.php');
  exit();
}
echo "<pre>

</pre>";
print_r($_SESSION['am_routing']);
echo "<pre>

</pre>";
$_SESSION['header_routing'] = 'am';

include "../includes/partials/header.php";

  /* ROUTING */
  if ($_SESSION['am_routing'] == 'am_verifications' && $_SESSION['header_routing'] == 'am') {

    include "../includes/forms/am_verification.php";
  } else if ($_SESSION['am_routing'] == 'am_dashboard' && $_SESSION['header_routing'] == 'am') {

    include "modules/dashboard.php";
  } else if ($_SESSION['header_routing'] == 'am' && $_SESSION['am_routing'] == 'view_sr') {

    include "../includes/modules/sr_tickets.php";
  } else if ($_SESSION['header_routing'] == 'am' && $_SESSION['am_routing'] == 'create_passport') {

    include "../includes/modules/sr_tickets.php";
  }

include "../includes/partials/footer.php";
