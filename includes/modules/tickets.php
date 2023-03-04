<?php
include '../includes/database/database.php';

if ($_SESSION['header_routing'] == 'account' && $_SESSION['account_routing'] != 'tickets') {

  header('Location: http://localhost/basic_workshop/account');
  exit();
} else if ($_SESSION['header_routing'] == 'healthcare' && $_SESSION['account_routing'] != 'tickets') {

  header('Location: http://localhost/basic_workshop/clinical');
  exit();
}

if ($_SESSION['header_routing'] == 'account' && $_SESSION['account_routing'] == 'tickets') {
    echo  "<table id='account' class='table table-striped' style='width:100%'>
            <thead>
              <tr>
                <th>Reason For Access</th>
                <th>Type</th>
                <th>Access Date</th>
                <th>Organization</th>
                <th>Point of Contact</th>
                <th>Email</th>
                <th>Phone Number</th>
              </tr>
            </thead>
            <tbody>";
                $aid_finder = $_SESSION['account_id'];

                $tix_query0x1 = "SELECT * FROM tickets INNER JOIN clinic_accounts ON tickets.clinic_id=clinic_accounts.clinic_id WHERE tickets.account_id=$aid_finder";
                $tix_query0xsend = mysqli_query($connection, $tix_query0x1);

                $tix_query0xview = $tix_query0xsend->fetch_assoc();

                foreach ($tix_query0xsend as $row) {
                  echo '<tr>';
                    echo '<td>'. $row['reason'] .'</td>';
                    echo '<td>'. $row['type'] .'</td>';
                    echo '<td>'. $row['access_date'] .'</td>';
                    echo '<td>'. $row['clinic_name'] .'</td>';
                    echo '<td>'. $row['poc_name'] .'</td>';
                    echo '<td>'. $row['email'] .'</td>';
                    echo '<td>'. $row['phone_number'] .'</td>';
                  echo '</tr>';
                };

                $tix_query0x2 = "SELECT * FROM tickets INNER JOIN agency_info ON tickets.agency_id=agency_info.agency_id WHERE tickets.account_id=$aid_finder";
                $tix_query0xsend2 = mysqli_query($connection, $tix_query0x2);

                if ($tix_query0xview2 = $tix_query0xsend2->fetch_assoc()) {
                  foreach ($tix_query0xsend2 as $row) {

                    echo '<tr>';
                      echo '<td>'. $row['reason'] .'</td>';
                      echo '<td>'. $row['type'] .'</td>';
                      echo '<td>'. $row['access_date'] .'</td>';
                      echo '<td>'. $row['agency_name'] .'</td>';
                      echo '<td>'. $row['poc_name'] .'</td>';
                      echo '<td>'. $row['agency_email'] .'</td>';
                      echo '<td>'. $row['agency_phone'] .'</td>';
                    echo '</tr>';
                  };
                }
            echo "
          </tbody>
          <tfoot>
            <tr>
            <th>Reason For Access</th>
            <th>Type</th>
            <th>Access Date</th>
            <th>Organization</th>
            <th>Point of Contact</th>
            <th>Email</th>
            <th>Phone Number</th>
            </tr>
          </tfoot>
      </table>
  <script type='text/javascript'>
    $(document).ready(function () {
      $('#account').DataTable();
    });
  </script>";
  }
include "../includes/partials/footer.php";
?>
