<?php
if (isset($_POST)) {
    require("conexion.php");
    $id = $_POST['idp'];

    $nombre_gimcana = $_POST['nombre_gimcana'];
    $descripcion = $_POST['descripcion'];

    $query = $pdo->prepare("UPDATE tbl_gimcanas SET nombre_gimcana = :nombre_gimcana, descripcion_gimcana = :descripcion WHERE id = :id");
    $query->bindParam(":nom", $nombre_gimcana);
    $query->bindParam(":descripcion_gimcana", $descripcion_gimcana);
    $query->bindParam("id", $id);
    $query->execute();
    $pdo = null;
    echo "ok";
}