<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../utils/DB.php";
    use utils\DB;
    $banco = DB::getInstance();

    $token_url = (isset($_GET["token"])) ? $_GET["token"] : null;

    if($token_url != null){

        $pegar_token = $banco->select("*", "tokens", "WHERE", "token = '$token_url'");

        if($pegar_token && mysqli_num_rows($pegar_token) > 0){

            $linha_token = mysqli_fetch_assoc($pegar_token);

            $id_cliente = $linha_token["id_cliente"];
            $token_banco = $linha_token["token"];

            echo "ID do cliente: $id_cliente<br>";
            echo "Token que está no banco: $token_banco<br>";
            echo "Token da URL: $token_url<br>";

            if($token_url == $token_banco){

                echo "Os dois tokens são iguais!!!!!<br>";

                // sleep(10);

                $atualizar_estado_conta = $banco->update("clientes", "conta_estado = 1", "WHERE", "id = $id_cliente");

                echo "Estado da conta atualizado com sucesso!!!<br>";

                header("Location:../views/user/login.php");

            }else{

                echo "Token não condiz com o que está no banco!<br>";
            }

        }else{

            echo "O token está inválido!";
        }
    }