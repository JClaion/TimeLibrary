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


<?php if($cargo != "administrador"): ?>

<h1>Você não tem permissão para entrar aqui.</h1>

    <a href="../user/login.php">Voltar</a>
    <?php session_destroy(); ?>

<?php else: ?>

    <h1>Tela de perfil</h1>    


<?php endif; ?>