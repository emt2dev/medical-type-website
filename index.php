<?php

include 'includes/config/config.php'; // Here we set headers, open our db, and more!

$serverRouting = $_SERVER['SERVER_NAME'];

switch ($serverRouting) {
    case 'api.localhost':
        include 'includes/config/apiHandler.php';
        break;

    case 'vendors.localhost':
        include 'includes/config/vendorRouting.php';
        break;

    default:
        include 'includes/config/routing.php'; // here we render files based on the uri
        break;
}
?>