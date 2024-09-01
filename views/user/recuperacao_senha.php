<?php

    session_start();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
</head>
<body>

    <h1>Sentimos muito que você esteja passando esse transtorno, mas aqui você poderá recuperar a sua senha.</h1>

    <form action="../../services/recuperacao_senha.php" method = "POST">

        Insira o seu e-mail: <input type="email" name = "rec_email">

        <input type="submit" value = "Enviar">

    </form>
    
</body>
</html>

