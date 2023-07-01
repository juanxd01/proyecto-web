<?php
session_start();
require_once 'controllers/general.php';
require_once 'models/conector.php';
$page = "";
$conn = Conector::connector();
if(isset($_GET["p"])){
    $page = $_GET["p"];
}

switch($page){
    case 'products':
        products($conn);
        break;
    case 'product_details':
        productDetails($conn);
        break;
    case 'signup':
        signup($conn);
        break;
    case 'login':
        login($conn);
        break;
    case 'admin':
        admin($conn);
        break;
    case 'dashboard':
        dashboard($conn);
        break;
    case 'brands':
        brands($conn);
        break;
    case 'users':
        users($conn);
        break;
    case 'mail':
        _mail($conn);
        break;
    case 'aboutus':
        aboutUs($conn);
        break;
    case 'logout':
        logout($conn);
        break;
    case 'adminlogin':
        adminLogin($conn);
        break;
    default:
        mainView($conn);
        break;
}

?>