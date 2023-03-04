<?php
    function register($connection, $username, $email, $password) {

        /* HERE WE DETERMINE IF THE username ALREADY EXISTS */
        $query = "SELECT username FROM users WHERE username=?";

        $query = $connection->prepare($query);
        $query->bind_param("s", $a);

            $a = $username;

        $query->execute();
        $query->store_result();
        $existsChecker = $query->num_rows();

        if ($existsChecker == 1) {
                $_SESSION['incorrectLogin'] = "The username already exists";
                header('Location: http://localhost/basic_workshop/login');
                exit();
        }   else {
            $user = sanitizeSpacing($username);
            $user = sanitizeSpacing($email);

            $newUser = new newUserModel($username, $email, $password);
            
            $newUser->save($connection);

        }

    // send vkey emails here, not in MVP

    // divert to login page until the stripeApi is fixed.
    header('Location: http://localhost/basic_workshop/login');
    exit();

    /* #stripeAPI */
    // header('Location: http://localhost/basic_workshop/subscribing');
    // exit();
}

?>