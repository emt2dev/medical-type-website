<?php
function searchAddress($connection, $addressQuery) {
    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */

    $query = "SELECT * FROM addresses WHERE addressQuery LIKE '$addressQuery%'";

    $query = mysqli_query($connection, $query);

    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        $_SESSION['address_search'] = "";

        foreach ($query as $row) {
        $query = $query->fetch_assoc();

            $_SESSION['address_search'] .= $row['id'] . ", ";

        };
    } else {
        $_SESSION['address_search'] = "";
    }

    print_r($_SESSION['address_search']);

    header('Location: http://vendors.localhost/basic_workshop/search');
    exit();
}
?>