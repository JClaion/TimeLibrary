<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "../../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    if(isset($_SESSION["email_login"])){

        $email_login = $_SESSION["email_login"];

        $pegar_tudo = $banco->select("*", "clientes", "WHERE", "email = '$email_login'");

        if($pegar_tudo && mysqli_num_rows($pegar_tudo)){

            $linha_login = mysqli_fetch_assoc($pegar_tudo);

            $email = $linha_login["email"];
            $nome = $linha_login["nome"];
            $cargo = $linha_login["cargo"];


        }
    }

// if usuario não eh admin ruturn erro http {} -> errro de permissão negada
$pageTitle = "Cadastrar Categoria";
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

<?php if($cargo != "administrador"):?>

    <h1>Você não tem permissão para entrar aqui.</h1>

    <a href="../user/login.php">Voltar</a>
    <?php session_destroy(); ?>

<?php else: ?>
    <?php include "../components/navbar.php"; ?>
        <div class="d-flex">
            <?php include "../components/sidebar.php"; ?>
            <div class="container">
                <div class="livro-form d-flex justify-content-center">
                    <form action="../../services/cadastrar_categoria.php" method="post">
                        <h1 class="mt-3 mb-3">Cadastrar categoria</h1>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Categoria</span>
                            <input type="text" class="form-control" name="categoria" placeholder="Ex: Terror">
                        </div>
                        <div class="d-flex buttons">
                            <button class="btn btn-primary me-2" type="submit">Cadastrar</button>
                            <a href="../loja/index.php" class="btn btn-secondary">Voltar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php include "../../views/parts/footer.php"; ?>
<?php endif; ?>