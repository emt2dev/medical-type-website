<?php
// displays table of addresses
  echo  "<div>
            
            <br/>
            <center><h1>User Area Demographics</h1></center>
            <table id='account' class='table table-striped' style='width:100%'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>";
                $addressQuery = "SELECT id, city, state, postal, date_added FROM addresses ORDER BY date_added";

                if ($result = mysqli_query($connection, $addressQuery)) {
                    $row_count = mysqli_num_rows($result);

                    if ($row_count > 0) {
                    $addressQuery1 = $result->fetch_assoc();

                    foreach ($result as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['id'] .'</td>';
                        echo '<td>'. $row['city'] .'</td>';
                        echo '<td>'. $row['state'] .'</td>';
                        echo '<td>'. $row['postal'] .'</td>';
                        echo '<td>'. $row['date_added'] .'</td>';
                        echo '</tr>';
                    };
                    }
                }
            echo "
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>City</th>
                <th>State</th>
                <th>Postal</th>
                <th>Date Added</th>
            </tr>
            </tfoot>
        </table>
    </div>
<script type='text/javascript'>
  $(document).ready(function () {
    $('#address').DataTable();
  });
</script>";
?>