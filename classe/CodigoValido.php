<?php

namespace classe;

class CodigoValido{

    private $codigo;

    public function verificarCodigo($codigo){

        $this->codigo = preg_replace('/\D/', '', $codigo);

        if(strlen($this->codigo) == 11){

            echo "Este código é um CPF <br>";

            return $$this->codigo;

        }else if(strlen($this->codigo) == 14){

            echo "Este código é um CNPJ <br>";

            return $this->codigo;

        }elseif(strlen($this->codigo) == 10){

            echo "Este código é um ISBN-10";

        }elseif(strlen($this->codigo) == 13){

            echo "Este código é um ISBN-13";    

            return $this->codigo;

        }else{

            echo "Código inválido! <br>";

            return false;

        }
    } 

    public function validarCPF($codigo){
    
    $primeiro_digito = null;
    $segundo_digito = null;
    $soma1 = 0;

    $multiplicador = 10;

        $cpf = $this->codigo;

        for($i = 0; $i < 9; $i++){
    
            $soma1+= intval($cpf[$i]) * $multiplicador;

            //echo "\n--" . $soma1 . "--\n";

            $multiplicador--;
        }

        if(($soma1 % 11) < 2){

            $calc = $soma1 % 11;

            $digito_inteiro = intval($cpf[9]);//Pegar o índice

            if($calc == $digito_inteiro){

                $primeiro_digito = true;
                echo "\nPrimeiro digito bateu : $calc\n";
            }else{

                echo "Primeiro digito não bateu: $calc\n";
            }

        }else{

            $calc = 11 - ($soma1 % 11);

            $digito_inteiro = intval($cpf[9]);        

            if($calc == $digito_inteiro){

                $primeiro_digito = true;
                echo "\nPrimeiro digito bateu : $calc\n";

            }else{

                echo "Primeiro digito não bateu: $calc\n";
            }
        }

        $soma2 = 0;
        $multiplicador = 11;

        //SEGUNDO LOOP

        for($i = 0; $i < 10; $i++){
    
            $soma2+= intval($cpf[$i]) * $multiplicador;

            $multiplicador--;
        }

        if(($soma2 % 11) < 2){

            $calc = $soma2 % 11;

            $digito_inteiro = intval($cpf[10]);

            if($calc == $digito_inteiro){

                $segundo_digito = true;
                echo "\nSegundo digito bateu : $calc\n";

            }else{

                echo "Segundo digito não bateu: $calc\n";
            }

        }else{

            $calc = 11 - ($soma2 % 11);

            $digito_inteiro = intval($cpf[10]);

            if($calc == $digito_inteiro){

                $segundo_digito = true;
                echo "\nSegundo digito bateu: $calc\n";

            }else{

                echo "Segundo digito não bateu: $calc\n";
            }
        }

        if($primeiro_digito == true && $segundo_digito == true){

            echo "\nO CPF É VÁLIDO!\n";

        }
    }

    public function validarCNPJ($codigo){

        $cnpj = $this->codigo;

        $mult1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $mult2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        $soma = 0;

        for($i = 0; $i < 12; $i++){

            $soma += intval($cnpj[$i]) * $mult1[$i];

        }

        // echo "A soma 1 ficou: $soma\n\n";

        $mod1 = 11 - ($soma % 11);

        // echo "O primeiro digito verificador é: $mod1\n\n";

        $soma = 0;

        for($i = 0; $i < 13; $i++){

            $soma += intval($cnpj[$i]) * $mult2[$i];

        }

        // echo "A soma 2 ficou: $soma\n\n";

        $mod2 = 11 - ($soma % 11);

        // echo "O segundo digito verificador é: $mod2\n\n";

        if($mod1 == $cnpj[12]){

            echo "O PRIMEIRO NÚMERO VERIFICADOR É VÁLIDO!\n";

        }else{

            echo "O PRIMEIRO NÚMERO VERIFICADOR É INVÁLIDO!\n";

        }

        if($mod2 == $cnpj[13]){

            echo "O SEGUNDO NÚMERO VERIFICADOR É VÁLIDO!\n";

        }else{

            echo "O SEGUNDO NÚMERO VERIFICADOR É INVÁLIDO!\n";

        }
    }

    public function validarISBN10($codigo){

        $isbn10 = $this->codigo;

        $soma = 0;

        $mult = 10;

        for($i = 0; $i < 9; $i++){

            $soma += intval($isbn10[$i]) * $mult;

            $mult--;
        }

        $mod = 11 - ($soma % 11);

        if($mod != intval($isbn10[9])){

            echo "O ÚLTIMO DIGITO NÃO BATEU\n";
        }else{

            echo "O ÚLTIMO DIGITO BATÉU!\n";
        }
    }

    public function validarISBN13($codigo){

        $isbn13 = $this->codigo;

        // echo "\nisbn13 antes dos caracteres: $isbn13\n";

        $isbn13 = preg_replace('/\D/', '', $isbn13);
        
        // echo "\nisbn13 depois dos caracteres: $isbn13\n";
        
        $soma = 0;
        
        for($i = 0; $i < 12; $i++){
        
            if($i % 2 == 0){
        
                $soma+= intval($isbn13[$i]) * 1;
                
            }else{
        
                $soma += intval($isbn13[$i]) * 3;
        
            }
        }
        
        // echo "\n\n====isbn13: $soma ====\n\n";
        
        $mod = $soma % 10;
        
        $ultimo_digito = 10 - $mod;
        
        // echo "ULTIMO DIGITO: $ultimo_digito\n\n";
        
        if($ultimo_digito == intval($isbn13[12]))
        {
            echo "O ÚLTIMO DIGITO BATEU!!!\n\n";
        
        }else{
        
            echo "O ÚLTIMO DIGITO NÃO BATEU!!!\n\n";
        }
    }
}