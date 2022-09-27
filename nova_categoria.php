<?php
    require_once "./config.php";

    $categorias = array();
    global $db;

    $sql = "SELECT * FROM categorias";
    $sql = $db-> prepare($sql);
    $sql -> execute();

    if ($sql->rowCount() > 0){
        $categorias = $sql -> fetchAll();
    }

if(count($_POST) > 0){

    $nome = $_POST['nome'];

    $sql = "INSERT INTO categorias SET nome = :nome";

    $sql = $db->prepare($sql);
    $sql->bindValue(":nome", $nome);
    $sql->execute();

    if($sql) {
        header("Location: nova_categoria.php");
    }

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
        <?php require_once "menu.php" ?>
        
        <div class= "fundo-conteudo">
            <div class="container">
                <fieldset>
                    <legend>Nova Categoria</legend>

                        <form method="POST">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome"/>
                        </form>
                </fieldset>

                <div class= "row">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                        </thead>
                        <tbody>
                        <?php foreach($categorias as $categoria): ?>
                                    <tr>
                                        <td> <?php echo $categoria['id']?></td>
                                        <td><?php echo $categoria['nome']?></td>
                                        
                                        <td>
                                            <a href="./categorias/editar.php?id=<?php echo $categoria['id'] ?>" class="btn btn-warning">Editar</a>
                                        
                                            <a href="excluir.php?id=<?php echo $dado['id']?>" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?> 
                        </tbody>
                    </table>
                        <br/><a href="index.php" class="btn btn-warning">Voltar</a>
                        <a href="" class="btn btn-success">Salvar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>