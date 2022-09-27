<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="fundo_menu">
        <a href="<?php echo $url ?>novo_usuario.php">
            <div class="botao_menu"> <img src="<?php echo $url ?>./img/mais-zoom.gif" alt="adiconar"></div>
        </a>
    
        <a href="<?php echo $url ?>busca.php">
            <div class="botao_menu"><img src="<?php echo $url ?>./img/procurar.gif" alt="pesquisa"></div>
        </a>

        <a href="<?php echo $url ?>nova_categoria.php">
            <div class="botao_menu"><img src="<?php echo $url ?>./img/definicoes.gif" alt=""></div>
        
        <a href="<?php echo $url ?>nova_categoria.php">
        <div class="botao_menu"><img src="<?php echo $url ?>./img/exame.gif"></div>
        </a>

        <a href="<?php echo $url ?>novo_produto.php">
        <div class="botao_menu"><img src="<?php echo $url ?>./img/lapis.gif"></div>
        </a>

        <a href="<?php echo $url ?>produtos/listar.php">
        <div class="botao_menu"><img src="<?php echo $url ?>./img/pa-de-lixo.gif"></div>
        </a>
    </div>
</body>
</html>