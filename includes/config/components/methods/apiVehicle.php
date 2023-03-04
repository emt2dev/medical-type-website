<?php

$vehicle = $_GET['vehicle'];

if ($row['invoice_status']) {
    $query = "SELECT * FROM vehicles WHERE vehicleQuery=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $vehicle;
    $query->execute();

    $result = $query->get_result();
    $row2 = $result->fetch_assoc();

    if (isset($row2['vehicleOccupants'])) {
        $uids = explode(",", $row2['vehicleOccupants']);

        $apiResponse = NULL;
        $apiResponse = new apiCall200($apiRouting);

        for ($i=0; $i < count($uids); $i++) { 
            if ($i > 0) {
                $occupants .= ", " . $uids[$i];
            } else {
                $occupants = $uids[$i];
            }
        }
        $apiResponse->usersFound($occupants);
        $apiResponse = json_encode($apiResponse);

        echo $apiResponse;
    } else {
        // no rows found
        $apiRouting = NULL;
        $apiResponse = NULL;
        $apiResponse = new apiCall406();
        $apiResponse = json_encode($apiResponse);

        print_r($apiResponse);
    }
} else {
    $apiRouting = NULL;
    $apiResponse = NULL;
    $apiResponse = new apiCall503();
    $apiResponse = json_encode($apiResponse);    
}



?>