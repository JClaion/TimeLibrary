<?php
$pageTitle = "Pagina de Teste";
$additionalLinks = [
    "../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
    "https://fonts.googleapis.com",
    "https://fonts.gstatic.com",
    "https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
];
//"../../assets/public/css/style.css"
$additionalScriptsFooter = [
    '../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js',
    "../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"
];
include "../views/parts/header.php";
?>

<?php include "../views/components/navbar.php"; ?>


<?php include "../views/parts/footer.php"; ?>