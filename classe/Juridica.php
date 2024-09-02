<?php

namespace classe;


require_once "../utils/DB.php";
use utils\DB;

    class Juridica extends Usuario{

        private $cnpj;
        private $inscricao_estadual;
     
        public static function pegarTodos() {

            $banco = DB::getInstance();
            
            return $banco->select("*", "juridica"); // MySQL object
        }
    }
?>