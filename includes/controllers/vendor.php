<?php

include 'bootstrap.php'; // Here we set headers, open our db, and more!

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

$username = sanitizeSpacing($_POST['login__email']);

vendorSignIn($connection, $username, $_POST['login__password']);
}

if(isset($_POST['view___PatientBtn'])) {
    $id = $_POST['userId'];

    $_SESSION['userSearch_id'] = $id;

    echo $id;
    header('Location: http://vendors.localhost/basic_workshop/viewUser');
    exit();
}

/* login button */
if(isset($_POST['search__PatientBtn'])) {
    unset($_SESSION['search__AddressBtn']);

    $first = sanitize($_POST['first']);
    $last = sanitize($_POST['last']);


    // $phone = sanitizeSpacing($_POST['phone']);

    // searchAddress($connection, $first, $middle, $last, $phone);
    searchPatient($connection, $first, $last);
}


/* login button */
if(isset($_POST['search__AddressBtn'])) {
    unset($_SESSION['search__AddressBtn']);

    $addressQuery = sanitizeSpacing($_POST['address']);

    if ($addressQuery == "" || !isset($addressQuery)) {

        $_SESSION['address_search'] = "";
        
        header('Location: http://vendors.localhost/basic_workshop/search');
        exit();
    }
    
    searchAddress($connection, $addressQuery);
}


/* login button */
if(isset($_POST['search__VehicleBtn'])) {
    unset($_SESSION['vehicle_search']);

    $plate = sanitizeSpacing($_POST['plate']);

    if ($plate == "" || !isset($plate)) {

        $_SESSION['vehicle_search'] = "";

        header('Location: http://vendors.localhost/basic_workshop/search');
        exit();
    }
    
    searchVehicle($connection, $plate);
}
?>