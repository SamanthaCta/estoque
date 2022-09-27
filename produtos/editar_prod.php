<?php
require_once "../config.php";

    $produtos = array();
    
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql -> bindValue(":id", $id); 
    $sql -> execute();

    if($sql->rowCount() > 0){
        $produtos = $sql ->fetch();

    }else{
        header("Location: ../produtos/listar.php");
        exit;
    }
}

    $categorias = array();
    $sql = "SELECT * FROM categorias";
    $sql = $db->prepare($sql);
    $sql->execute();

    if ($sql->rowCount() > 0){
        $categorias = $sql->fetchAll();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Document</title>
</head>
<body>

<div class="container fundo" >
    <?php require_once "../menu.php" ?>

    <div class="fundo_conteudo">
 

    <div class="container">

        <fieldset>
            <legend>Editar Produtos</legend>
                <form method="POST" action="salvar.php">
                    <label>Nome*</label>
                    <input type="text" required class="form-control" name="nome" value="<?php echo $produtos['nome'] ?>"/>

                    <label>Categoria ID*</label>
                    <select name="categoria" required class="form-control" id="">

                        <option value="" disabled selected>Selecione uma categoria</option>
                        <?php foreach($categorias as $categoria): ?>
                            
                        <option value="<?php echo $categoria['id'] ?>"><?php echo ($categoria['id'] == $produtos['id_categoria'] ? 'selected' : '') ?>

                        <?php echo $categoria['nome'] ?>
                        </option>
                        <?php endforeach ?>
                        
                    </select>

                    <label>Data de Validade</label>
                    <input type="date" class="form-control" name="dt_validade"/>

                    <label>Quantidade</label>
                    <input type="text" class="form-control" name="quantidade"/>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <br/>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="listar.php" class="btn btn-warning">Voltar</a>
                    
                </form>
        </fieldset>        
    </div>
</body>
</html>