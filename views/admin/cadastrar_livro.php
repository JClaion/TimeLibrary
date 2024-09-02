<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../../utils/DB.php";

use utils\DB;

$banco = DB::getInstance();

if (isset($_SESSION["email_login"])) {

    $email_login = $_SESSION["email_login"];

    $pegar_tudo = $banco->select("*", "clientes", "WHERE", "email = '$email_login'");

    if ($pegar_tudo && mysqli_num_rows($pegar_tudo)) {

        $linha_login = mysqli_fetch_assoc($pegar_tudo);

        $email = $linha_login["email"];
        $nome = $linha_login["nome"];
        $cargo = $linha_login["cargo"];
    }
}

$pageTitle = "Cadastrar Livro";
$additionalLinks = [
    "../../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
    "../../assets/public/css/style.css",
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
?>

<?php if ($cargo != "administrador"): ?>

    <h1>Você não tem permissão para entrar aqui.</h1>

    <a href="../user/login.php">Voltar</a>
    <?php session_destroy(); ?>

<?php else: ?>

    <?php include "../components/navbar.php"; ?>

    <div class="d-flex">
        <?php include "../components/sidebar.php"; ?>
        <div class="container">
            <div class="livro-form d-flex justify-content-center">
                <form action="../../services/cadastrar_livro.php" method="post" enctype="multipart/form-data">
                    <h1 class="mt-3 mb-3">Cadastrar Livro</h1>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nome Livro</span>
                        <input type="text" class="form-control" name="nome_livro" placeholder="Ex: Poder do Hábito">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Autor</span>
                        <input type="text" class="form-control" name="autor" placeholder="Ex: Charles Duhigg">
                    </div>


                    <!-- Automatizar com o php -->
                    <select name="categoria" class="form-select mb-3" aria-label="Default select example">
                        <option selected>Categoria</option>
                        <option value="1">Terror</option>
                        <option value="2">Romance</option>
                        <option value="3">Ação</option>
                    </select>

                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" class="form-control" aria-label="Quantidade em Reais (com um ou dois decimais)" name="preco">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">ISBN</span>
                        <input type="text" class="form-control" name="ISBN" placeholder="Ex: 9788539004119">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Ano</span>
                        <input type="number" class="form-control" min="0" max="9999" step="1" name="ano" placeholder="Ex: 2012">
                    </div>

                    <!-- Automatizar com o php -->
                    <select class="form-select mb-3" name="editora" aria-label="Default select example">
                        <option selected>Editora</option>
                        <option value="1">Editora1</option>
                        <option value="2">Editora2</option>
                        <option value="3">Editora3</option>
                    </select>

                    <!-- form imagem aqui -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Capa Livro</label>
                        <input type="file" class="form-control" name="imagem" id="inputGroupFile01">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text">Sinopse</span>
                        <input type="text" class="form-control" name="sinopse" placeholder="Ex: ....">
                    </div>

                    <div class="d-flex buttons">
                        <a href="../loja/index.php" class="btn btn-secondary me-2">Voltar</a>
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php include "../../views/parts/footer.php"; ?>

<?php endif; ?>

