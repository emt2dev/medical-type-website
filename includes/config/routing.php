<?php
$routing = strtolower($_SERVER['REQUEST_URI']);

/* THE FOLLOWING LOGS OUT ANY USER TYPE */
if ($routing == '/basic_workshop/?logout=true') {
    if ($_GET['logout'] == 'true') {
        session_destroy();
        unset($_SESSION);
        
        header('Location: http://localhost/basic_workshop/');
        exit();
        }
}
    /* includes the html head section and our css*/
    include "includes/assets/html/heading.html";
    include 'includes/config/components/margins/navbar__icons.php';

    switch ($routing) {

        /* This is our landing page */
        case '/basic_workshop/':
          
            /* Here we load the home, story, icons sections */
            include "includes/assets/html/partials/home__.html"; // Introduction of the company
            include "includes/assets/html/partials/story__.html"; // Tells the user about the company
            include "includes/assets/html/partials/icons__.html"; // Shows the benefits of the company
            include "includes/assets/html/partials/contact__.html"; // allows the user to create a contact us message to be viewed by the company's employees

            echo $routing;
            break;
        
        case '/basic_workshop/catalog':
            echo "test successful";
            break;

        case '/basic_workshop/sr':
            if (isset($_SESSION['staff_id'])) {

                include "includes/config/components/dashboard/support__full.php";
            } else if (isset($_SESSION['user_id'])) {

                include "includes/config/components/dashboard/support__full.php";
            }
            break;
        
        case '/basic_workshop/dashboard':
            // echo "dashboard";

            include "includes/assets/html/news.html"; // this is where users and staff can see new alerts

            if (isset($_SESSION['staff_boolean']) && $_SESSION['staff_boolean'] == 1) {
                echo getcwd();
                include "includes/assets/html/forms/addVendor.html";
                include "includes/assets/html/forms/addStaff.html";

                echo "<section class='tables__'>";
                    include "components/tables/grossCount.php";

                    include "components/tables/vendorTable.php";
                    include "components/tables/addressTable.php";
                echo "</section>";

                echo "<section class='tables__'>";
                    

                echo "</section>";

                
                // break;
            } else if (isset($_SESSION['id'])) {

                include "includes/assets/html/forms/addAddress.phtml";
                include "includes/assets/html/forms/addVehicle.phtml";

                include "components/tables/usersHistoryAddressTable.phtml"; // this opens the address table
                include "components/tables/usersHistoryVehicleTable.phtml"; // this opens the vehicle table

                // include "includes/assets/html/tables/sr_open.html"; // this is where users can see their support requests
                // include "includes/config/components/dashboard/user/tables/sr.php";
                // include "includes/assets/html/forms/support.html"; // this is where users can ask for help and see their help requests
                // break;
            } else {
                
                header('Location: http://localhost/basic_workshop/login');
                exit();
                // break;
            }
            break;

        case '/basic_workshop/login':
            unset($_SESSION);
            include "includes/assets/html/forms/login.html"; // populates login page
            break;

        case '/basic_workshop/subscribing':
            if (isset($_SESSION['id']) && isset($_SESSION['checkout_success'])) {
                include "includes/assets/html/partials/success.html"; // populates register page
            } else if(isset($_SESSION['id']) && !isset($_SESSION['checkout_success'])) {
                    include "includes/assets/html/partials/cancel.html"; // populates register page
            } else {
                echo '<br /><br /><br /><br /><br /><br /><br /><br /><center>';
                include "includes/assets/html/forms/checkout.html"; // populates register page;
                echo '<br /><br /><br /><br /><br /><br /><br /><br /><center>';
            }
            break;

            case '/basic_workshop/register':
            include "includes/assets/html/forms/register.html"; // populates register page
            break;

        /*
        THIS SECTION WE USE IF THE USER ATTEMPTS TO ACCESS OUR .php file extensions,
            - this is secondary to our .htaccess files
        */
        case '/basic_workshop/catalog.php':
            header('Location: http://localhost/basic_workshop/catalog');
            exit();
            break;

        case '/basic_workshop/dashboard.php':
            header('Location: http://localhost/basic_workshop/dashboard');
            exit();
            break;

        case '/basic_workshop/login.php':
            header('Location: http://localhost/basic_workshop/login');
            exit();
            break;

        case '/basic_workshop/register.php':
            header('Location: http://localhost/basic_workshop/register');
            exit();
            break;

        /* END PHP SECURITY */
        case '/basic_workshop/test.php':
            header('Location: http://localhost/basic_workshop/');
            exit();
            break;

        default:
            
            echo '<br /><br /><br /><br /><br /><br /><br /><br /><center><img src="includes\assets\media\logo.svg" alt="">
            <br/><h1>404 page; create 404 page</h1></center>";';
            
            
            break;
      }

      include "includes/assets/html/footing.html"; //  footer section
?>