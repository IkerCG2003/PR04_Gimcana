<?php
require("conexion.php");
$id = $_POST['id'];

$query = $pdo->prepare("DELETE FROM tbl_gimcanas WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();

$query2 = $pdo2->prepare("DELETE FROM tbl_grupos_gimcanas WHERE id_gimcana = :id");
$query2->bindParam(":id", $id);
$query2->execute();
echo "ok";