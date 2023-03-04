<?php
    function getAPIKey($connection, $vendorId) {
        $query = "SELECT * FROM api_keys WHERE id='$vendorId'";
        $querySend = mysqli_query($connection, $query);

        $queryView = $querySend->fetch_assoc();

        $apiKey = $queryView['vendor_key'];
        unset($queryView);

        return $apiKey;
    }
?>