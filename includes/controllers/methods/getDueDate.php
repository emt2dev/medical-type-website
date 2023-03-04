<?php
    function getDueDate($connection, $vendorId) {
        $query = "SELECT * FROM api_keys WHERE id='$vendorId'";
        $querySend = mysqli_query($connection, $query);

        $queryView = $querySend->fetch_assoc();

        $apiKey = $queryView['due_date'];
        unset($queryView);

        return $apiKey;
    }
?>