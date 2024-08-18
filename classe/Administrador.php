<?php

namespace classe;

use classe\Usuario;

class administrador extends Usuario{


    public function cadastrarLivro(){

        echo "Livro cadastrado!";
    }

    public function aceitarLivro(){

        echo "Livro aceitado!";
    }

    public function editarUsuario(){

        echo "Usuário editado!";
    }

    public function editarLivro(){

        echo "Livro editado!";
    }

    public function excluirUsuario(){

        echo "Usuário excluído!";
    }

    public function excluirLivro(){

        echo "Livro excluído!";
    }
}


