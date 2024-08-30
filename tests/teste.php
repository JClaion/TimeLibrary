<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="teste.php" method = "POST">

        Assunto: <input type="text" name = "assunto"><br>
        Conteúdo: <input type="text" name = "conteudo"><br>
        Destino: <input type="text" name = "destino"><br>
        Assunto: <input type="text" name = "assunto"><br>
        <input type="submit" name = "enviar" value = "Enviar">

    </form> 

    <?php
        if(isset($_POST["enviar"])){
            if(isset($_POST["assunto"]) && !empty($_POST["assunto"])){
                if(isset($_POST["conteudo"]) && !empty($_POST["conteudo"])){
                    if(isset($_POST["destino"]) && !empty($_POST["destino"])){

                        $assunto = $_POST["assunto"];
                        $conteudo = $_POST["conteudo"];
                        $destino = $_POST["destino"];

                        $teste = $obj->emailGenerico($assunto, $conteudo, $destino);

                        if($teste == false){

                                echo "Email FALHOU!!<br>";

                            }else{
                                
                               echo "Email foi enviado!";
                        }
                    }
                }
            }
        }
    
    ?> 

</body>
</html>

<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../utils/CodigoValido.php";

    use classe\CodigoValido;

    $obj = new CodigoValido();

    $teste = $obj->validarCPF("050.104.442.67");

    if($teste == true){

        echo "CPF válido!";

    }else{

        echo "CPF inválido!";
    }
    
    
