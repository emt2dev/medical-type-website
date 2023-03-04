<?php
function searchPatient($connection, $first, $last) {
    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */

    $query = "SELECT * FROM users WHERE firstName LIKE '$first%' AND lastName LIKE '$last%'";
    $query = mysqli_query($connection, $query);

    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        $_SESSION['patient_search'] = "";

        foreach ($query as $row) {
        $query = $query->fetch_assoc();

            $_SESSION['patient_search'] .= $row['id'] . ", ";
        };
    } else {
        $_SESSION['patient_search'] = "";
    }

    print_r($_SESSION['patient_search']);

    header('Location: http://vendors.localhost/basic_workshop/search');
    exit();
}
?>