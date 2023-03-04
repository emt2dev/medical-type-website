<?php
function vendorSignIn($connection, $username, $password) {

    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */
    $query = "SELECT * FROM api_keys WHERE email=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $username;
    $query->execute();

    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if(password_verify($password, $row['password'])) {

    // /* HERE WE ASSIGN EACH COLUMN TO THE SESSION */
        $_SESSION['id']= $row['id'];
        $_SESSION['email']= $row['email'];
        $_SESSION['vendor_key']= $row['vendor_key'];
        $_SESSION['billing_info'] = $row['billing_info'];
        
        $_SESSION['due_date'] = $row['due_date'];

        unset($row['ratePerReferral']);
        unset($row['referralCount']);
        unset($row['Gross']);

        $_SESSION['ratePerReferral']= $row['ratePerReferral'];
        $_SESSION['referralCount']= $row['referralCount'];
        $_SESSION['Gross']= $row['Gross'];

        header('Location: http://vendors.localhost/basic_workshop/dashboard');
        exit();

    } else {
        unset($row);
        unset($_SESSION);

        header('Location: http://vendors.localhost/basic_workshop/');
        exit();

    }
}
?>