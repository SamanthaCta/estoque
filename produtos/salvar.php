<?php
    require_once "../config.php";
    global $db;

    $nome = $_POST['nome'];
    $id_categoria = $_POST['id'];
    $dt_validade = $_POST['dt_validade'];
    $quantidade = $_POST['quantidade'];
    $id = $_POST['id'];
    
if(isset($_POST['nome'])){

    $sql = "UPDATE produtos SET nome = :nome, id_categoria = :id_categoria, dt_validade = :dt_validade, quantidade = :quantidade WHERE id = :id"; 
    $sql = $db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":id_categoria", $id_categoria);
    $sql->bindValue(":dt_validade", $dt_validade);
    $sql->bindValue(":quantidade", $quantidade);

    $sql->execute();
    
    header ("Location: listar.php?id=$id");
}
?>