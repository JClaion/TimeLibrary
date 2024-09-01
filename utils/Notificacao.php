<?php

    namespace utils;

?>

<style>
        /* Define a animação de entrada */
        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Define a animação de saída */
        @keyframes slideOut {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-100%);
                opacity: 0;
            }
        }

        /* Aplica a animação ao elemento */
        .alert-success {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 10%; /* Ajuste a largura conforme necessário */
            padding: 20px; /* Adiciona espaço interno */
            background-color: lightgreen;
            color: black; /* Cor do texto */
            border: 2px solid black;
            border-radius: 8px; /* Borda arredondada */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center; /* Centraliza o texto */
            z-index: 1000;
            animation: slideIn 1s ease-out, slideOut 1s ease-out 5s; /* Animação de entrada e saída */
        }
    </style>

<?php


$additionalLinks = [
    "../assets/public/bootstrap-5.3.3-dist/css/bootstrap.css",
    "https://fonts.googleapis.com",
    "https://fonts.gstatic.com",
    "https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
];


$additionalScriptsFooter = [
    
    '../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js',
    "../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"
];

include "../views/parts/header.php";

class Notificacao{

    public function mostrarErro($mensagem){
        return "
            <div class = 'alert-success'>
                $mensagem
            </div>
        ";
    }    

    public function mostrarSucesso($mensagem){
        
        return "
            <div style='position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 200px; height: 100px; background-color: lightgreen; display: flex; align-items: center; justify-content: center; border: 2px solid black; z-index: 1000;'>
                $mensagem
            </div>
        ";
    }
}

?>

<?php include "../views/parts/footer.php"; ?>