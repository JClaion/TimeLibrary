<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    if(isset($_SESSION["email_login"])){

        $email_login = $_SESSION["email_login"];

        $pegar_tudo = $banco->select("*", "clientes", "WHERE", "email = '$email_login'");

        if($pegar_tudo && mysqli_num_rows($pegar_tudo)){

            $linha_login = mysqli_fetch_assoc($pegar_tudo);

            $email = $linha_login["email"];
            $nome = $linha_login["nome"];
            $cargo = $linha_login["cargo"];


        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome</title>
</head>
<body>

    <?php if($cargo != "administrador"): ?>

        <h1>Você não tem permissão para entrar aqui.</h1>

        <a href="../user/login.php">Voltar</a>
        <?php session_destroy(); ?>
    
    <?php else: ?>

        <h1>Dashboard de ADM</h1>

        <a href="cadastrar_categoria.php">Cadastrar categoria.</a>
        <a href="cadastrar_livro.php">Cadastrar livro.</a>
        <a href="cadastrar_editora.php">Cadastrar editora.</a>

        <a href="perfil.php">Perfil de administrador</a>


    <?php endif; ?>

</body>
</html>