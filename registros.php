<?php
require_once "config.php";

global $db;

$sql = "SELECT * FROM usuarios";
$sql = $db-> prepare($sql);
$sql -> execute();

$dados = $sql -> fetchAll(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container fundo" >
        
        <?php require_once "menu.php" ?>

            <div class="fundo_conteudo">
                <fieldset>
                    <legend>Lista de Usuários</legend>
                    <hr/>
                    <table class='table'>


                        <thead class="table-dark">
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Data</th>
                            <th>Senha</th>
                            <th>Usuário</th>
                            <th>Opções</th>
                            <th></th>

                        </thead>
                            <tbody>
                                <?php foreach($dados as $dado): ?>
                                    <tr>
                                        <td> <?php echo $dado['id']?></td>
                                        <td><?php echo $dado['nome']?></td>
                                        <td><?php echo $dado['sobrenome']?></td>
                                        <td><?php echo $dado['data_criacao']?></td>
                                        <td><?php echo $dado['senha']?></td>
                                        <td><?php echo $dado['usuario']?></td>
                                        <td>
                                            <a href="excluir.php?id=<?php echo $dado['id']?>" class="btn btn-danger">Excluir</a>

                                            <a href="editar.php?id=<?php echo $dado['id']?>" class="btn btn-warning">Editar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </fieldset>
                    <a href="index.php" class="voltar">Voltar</a>
            </div>
    </div>
</body>
</html>