<?php
    
    function gerarJanelaProduto($name, $price) {
        return "
        <div class='product-card'>
            <h2 class='product-name'>{$name}</h2>
            <p class='product-price'>\${$price}</p>
        </div>
        ";
    }
 
?>