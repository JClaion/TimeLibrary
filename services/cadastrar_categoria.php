<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    if(isset($_POST["categoria"])){

        $categoria = $_POST["categoria"];

        echo $categoria . "<br>";

        $inserir_categoria_livro = $banco->insert("categorias", "'$categoria'", "categoria");

        if($inserir_categoria_livro){

            echo "INSERÇÃO CONCLUIDA!";
            $_SESSION["cadastro_categoria"] = true;

            header("Location:../views/admin/cadastrar_categoria");

        }else{

            echo "INSERÇÃO MAL SUCEDIDA.";
        }
    }
?>

