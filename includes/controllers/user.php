<?php
include 'bootstrap.php'; // Here we set headers, open our db, and more!

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['email'];



if(isset($_POST['request_idButton'])) {

  $rid = $_POST['request_id'];
  $srSet = "SELECT * FROM support_request WHERE request_id=$rid";
  $srSet = mysqli_query($connection, $srSet);

  $row = mysqli_fetch_assoc($srSet);

  $_SESSION['request_id'] = $row['request_id'];
  $_SESSION['assigned_staff_id'] = $row['staff_id'];  
  $_SESSION['fulfillment_id'] = $row['fulfillment_id'];
  $_SESSION['order_id'] = $row['order_id'];
  $_SESSION['product_id'] = $row['product_id'];
  $_SESSION['reason'] = $row['reason'];
  $_SESSION['comments'] = $row['comments'];
  $_SESSION['notes__public'] = $row['notes__public'];
  $_SESSION['notes__internal'] = $row['notes__internal'];
  $_SESSION['submitted'] = $row['submitted'];
  $_SESSION['active'] = $row['active'];

  header('Location: http://localhost/basic_workshop/sr');
  exit();
}


if(isset($_POST['action__formButton'])) {

  unset($_SESSION['sr_sent_message']);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}

if(isset($_POST['support__formButton'])) {

  $request = new support__request($user_id, $_POST['support___formReason'], sanitize($_POST['support___formComments']));
  $request->save($connection);

  header('Location: http://localhost/basic_workshop/dashboard');
  exit();
}
