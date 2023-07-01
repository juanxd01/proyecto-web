<?php
require '../models/conector.php';
require '../models/general.php';

$conn = Conector::connector();

$delete = new Crud($conn);
$delete = $delete->delete($_POST["table"], $_POST["id"], $_POST["id_name"]);
echo "OK";
?>