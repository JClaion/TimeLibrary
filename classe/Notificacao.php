<?php

namespace classe;

class Notificao{

    public function mostrarErro($mensagem){
        return "<span class='alert-message'>$mensagem</span>";
    }    

    public function mostrarSucesso($mensagem){
        return "<span class='success-message error'>$mensagem</span>";
    }
}

//position: fixed

?>

<!-- .css

.error{
    position:fixed;
}
-->