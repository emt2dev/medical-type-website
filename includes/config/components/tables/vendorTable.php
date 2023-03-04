<?php
// displays table of addresses
  echo  "<div>
            
            <br/>
            <center><h1>Vendor List</h1></center>
            <table id='account' class='table table-striped' style='width:100%'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Billing Info</th>
                    <th>Due Date</th>
                    <th>Invoice Status</th>
                    <!-- <th>Change to Paid</th> -->
                    <!-- <th>Change to Not Paid</th> -->
                </tr>
            </thead>
            <tbody>";
                $sr_query01 = "SELECT * FROM api_keys ORDER BY due_date";

                if ($result = mysqli_query($connection, $sr_query01)) {
                    $row_count = mysqli_num_rows($result);

                    if ($row_count > 0) {
                    $sr_view02 = $result->fetch_assoc();

                    foreach ($result as $row) {
                        unset($row['vendor_key']);
                        echo '<tr>';
                            echo '<td>'. $row['vendor_name'] .'</td>';
                            echo '<td>'. $row['billing_info'] .'</td>';
                            echo '<td>'. $row['due_date'] .'</td>';
                            echo '<td>'. $row['invoice_status'] .'</td>';
                        echo '</tr>';
                    };
                    }
                }
            echo "
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Billing Info</th>
                <th>Due Date</th>
                <th>Invoice Status</th>
                <!-- <th>Change to Paid</th> -->
                <!-- <th>Change to Not Paid</th> -->
            </tr>
            </tfoot>
        </table>
    </div>
<script type='text/javascript'>
  $(document).ready(function () {
    $('#account').DataTable();
  });
</script>";
?>