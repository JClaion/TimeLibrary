<?php
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


<div class="container mt-5">
    <div class="row">
        <!-- Livro 1 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                <img src="../../assets/public/images/livro.jpg" height="300rem" class="card-img-top" alt="Barba ensopada de sangue">
                <div class="card-body">
                    <h5 class="card-title">Barba ensopada de sangue</h5>
                    <p class="card-text"><strong>Daniel Galera</strong></p>
                    <p class="card-text">Cia das Letras</p>
                    <p class="card-text">2012</p>
                    <p class="card-text text-primary"><strong>A partir de R$ 14,00</strong></p>
                </div>
            </div>
        </div>
        <!-- Livro 2 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                <img src="../../assets/public/images/logo2.jpeg" height="300rem" class="card-img-top" alt="Título do Livro 2">
                <div class="card-body">
                    <h5 class="card-title">Título do Livro 2</h5>
                    <p class="card-text"><strong>Autor do Livro 2</strong></p>
                    <p class="card-text">Editora do Livro 2</p>
                    <p class="card-text">Ano do Livro 2</p>
                    <p class="card-text text-primary"><strong>A partir de R$ XX,XX</strong></p>
                </div>
            </div>
        </div>
        <!-- Adicione mais livros conforme necessário -->
    </div>
</div>



<?php include "../parts/footer.php"; ?>