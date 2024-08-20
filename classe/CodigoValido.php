<?php

namespace classe;

class CodigoValido{

    //private $codigo;

    public function verificarCodigo($codigo){

        return preg_replace('/\D/', '', $codigo);

        if(strlen($codigo_limpo) == 11){

            echo "Este código é um CPF <br>";

            return $codigo_limpo;

        }else if(strlen($codigo_limpo) == 14){

            echo "Este código é um CNPJ <br>";

            return $codigo_limpo;

        }elseif(strlen($codigo_limpo) == 13){

            echo "Este código é um ISBN-13";

        
        }else{

            echo "Código inválido! <br>";

            return 0;

        }
    } 

    public function validarCPF($codigo){

        


    }
}