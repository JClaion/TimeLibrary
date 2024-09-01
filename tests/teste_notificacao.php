<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../utils/Notificacao.php";

    use utils\Notificacao;

    $obj = new Notificacao();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not</title>
</head>
<body>

    <?php
    
        echo $obj->mostrarSucesso("DEU CERTOOOOOO");
        echo $obj->mostrarErro("DEU ERRADOOOOO");

    ?>
    
</body>
</html>