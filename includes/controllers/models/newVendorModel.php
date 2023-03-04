<?php
class newVendorModel {
    public function __construct($vendor_name, $billing_info, $due_date, $invoice_status) {
      $this->vendor_name = $vendor_name;
      $this->billing_info = $billing_info;
      $this->due_date = $due_date;
      $this->invoice_status = $invoice_status;

      $this->vendor_key = "";
  }
  
    public function saveAPIkey($connection) {

      $this->vendor_key = password_hash(time().$vendor_name, PASSWORD_DEFAULT);

      $query = "INSERT INTO api_keys (vendor_key, vendor_name, billing_info, due_date, invoice_status) VALUES (?, ?, ?, ?, ?)";
  
      $query = $connection->prepare($query);
      $query->bind_param("sssss", $a, $b, $c, $d, $e);
  
        $a = $this->vendor_key;
        $b = $this->vendor_name;
        $c = $this->billing_info;
        $d = $this->due_date;
        $e = $this->invoice_status;
  
      $query->execute();

      header('Location: http://localhost/basic_workshop/dashboard');
      exit();
    }

    public function saveAffiliate($connection) {
      $query = "INSERT INTO api_keys (vendor_name, billing_info, due_date, invoice_status) VALUES (?, ?, ?, ?)";
  
      $query = $connection->prepare($query);
      $query->bind_param("ssss", $b, $c, $d, $e);
  
        $b = $this->vendor_name;
        $c = $this->billing_info;
        $d = $this->due_date;
        $e = $this->invoice_status;
  
      $query->execute();

      header('Location: http://localhost/basic_workshop/dashboard');
      exit();
    }
}



?>