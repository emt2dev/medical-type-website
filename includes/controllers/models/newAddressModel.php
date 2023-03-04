<?php
class newAddressModel {
    public function __construct($address_numericals, $address_street, $address_apt, $address_city, $address_state, $address_country, $address_postal) {
    
        $this->num = $address_numericals;
        $this->street = $address_street;
        $this->apt = $address_apt;
        $this->city = $address_city;
        $this->state = $address_state;
        $this->country = $address_country;
        $this->postal = $address_postal;
        $this->addressQuery = "";
    }

    public function addressQueryCheck($connection) {
        $this->addressQuery = $this->num.$this->street.$this->apt.$this->city.$this->state.$this->postal;

        $address = $this->addressQuery;
        $address = sanitizeSpacing($address);

        $this->addressQuery = $address;

        $query = "SELECT * FROM addresses WHERE addressQuery='$address'";
        $query = mysqli_query($connection, $query);

        $existsChecker = mysqli_num_rows($query);

        if ($existsChecker == 1) {

            $_SESSION['address_in_db'] = "The address has been added!";
            header('Location: http://localhost/basic_workshop/dashboard');
            exit();
        }
    }

    public function addressInsert($connection, $id) {

        // $a = $this->addressQuery;
        // $b = $id . ", ";
        // $c = $this->num;
        // $d = $this->street;
        // $e = $this->apt;
        // $f = $this->city;
        // $g = $this->state;
        // $h = $this->country;
        // $i = $this->postal;
        // $j = $id;

        // $query = "INSERT INTO addresses (addressQuery, addressOccupants, numericals, street, apartment, city, state, country, postal, user_added_by) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";

        $query = "INSERT INTO addresses (addressQuery, addressOccupants, numericals, street, apartment, city, state, country, postal, user_added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query = $connection->prepare($query);
            $query->bind_param("ssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j);
                $a = $this->addressQuery;
                $b = $id . ", ";
                $c = $this->num;
                $d = $this->street;
                $e = $this->apt;
                $f = $this->city;
                $g = $this->state;
                $h = $this->country;
                $i = $this->postal;
                $j = $id;

        $query->execute();
    }

    public function getAddressQuery() {
        return $this->addressQuery;
    }
}
?>