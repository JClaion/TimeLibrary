<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    if(isset($_POST["email"]) && !empty($_POST["email"])){
        if(isset($_POST["senha"]) && !empty($_POST["senha"])){

            $email = $_POST["email"];
            $senha = $_POST["senha"];

            echo "Email: $email<br>Senha: $senha";

            
            

            

        }
    }
?>