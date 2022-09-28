<?php
    require_once "../config.php";

    $produtos = array();
    global $db;

    $sql = "SELECT produtos.id, produtos.nome, produtos.id_categoria, produtos.dt_entrada,produtos.dt_saida, produtos.dt_validade, produtos.quantidade, categorias.nome AS nome_categoria FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id";
    $sql = $db-> prepare($sql);
    $sql -> execute();

    if ($sql->rowCount() > 0){
        $produtos = $sql -> fetchAll();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Categoria</title>
     <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container fundo">
        <?php require_once "../menu.php" ?>
        
        <div class= "fundo-conteudo">
            <div class="container">
                </br>
                <fieldset>
                    <legend>Listar Produtos</legend>
                </fieldset>
                </br>

                <div class= "row">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>ID_categoria</th>
                            <th>DT_entrada</th>
                            <th>DT_saida</th>
                            <th>DT_validade</th>
                            <th>Quantidade</th>
                            
                        </thead>
                        <tbody>
                        <?php foreach($produtos as $produto): ?>
                                    <tr>
                                        <td> <?php echo $produto['id']?></td>
                                        <td><?php echo $produto['nome']?></td>
                                        <td><?php echo $produto['nome_categoria']?></td>
                                        <td><?php echo $produto['dt_entrada']?></td>
                                        <td><?php echo $produto['dt_saida']?></td>
                                        <td><?php echo $produto['dt_validade']?></td>
                                        <td><?php echo $produto['quantidade']?></td>

                                        <td>
                                            <a href="./editar_prod.php?id=<?php echo $produto['id'] ?>" class="btn btn-warning">Editar</a>
                                        
                                            <a href="excluir.php?id=<?php echo $dado['id']?>" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?> 
                        </tbody>
                    </table>
                        <a href="" class="btn btn-success">Salvar</a>
                        <br/>
                        <a href="index.php" class="btn btn-warning">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>