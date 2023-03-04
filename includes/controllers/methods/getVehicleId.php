<?php
    function getVehicleId($connection, $vehicleQuery) {
        
        $vQ = $vehicleQuery;

        $query = "SELECT * FROM vehicles WHERE vehicleQuery='$vQ'";
        $querySend = mysqli_query($connection, $query);

        $queryView = $querySend->fetch_assoc();

        $vehicleId = $queryView['id'];
        unset($queryView);

        return $vehicleId;
    }
?>