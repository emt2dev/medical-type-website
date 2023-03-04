<?php
    function updateVehicleHistory($connection, $userId, $vehicleId) {

        $vehicleHistory = $_SESSION['vehicleHistory'];

        $newItem = $vehicleId . ", ";
        $vehicleHistory .= $newItem;

        $query = "UPDATE users SET vehicleHistory='$vehicleHistory' WHERE id='$userId'";
        $querySend = mysqli_query($connection, $query);
    }
?>