<?php
    function getAddressId($connection, $addressQuery) {
        $query = "SELECT * FROM addresses WHERE addressQuery='$addressQuery'";
        $querySend = mysqli_query($connection, $query);

        $queryView = $querySend->fetch_assoc();

        $addressId = $queryView['id'];
        unset($queryView);

        return $addressId;
    }
?>