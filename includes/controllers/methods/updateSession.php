<?php
    function updateSession($connection, $userId) {
    unset($_SESSION['addressHistory']);
    unset($_SESSION['vehicleHistory']);

    $userId = $userId;

    $query = "SELECT * FROM users WHERE id=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $userId;
    $query->execute();

    $result = $query->get_result();
    $row = $result->fetch_assoc();
        
    /* HERE WE ASSIGN EACH COLUMN TO THE SESSION */

    $_SESSION['addressHistory'] = $row['addressHistory'];
    $_SESSION['vehicleHistory']= $row['vehicleHistory'];

    var_dump($row);

    unset($row);
}
?>