<?php

namespace utils;

class CodigoValido{

    private $codigo;

    protected function verificarCodigo($codigo){

        // $this->codigo = preg_replace('/\D/', '', $codigo);

        $this->codigo = preg_replace('/[^0-9X]/i', '', $codigo);

        echo "Código depois da formatação: $this->codigo <br>";

        if(strlen($this->codigo) == 11){

            return "CPF";
            
        }else if(strlen($this->codigo) == 14){

            return "CNPJ";

        }elseif(strlen($this->codigo) == 10){

            return "ISBN-10";

        }elseif(strlen($this->codigo) == 13){

            return "ISBN-13";

        }else{

            return false;

        }
    } 
}