<?php
class newUserModel {
    public function __construct($username, $email, $password) {
      $this->username = $username;
      $this->email = $email;
      $this->password = password_hash($password, PASSWORD_DEFAULT);
 
      $this->vkey = password_hash(time().$username, PASSWORD_DEFAULT);
      $this->created = date('Y-d-m');
      $this->locked_boolean = 0;
  }
  
    public function save($connection) {
      $query = "INSERT INTO users (staff_boolean, username, email, password, vkey, created, locked_boolean) VALUES (?, ?, ?, ?, ?, ?, ?)";
  
      $query = $connection->prepare($query);
      $query->bind_param("sssssss", $c, $a, $d, $b, $m, $n, $o);
  
        $c = '0';
        $a = $this->username;
        $d = $this->email;
        $b = $this->password;

        $m = $this->vkey;
        $n = $this->created;
        $o = $this->locked_boolean;
  
      $query->execute();
    }

    public function saveStaff($connection) {
      $query = "INSERT INTO users (staff_boolean, username, email, password, vkey, created, locked_boolean) VALUES (?, ?, ?, ?, ?, ?, ?)";
  
      $query = $connection->prepare($query);
      $query->bind_param("sssssss", $c, $a, $d, $b, $m, $n, $o);
  
        $c = '1';
        $a = $this->username;
        $d = $this->email;
        $b = $this->password;

        $m = $this->vkey;
        $n = $this->created;
        $o = $this->locked_boolean;
  
      $query->execute();
    }
}



?>