<?php
include 'bootstrap.php'; // Here we set headers, open our db, and more!

$staff = $_SESSION['staff_id'];
$staffEmail = $_SESSION['email'];

/* Here is the handler for product availability and uploads */
if(isset($_POST['product__formButton'])) {
  /* Here we sanitize all of the POST variables. In addition to sanitizing, we cast our dollar amounts to a double type that will be saved in the database */
    $pName = sanitize($_POST['product__name']);
    $pDesc = sanitize($_POST['product__desc']);
    $pType = sanitize($_POST['product__type']);

    $pCost = sanitize($_POST['product__cost']);
    $pCost = urlencode($pCost);
    $pCost = floatval($pCost);

    $pDiscount = sanitize($_POST['product__disc']);
    $pDiscount = urlencode($pDiscount);
    $pDiscount = floatval("0.".$pDiscount);

    $pQuantity = sanitize($_POST['product__inventory']);
    $pQuantity = urlencode($pQuantity);
    $pQuantity = intval($pQuantity);

    $pSupplierName = sanitize($_POST['product__supplierName']);
    
    $pSupplierCost = sanitize($_POST['product__supplierCost']);
    $pSupplierCost = urlencode($pSupplierCost);
    $pSupplierCost = floatval($pSupplierCost);

    $pSupplierWebsite = sanitize($_POST['product__supplierWebsite']);
    $pSupplierEmail = sanitize($_POST['product__supplierEmail']);

    // here we set the file name
    
    $upload_dir = "../../../includes/assets/uploads/products/".$pType."/";

    $imageFileType = strtolower(pathinfo(basename($_FILES["product__file"]["name"]),PATHINFO_EXTENSION));

    $_FILES["product__file"]["name"] = $pName;
    $target_file = $upload_dir . basename($_FILES["product__file"]["name"]).".".$imageFileType;

   // here we move the file into the directory AND create out product model which will be used to save our product into our database.
    if (move_uploaded_file($_FILES["product__file"]["tmp_name"], $target_file)) {
        $newP = new Product($pName, $pDesc, $pType, $pCost, $pDiscount, $pQuantity, $pSupplierName, $pSupplierCost, $pSupplierWebsite, $pSupplierEmail, $target_file);
        $newP->save($connection);
      } else {
        $_SESSION['file_not_uploaded'] = "The file upload was not successful. Please submit a .png file";

        header('Location: http://localhost/basic_workshop/dashboard');
        exit();
      }

}

/* Here they can view the full SR */
if(isset($_POST['request_idButton'])) {

    $assignTo = $_SESSION['staff_id'];
    $rid = $_POST['request_id'];

    $assign = "UPDATE support_request SET staff_id=$assignTo WHERE request_id=$rid";
    $assign = mysqli_query($connection, $assign);

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