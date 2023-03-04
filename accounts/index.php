<?php
session_start();
if(!isset($_SESSION['is_account_holder'])) {
  header('Location: http://localhost/basic_workshop/login.php');
  exit();
}
echo "<pre>

</pre>";
print_r($_SESSION['account_routing']);
echo "<pre>

</pre>";
$_SESSION['header_routing'] = 'account';

include "../includes/partials/header.php";

  /* ROUTING */
 if ($_SESSION['account_routing'] == 'account_dashboard' && $_SESSION['header_routing'] == 'account') {

      include "modules/cards.php";
  } else if ($_SESSION['account_routing'] == 'support' && $_SESSION['header_routing'] == 'account') {

      include "../includes/modules/support.php";
  } else if ($_SESSION['account_routing'] == 'tickets' && $_SESSION['header_routing'] == 'account') {

      include "../includes/modules/tickets.php";
  }

include "../includes/partials/footer.php";
