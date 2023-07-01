<?php
require '../models/conector.php';
require '../models/general.php';

$conn = Conector::connector();

$update = new Crud($conn);
$update = $update->update($_POST["table"], $_POST["id"], [
    $_POST["field"] => $_POST["value"],
    ], $_POST["id_name"]);
echo "OK";
?>