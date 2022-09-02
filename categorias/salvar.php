<?php
    require_once "../config.php";

    $categoria = $_POST['nome'];
    $id = $_POST['id'];
    $sql = "UPDATE categiria SET nome = :categoria WHERE id = :id"; 
    $sql = $db->prepare($sql);
    $sql->bindValue(":categoria", $categoria);
    $sql->execute();

    header ("Location: editar.php");
?>