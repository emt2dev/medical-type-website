<?php
    function updateAddressHistory($connection, $userId, $addressId) {

        $addressHistory = $_SESSION['addressHistory'];

        $newItem = $addressId . ", ";
        $addressHistory .= $newItem;

        $query = "UPDATE users SET addressHistory='$addressHistory' WHERE id='$userId'";
        $querySend = mysqli_query($connection, $query);
    }
?>