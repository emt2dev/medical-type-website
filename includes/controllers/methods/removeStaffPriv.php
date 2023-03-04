<?php
    function removeStaffPriv($connection, $username) {
        $query = "UPDATE `users` SET `staff_boolean`='0' WHERE username='$username'";
        $querySend = mysqli_query($connection, $query);
        unset($query);
        unset($querySend);
    }
?>