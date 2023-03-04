<?php

$user = $_GET['user'];

if ($row['invoice_status']) {
    $query = "SELECT * FROM users WHERE userQuery=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $user;
    $query->execute();

    $result = $query->get_result();
    $row2 = $result->fetch_assoc();

    if (isset($row2['userOccupants'])) {
        $uids = explode(",", $row2['userOccupants']);

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