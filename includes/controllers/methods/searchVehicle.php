<?php
function searchVehicle($connection, $plate) {
    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */
    $query = "SELECT * FROM vehicles WHERE plate_num='$plate'";

    $query = mysqli_query($connection, $query);

    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        $_SESSION['vehicle_search'] = "";

        foreach ($query as $row) {
        $query = $query->fetch_assoc();

            $_SESSION['vehicle_search'] .= $row['id'] . ", ";

        };
    } else {
        $_SESSION['vehicle_search'] = "";
    }

    header('Location: http://vendors.localhost/basic_workshop/search');
    exit();
}
?>