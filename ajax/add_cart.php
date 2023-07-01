<?php
session_start();
require '../models/general.php';
require '../models/conector.php';

if(!isset($_SESSION["id_user"])) {
    echo json_encode(["status" => false]);
    die();
}

$conn = Conector::connector();

$id_product = $_POST["id_product"];
$quantity = $_POST["quantity"];

$cart = new Cart($conn, $_SESSION["id_user"]);
$cart = $cart->addProduct($id_product, $quantity);

?>