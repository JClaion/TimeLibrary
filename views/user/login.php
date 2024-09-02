<?php

session_start();

require "../../utils/Notificacao.php";

$pageTitle = "Login";
$additionalLinks = [
    "../../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
    "https://fonts.googleapis.com",
    "https://fonts.gstatic.com",
    "https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
];

//"../../assets/public/css/style.css"
$additionalScriptsFooter = [
    '../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js',
    "../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"
];

include "../../views/parts/header.php";

    if(isset($_SESSION["email_recuperacao"])){

        if($_SESSION["email_recuperacao"] == false){

            echo "<h1>O seu e-mail não foi encontrado no banco de dados</h1>";
            unset($_SESSION["email_recuperacao"]);

        }elseif($_SESSION["email_recuperacao"] == true){

            echo "<h1>Verifique a caixa de entrada ou spam do seu e-mail.</h1>";
            unset($_SESSION["email_recuperacao"]);

        }
    }

    if(isset($_SESSION["email_cadastro"])){
        
        if($_SESSION["email_cadastro"] == true){

            echo "<h1>Um e-mail foi enviado para o seu e-mail, verifique lá para confirmar a criação de sua conta.</h1>";
            unset($_SESSION["email_cadastro"]);

        }elseif($_SESSION["email_cadastro"] == false){

            echo "<h1>Houve algum erro no cadastro de sua conta..</h1>";
            unset($_SESSION["email_cadastro"]);
        }
    }



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
                <form action="../../services/login.php" method="POST">
                    <h1 class="text-center mb-4"> Bem Vindo </h1>
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

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <div class="input-group flex-nowrap">
                            <input type="password" placeholder="Digite sua Senha" name="senha" required class="form-control">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center">
                        <a href="recuperacao_senha.php">Esqueci minha senha</a> <!--Coloquei pra testar, calma, sem neurose -->
                    </div>

                    <input type="submit" class="btn btn-outline-primary w-100" value = "Logar-se">

                    <div class="mt-3 text-center">
                        <p>Não está cadastrado? <a href="cadastro.php">Cadastrar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "../../views/parts/footer.php"; ?>