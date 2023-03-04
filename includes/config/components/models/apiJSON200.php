<?php
class apiCall200 {
    public function __construct($type) {
        $this->message = "Query Found";
        $this->type = $type;
        $this->status =  "200";
        $this->found = ", ";
    }

    public function usersFound($occupants) {
        $this->found = $occupants;
    }
}
?>