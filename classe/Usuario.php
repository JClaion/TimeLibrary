<?php

namespace classe;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use classe\Livro;
use Exception;
use InvalidArgumentException;

class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $cep;
    private $estado;
    private $bairro;
    private $rua;
    private $numero;
    private $complemento;

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

    private function throwExceptionTypeLivro($livro){
        if (!$livro instanceof Livro) {

            throw new InvalidArgumentException('Todos os itens devem ser instâncias da classe Livro.');

        }
    }
}
?>