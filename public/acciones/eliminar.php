<?php
require("conexion.php");
$id = $_POST['id'];
$query = $pdo->prepare("DELETE FROM tbl_gimcanas WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
echo "ok";