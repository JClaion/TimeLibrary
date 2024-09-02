<?php

function gerarJanelaProduto($idProduto, $nomeDaImagem, $nomeLivro, $autor, $editora, $ano, $preco)
{
    return "
        <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4'>
            <div class='card h-100'>
                <!-- Envolva o cartão em um link -->
                <a href='comprar_produto.php?id=$idProduto' class='stretched-link text-decoration-none'>
                    <img src='../assets/public/images/$nomeDaImagem' height='300rem' class='card-img-top' alt='alternativa'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nomeLivro</h5>
                        <p class='card-text'><strong>$autor</strong></p>
                        <p class='card-text'>$editora</p>
                        <p class='card-text'>$ano</p>
                        <p class='card-text text-primary'><strong>A partir de R$ $preco</strong></p>
                    </div>
                </a>
            </div>
        </div>
        ";
}
