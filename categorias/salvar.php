<?php
    require_once "../config.php";
    
    $categoria = $_POST['nome'];
    $id = $_POST['id'];
    $sql = "UPDATE categorias SET nome = :categoria WHERE id = :id"; 
    $sql = $db->prepare($sql);
    $sql->bindValue(":categoria", $categoria);
    $sql->bindValue(":id", $id);
    $sql->execute();
    

    header ("Location: editar.php");
?>