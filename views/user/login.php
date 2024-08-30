<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<body>
    
    <form action="../../services/login.php" method = "POST">

        <label for="email">Email:</label>
        <input type="text" name = "codigo_identificacao"><br>
        <label for="email">Senha:</label>
        <input type="text" name = "senha"><br>

        <input type="submit" value = "Logar-se">

    </form>

</body>
</html>
