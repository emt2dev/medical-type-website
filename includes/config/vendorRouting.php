<?php

// $_SESSION['vendor_id'] = '1';

$routing = strtolower($_SERVER['REQUEST_URI']);

/* THE FOLLOWING LOGS OUT ANY USER TYPE */
if ($routing == '/basic_workshop/?logout=true') {
    if ($_GET['logout'] == 'true') {
        session_destroy();
        unset($_SESSION);
        
        header('Location: http://vendors.localhost/basic_workshop/');
        exit();
        }
}
    /* includes the html head section and our css*/
    include "includes/assets/html/vendorHeading.html";
    include 'includes/config/components/margins/navbar__icons.php';

    switch ($routing) {
        case '/basic_workshop/':
            if ($_SESSION['id']) {
                include "includes/assets/html/news.html";
                include "includes/assets/html/vendorDashboard.phtml";
            } else {
                include "includes/assets/html/forms/vendorLogin.html";
                include "includes/assets/html/news.html";
            }
            break;

        case '/basic_workshop/viewuser':
            // include "includes/assets/html/news.html";
            include "includes/config/components/tables/viewUser.phtml";
            break;

        case '/basic_workshop/documentation':
            include "includes/assets/html/news.html";
            include "includes/assets/html/vendorDocumentation.html";
            break;

        case '/basic_workshop/search':
            include "includes/assets/html/news.html";

            include "includes/assets/html/forms/vendor/patientSearch.html";
            include "includes/config/components/tables/searchPatientResults.phtml";

            include "includes/assets/html/forms/vendor/addressSearch.html";
            include "includes/config/components/tables/searchAddressResults.phtml";

            include "includes/assets/html/forms/vendor/vehicleSearch.html";
            include "includes/config/components/tables/searchVehicleResults.phtml";

            break;

        default:
            header('Location: http://vendors.localhost/basic_workshop/');
            exit();
            break;
    }

include "includes/assets/html/footing.html"; //  footer section
?>