<?php
function signIn($connection, $username, $password) {

    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */
    $query = "SELECT * FROM users WHERE username=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $username;
    $query->execute();

    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if(password_verify($password, $row['password'])) {
        
    /* HERE WE ASSIGN EACH COLUMN TO THE SESSION */
        $_SESSION['id']= $row['id'];
        $_SESSION['staff_boolean']= $row['staff_boolean'];
        $_SESSION['username']= $row['username'];
        $_SESSION['locked_boolean'] = $row['locked_boolean'];
        
        $_SESSION['addressHistory'] = $row['addressHistory'];

        $_SESSION['vehicleHistory']= $row['vehicleHistory'];
        $_SESSION['homeAddressQuery']= $row['homeAddressQuery'];
        $_SESSION['workAddressQuery']= $row['workAddressQuery'];
        $_SESSION['currentLocationQuery'] = $row['currentLocationQuery'];
        $_SESSION['currentVehicleQuery'] = $row['currentVehicleQuery'];

        header('Location: http://localhost/basic_workshop/dashboard');
        exit();

    } else {
        unset($row);

        header('Location: http://localhost/basic_workshop/login');
        exit();

    }
}
?>