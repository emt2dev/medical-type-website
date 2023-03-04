<?php
class newVehicleModel {
    public function __construct($vin, $color, $plate, $state, $engine, $type, $make, $insured_boolean, $userId) {
    
        $this->vin = $vin;
        $this->color = $color;
        $this->plate = $plate;
        $this->state = $state;
        $this->engine = $engine;
        $this->type = $type;
        $this->make = $make;
        $this->insured_boolean = $insured_boolean;

        $this->vehicleQuery = time().$userId;
    }

    public function vehicleQueryCheck($connection) {
       
        $vin = $this->vin;
        $plate_num = $this->plate;
        $state = $this->state;

        $query = "SELECT * FROM `vehicles` WHERE vin='$vin' OR plate_num='$plate_num' AND state='$state'";
        $query = mysqli_query($connection, $query);

        $existsChecker = mysqli_num_rows($query);

        if ($existsChecker == 1) {

            $_SESSION['vehicle_in_db'] = "The vehicle has been added!";
            header('Location: http://localhost/basic_workshop/dashboard');
            exit();
        }
    }

    public function vehicleInsert($connection, $id) {

        // $a = $this->vehicleQuery;
        // $b = $id . ", ";
        // $c = $this->num;
        // $d = $this->street;
        // $e = $this->apt;
        // $f = $this->city;
        // $g = $this->state;
        // $h = $this->country;
        // $i = $this->postal;
        // $j = $id;

        // $query = "INSERT INTO vehiclees (vehicleQuery, vehicleOccupants, numericals, street, apartment, city, state, country, postal, user_added_bym vehicleQuery) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j', $k)";

        $query = "INSERT INTO vehicles (VIN, color, plate_num, state, engine, type, make, insured_boolean, vehicleOccupants, user_added_by, vehicleQuery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query = $connection->prepare($query);
            $query->bind_param("sssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k);
                $a = $this->vin;
                $b = $this->color;
                $c = $this->plate;
                $d = $this->state;
                $e = $this->engine;
                $f = $this->type;
                $g = $this->make;
                $h = $this->insured_boolean;
                $i = $id . ", ";
                $j = $id;
                $k = $this->vehicleQuery;

        $query->execute();
    }

    public function getVehicleQuery() {
        return $this->vehicleQuery;
    }
}
?>