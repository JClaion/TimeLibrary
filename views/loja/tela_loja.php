<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //require "../../utils/DB.php";

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

<!-- 
<?php //if($cargo != "administrador"): ?>

<h1>Você não tem permissão para entrar aqui.</h1>

    <a href="../user/login.php">Voltar</a>
    <?php session_destroy(); ?>

<?php //else: ?> -->

    <?php include "../components/navbar.php"; ?>
    <?php include "../../utils/gerarJanelaProduto.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <?php
                echo gerarJanelaProduto(1,"livro.jpg", "O começo após o fim", "TurtleMe", "TurtleMe", 2015, number_format(250, 2, ','));

                
                // echo gerarJanelaProduto(2,"../../assets/public/images/livro.jpg", "O Senhor dos Anéis: A Sociedade do Anel", "J.R.R. Tolkien", "George Allen & Unwin", 1954, number_format(479, 2, ','));
                // echo gerarJanelaProduto(3,"../../assets/public/images/livro.jpg", "1984", "George Orwell", "Secker & Warburg", 1949, number_format(328, 2, ','));
                // echo gerarJanelaProduto(4,"../../assets/public/images/livro.jpg", "Orgulho e Preconceito", "Jane Austen", "T. Egerton", 1813, number_format(279, 2, ','));
                // echo gerarJanelaProduto(5,"../../assets/public/images/livro.jpg", "Moby Dick", "Herman Melville", "Harper & Brothers", 1851, number_format(635, 2, ','));
                // echo gerarJanelaProduto(6,"../../assets/public/images/livro.jpg", "O Grande Gatsby", "F. Scott Fitzgerald", "Charles Scribner's Sons", 1925, number_format(218, 2, ','));
                // echo gerarJanelaProduto(7,"../../assets/public/images/livro.jpg", "Guerra e Paz", "Liev Tolstói", "The Russian Messenger", 1869, number_format(1225, 2, ','));
                // echo gerarJanelaProduto(8,"../../assets/public/images/livro.jpg", "Ulisses", "James Joyce", "Sylvia Beach", 1922, number_format(730, 2, ','));
                // echo gerarJanelaProduto(9,"../../assets/public/images/livro.jpg", "O Apanhador no Campo de Centeio", "J.D. Salinger", "Little, Brown and Company", 1951, number_format(277, 2, ','));
                // echo gerarJanelaProduto(10,"../../assets/public/images/livro.jpg", "Crime e Castigo", "Fiódor Dostoiévski", "The Russian Messenger", 1866, number_format(671, 2, ','));
                // echo gerarJanelaProduto(11,"../../assets/public/images/livro.jpg", "Don Quixote", "Miguel de Cervantes", "Francisco de Robles", 1605, number_format(863, 2, ','));
            ?>
            <!-- Adicione mais livros conforme necessário vamos!!!!  -->
        </div>
    </div>
    <?php include "../parts/footer.php"; ?>
<!-- <?php //endif; ?> -->