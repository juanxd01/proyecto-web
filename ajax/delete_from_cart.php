<?php
session_start();
require '../models/general.php';
require '../models/conector.php';

if(!isset($_SESSION["id_user"])) {
    echo json_encode(["status" => false]);
    die();
}

$conn = Conector::connector();

$id = $_POST["id"];

$cart = new Cart($conn, $_SESSION["id_user"]);
$cart = $cart->deleteProduct($id);

?>