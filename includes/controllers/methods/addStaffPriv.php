<?php
    function addStaffPriv($connection, $username) {
        $query = "UPDATE `users` SET `staff_boolean`='1' WHERE username='$username'";
        $querySend = mysqli_query($connection, $query);
        unset($query);
        unset($querySend);
    }
?>