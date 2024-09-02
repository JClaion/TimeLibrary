<?php

session_start();


$pageTitle = "Recuperar Senha";
$additionalLinks = [
    "../../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
];

//"../../assets/public/css/style.css"
$additionalScriptsFooter = [
    '../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js',
    "../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"
];

include "../../views/parts/header.php";
?>

<div class="container-fluid h-100">
    <div class="row h-100">

        <!-- Div da Imagem, deu trabalho. -->
        <div class="col-md-7 p-0">
            <img src="../../assets/public/images/logo.jpg" alt="Logo Time Library" class="img-fluid w-100" style="height: auto; max-height: 100vh; object-fit: cover;">
        </div>



        <!-- Formulário -->


        <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
            <div class="form w-75 p-4 rounded shadow-sm bg-white ">
                <form action="../../services/recuperacao_senha.php" method="POST">


                    <!-- Mensagem Interativa e Amigavel Albert que fez -->
                    <h1 class="text-center mb-4"> Redefina sua Senha. </h1>
                    <p class="text-center mb-4"> Não se preocupe! Vamos ajudá-lo a recuperar o acesso à sua conta rapidamente.</p>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group flex-nowrap">
                            <input placeholder="Digite seu Email" type="email" name="email" required class="form-control">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </span>
                        </div>
                    </div>



                    <input type="submit" class="btn btn-outline-primary w-100" value="Enviar">

                    <div class="mt-3 text-center">
                        <a class="btn btn-outline-secondary w-100" href="login.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../../views/parts/footer.php"; ?>


<!-- <h1>Sentimos muito que você esteja passando esse transtorno, mas aqui você poderá recuperar a sua senha.</h1>

<form action="../../services/recuperacao_senha.php" method = "POST">

    Insira o seu e-mail: <input type="email" name = "rec_email">

    <input type="submit" value = "Enviar">
       
</form> -->