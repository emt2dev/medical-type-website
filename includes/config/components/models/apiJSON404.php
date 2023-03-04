<?php
class apiCall404 {
    function __construct() {
        $this->message = "Incorrect Routing or Key, ensure routing and key are query strings.";
        $this->status =  "404";
        $this->result = "no query submitted";
    }
}

?>