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
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h1>Bem-vindo, <?php echo $nome ?> ao nosso dashboard!</h1>

    <h2>Acesse a nossa <a href = "../loja/tela_loja.php">loja!</a></h2>

    <a href="perfil.php">Perfil de usuário</a>

    
</body>
</html>