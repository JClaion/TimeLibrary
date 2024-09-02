<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../utils/Email.php";

    use utils\Email;

    $em = new Email();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>

    <form action="teste_email.php" method = "post">

        Assunto:<input type="text" name = "assunto"><br>
        Conteudo:<input type="text" name = "conteudo"><br>
        Destino:<input type="text" name = "destino"><br><br>

        <input type="submit" value = "Enviar">

    </form>

    <?php
        if(isset($_POST["assunto"]) && isset($_POST["conteudo"]) && isset($_POST["destino"])){

            $em->enviarEmail($_POST["assunto"], $_POST["conteudo"], $_POST["destino"]);

        }
    ?>

</body>
</html>