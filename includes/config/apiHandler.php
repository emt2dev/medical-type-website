<?php

if (isset($_GET['key'])) {

    include "components/models/apiJSON200.php";

    include "components/models/apiJSON404.php";
    include "components/models/apiJSON406.php";
    include "components/models/apiJSON503.php";

    $apiRouting = NULL;
    $apiResponse = new apiCall404();
    $apiResponse = json_encode($apiResponse);

    if (isset($_GET['key']) && isset($_GET['routing'])) {
        $apiRouting = $_GET['routing'];
        $apiKey = $_GET['key'];

        $query = "SELECT * FROM api_keys WHERE vendor_key=?";
        $query = $connection->prepare($query);
            $query->bind_param("s", $a);
                $a = $apiKey;
        $query->execute();

        $result = $query->get_result();
        $row = $result->fetch_assoc();

        if(!$row) {
            echo "incorrect API Key";
        }
    }


    switch ($apiRouting) {
        case 'address':
            include 'components/methods/apiAddress.php';
            break;
        
        case 'vehicle':
            include 'components/methods/apiVehicle.php';
            break;

        case 'user':
            include 'components/methods/apiUser.php';
            break;

        default:
            echo $apiResponse;
            break;
    }

} else {

}







?>