<?php

namespace classe;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use classe\Livro;
use Exception;
use InvalidArgumentException;

class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $rua;
    public $numero;
    public $complemento;

    public function editarDados(){

        echo "Dados editados!";
    }

    public function excluirDados(){

        echo "Dados excluídos";
    }

    public function fazerPedido(array $livros){

        foreach ($livros as $livro) {   
            try{
                
                $this->throwExceptionTypeLivro($livro);

           }catch(Exception $e){

                echo "Deve ser passado apenas um objeto da classe Livro.";    
            
           }
        }
        
        echo "Pedido feito!";
        
    }

    public function ofertarLivro(){

        echo "Livro ofertado!";
    }

    public function throwExceptionTypeLivro($livro){
        if (!$livro instanceof Livro) {

            throw new InvalidArgumentException('Todos os itens devem ser instâncias da classe Livro.');

        }
    }
}
?>