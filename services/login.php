<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../classe/DB.php";

    use classe\DB;

    $banco = DB::getInstance();

    



    if(isset($_POST["codigo_identificacao"]) && !empty($_POST["codigo_identificacao"])){
        if(isset($_POST["senha"]) && !empty($_POST["senha"])){

            $codigo_identificacao = $_POST["codigo_identificacao"];

            // echo "String suja: $codigo_identificacao <br>";

            // $codigo_limpo = preg_replace('/[\.\-\s\/]/', '', $codigo_identificacao);

            // echo "String limpa: $codigo_limpo <br>";

            // if(strlen($codigo_limpo) == 11){

            //     echo "Este código é um CPF <br>";

            // }else if(strlen($codigo_limpo) == 14){

            //     echo "Este código é um CNPJ <br>";

            // }else{

            //     echo "Código inválido! <br>";
            // }


            //$senha = $_POST["senha"];

            //$banco->select("cpf, cnpj", "clientes", "");

        }
    }


    

    
?>