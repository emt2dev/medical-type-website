<?php
// displays table of addresses
  echo  "<div>
            <br/>
            <center><h1>User and Vendor Count</h1></center>
            <table id='account' class='table table-striped' style='width:100%'>
            <thead>
                <tr>
                    <th>Amount of Paying Users</th>
                    <th>Monthly Users</th>
                    <th>Annual Users</th>
                    <th>Amount of API Keys</th>
                    <th>Monthly API</th>
                    <th>Annual API</th>
                    <th>Monthly Total</th>
                    <th>Annual Total</th>
                </tr>
            </thead>
            <tbody>";
                $sql = "SELECT COUNT(*) FROM users WHERE locked_boolean='0' AND staff_boolean='0'";
                $userCount = 0;
                if ($result = mysqli_query($connection, $sql)) {
                    $row = mysqli_fetch_row($result);
                    $userCount = $row[0];
                }
                echo "<td>". $userCount . "</td>";
                echo "<td>". $userCount*20 . "</td>";
                echo "<td>". $userCount*20*12 . "</td>";

                $sql = "SELECT COUNT(*) FROM api_keys WHERE invoice_status='paid'";
                $apiCount = 0;
                if ($result = mysqli_query($connection, $sql)) {
                    $row = mysqli_fetch_row($result);
                    $apiCount = $row[0];
                }
                echo "<td>". $apiCount . "</td>";
                echo "<td>". $apiCount*179.99 . "</td>";
                echo "<td>". $apiCount*179.99*12 . "</td>";
                echo "<td>". $apiCount*179.99*12 . "</td>";

                echo "<td>". $userCount*20 + $apiCount*179.99 . "</td>";
                echo "<td>". $userCount*20*12 + $apiCount*179.99*12 . "</td>";
                echo "
            </tbody>
            <tfoot>
            <tr>
                <th>Amount of Paying Users</th>
                <th>Monthly Users</th>
                <th>Annual Users</th>
                <th>Amount of API Keys</th>
                <th>Monthly API</th>
                <th>Annual API</th>
                <th>Monthly Total</th>
                <th>Annual Total</th>
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