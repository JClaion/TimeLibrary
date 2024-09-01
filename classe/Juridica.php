<?php
namespace classe;

    class Juridica extends Usuario{

        private $cnpj;
        private $inscricao_estadual;
     
        public static function pegarTodos() {

            $banco = DB::getInstance();
    
            return $banco->select("*", "juridica"); // MySQL object
        }
    }
?>