<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../classe/Livro.php";

use classe\Livro;

$livros = Livro::mostrarLivros();

foreach ($livros as $livro) {
    $dados = $livro->getTudo();
    foreach ($dados as $chave => $valor) {
        echo ucfirst($chave) . ": " . htmlspecialchars($valor) . "<br>";
    }
    echo "<hr>";
}
?>