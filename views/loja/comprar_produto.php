<?php

    // session_start();

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    // require "../../utils/DB.php";

    // use utils\DB;

    // $banco = DB::getInstance();

    // if(isset($_SESSION["email_login"])){

    //     $email_login = $_SESSION["email_login"];

    //     $pegar_tudo = $banco->select("*", "clientes", "WHERE", "email = '$email_login'");

    //     if($pegar_tudo && mysqli_num_rows($pegar_tudo)){

    //         $linha_login = mysqli_fetch_assoc($pegar_tudo);

    //         $email = $linha_login["email"];
    //         $nome = $linha_login["nome"];
    //         $cargo = $linha_login["cargo"];


    //     }
    // }

$pageTitle = "Loja";
$additionalLinks = [
    "../../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
    "../../assets/public/css/style.css"
];

$additionalScriptsFooter = [
    '../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js',
    "../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"
];
include "../parts/header.php";
?>
<?php include "../components/navbar.php"; ?>


<?php //if($cargo != "administrador"): ?>
<!-- 
<h1>Você não tem permissão para entrar aqui.</h1>

    <a href="../user/login.php">Voltar</a>
    <?php session_destroy(); ?> -->

<?php //else: ?>


    <div class="container text-center mt-5">
        <div class="row">

            <!-- Primeira Coluna: Imagem do Livro -->
            <div class="col">
                <img src="../../assets/public/images/livro.jpg" alt="Capa Livro" class="img-fluid w-100" style="height: auto; max-height: 100vh; object-fit: cover;">
            </div>

            <!-- Segunda Coluna: Dados do Livro -->
            <div class="col text-start">
                <h2>Título do Livro</h2>
                <p><strong>Autor:</strong> Nome do Autor</p>
                <p><strong>Editora:</strong> Nome da Editora</p>
                <p><strong>ISBN:</strong> 123-456-789</p>
                <p><strong>Sinopse:</strong> Esta é uma breve sinopse do livro, destacando os principais pontos e o que o torna interessante para os leitores.</p>
            </div>

            <!-- Terceira Coluna: Opções de Compra -->
            <div class="col text-start">
                <h3>Compre Agora</h3>
                <p><strong>Preço:</strong> R$ 49,90</p>
                <button type="button" class="btn btn-primary btn-lg">Comprar</button>
                <p class="mt-3">
                <div class="btn-group">
                    <select class="form-select mb-3" name="forma_pagamento" aria-label="Default select example">
                        <option selected>Forma de Pagamento</option>
                        <option value="1">Crédito</option>
                        <option value="2">Débito</option>
                        <option value="3">Pix</option>
                    </select>
                </div>
            </p>
            <a class="btn btn-secondary" href="tela_loja.php">voltar</a>
            </div>

        </div>
    </div>

    <?php include "../parts/footer.php"; ?>

<?php //endif; ?>