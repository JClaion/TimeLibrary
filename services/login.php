<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once "../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    if(isset($_POST["email"]) && !empty($_POST["email"])){
        if(isset($_POST["senha"]) && !empty($_POST["senha"])){

            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $consulta_login = $banco->select("email, senha, cargo", "clientes", "WHERE", "email = '$email' AND senha = '$senha'");

            if($consulta_login && mysqli_num_rows($consulta_login) > 0){

                $linha_login = mysqli_fetch_assoc($consulta_login);

                if($linha_login["email"] == $email && $linha_login["senha"] == $senha){

                    $_SESSION["email_login"] = $linha_login["email"];

                    if($linha_login["cargo"] == "administrador"){

                        header("Location:../views/admin/dashboard.php"); 

                    }elseif($linha_login["cargo"] == "cliente"){

                        header("Location:../views/user/dashboard.php"); 

                    }
                
                }else{

                    echo "Dados não batem com o banco de dados.";//Colocar outro session aqui.
                }

            }else{

                echo "Usuário não encontrado!";//Colocar um session de erro aqui!!!!!!!!!! E nos outros também.

            }
        }
    }
?>