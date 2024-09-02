<?php

namespace utils;

class CodigoValido{

    private $codigo;

    private function verificarCodigo($codigo){

        // $this->codigo = preg_replace('/\D/', '', $codigo);

        $this->codigo = preg_replace('/[^0-9X]/i', '', $codigo);

        //echo "Código depois da formatação: $this->codigo <br>";

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

    public function validarCPF($codigo){

        $cod = $this->verificarCodigo($codigo);

        if($cod == "CPF"){

            $primeiro_digito = null;
            $segundo_digito = null;
            $soma1 = 0;

            $multiplicador = 10;

            $codigo = $this->codigo;

            for($i = 0; $i < 9; $i++){
        
                $soma1+= intval($codigo[$i]) * $multiplicador;

                $multiplicador--;
            }

            if(($soma1 % 11) < 2){//Acredito que o método do CPF só ficou maior por causa do cálculo dos valores menores do que 2.

                $calc = 0;

                $digito_inteiro = intval($codigo[9]);

                if($digito_inteiro == $calc){

                    $primeiro_digito = true;
                    //echo "\nPrimeiro digito bateu : $calc\n";
                }else{

                    // echo "Primeiro digito não bateu: $calc\n";
                }

            }else{

                $calc = 11 - ($soma1 % 11);

                $digito_inteiro = intval($codigo[9]);//Penúltimo digito 

                if($calc == $digito_inteiro){

                    // echo "\nPrimeiro digito bateu : $calc\n";
                    $primeiro_digito = true;
                    

                }else{

                    // echo "Primeiro digito não bateu: $calc\n";
                }
            }

            $soma2 = 0;
            $multiplicador = 11;

            //SEGUNDO LOOP

            for($i = 0; $i < 10; $i++){
        
                $soma2+= intval($codigo[$i]) * $multiplicador;

                $multiplicador--;
            }

            if(($soma2 % 11) < 2){

                $calc = 0;

                $digito_inteiro = intval($codigo[10]);

                if($calc == $digito_inteiro){

                    $segundo_digito = true;
                    // echo "\nSegundo digito bateu : $calc\n";

                }else{

                    // echo "Segundo digito não bateu: $calc\n";
                }

            }else{

                $calc = 11 - ($soma2 % 11);

                $digito_inteiro = intval($codigo[10]);//último digito

                if($calc == $digito_inteiro){

                    $segundo_digito = true;
                    // echo "\nSegundo digito bateu: $calc\n";

                }else{

                    // echo "Segundo digito não bateu: $calc\n";
                }
            }

            if($primeiro_digito == true && $segundo_digito == true){

                //echo "\nO CPF É VÁLIDO!\n";

                return $codigo;

            }else{

                // echo "\nO CPF É INVÁLIDO!\n";

                return false;
            }

        }elseif($cod == false){

            return false;

        }
    }

    public function validarCNPJ($codigo){

        $cod = $this->verificarCodigo($codigo);

        // echo "DENTRO DA FUNÇÃO, CHEGUEI AQUI";
        // echo "O QUE SAI DO 'COD': $cod";
    
        if($cod == "CNPJ"){

            // echo "DENTRO DO IF , CHEGUEI AQUI";

            $primeiro_digito = null;
            $segundo_digito = null;
    
            $codigo = $this->codigo;

            // echo "1° Código dentro do método: $codigo <br>";

            $mult1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            $mult2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    
            $soma1 = 0;
            // echo "Loop 1 <br>";

            for($i = 0; $i < 12; $i++){

                $soma1 += intval($codigo[$i]) * $mult1[$i];
                //echo $codigo[$i];

            }

            // echo "<br>";

            // echo "2° Código dentro do método: $codigo <br>";

            $mod1 = 11 - ($soma1 % 11);

            // echo "Módulo 1 = $mod1 <br>";

            if($mod1 < 2 || $mod1 >= 10){

                $mod1 = 0;
            }
    
            $soma2 = 0;

            // echo "Loop 2 <br>";

            for($i = 0; $i < 13; $i++){

                $soma2 += intval($codigo[$i]) * $mult2[$i];
                //echo $codigo[$i];
            }

            // echo "<br>";

            // echo "3° Código dentro do método: $codigo <br>";

            $mod2 = 11 - ($soma2 % 11);

            // echo "Módulo 2 = $mod2 <br>";

            if($mod2 < 2 || $mod2 >= 10){

                $mod2 = 0;
            }

            // for($i = 0; $i < 14; $i++){

            //     echo "Posicao $i: " . $codigo[$i] . "<br>";


            // }

            if($mod1 == intval($codigo[12])){

                $primeiro_digito = true;

            }else{

                $primeiro_digito = false;

            }
    
            if($mod2 == intval($codigo[13])){

                $segundo_digito = true;

            }else{

                $segundo_digito = false;

            }
    
            if($primeiro_digito == true && $segundo_digito == true){

                //echo "OS DOIS ÚLTIMOS DIGITOS BATERAM!!! <br><br>";
                return $codigo;

            } else {
                //echo "OS DOIS ÚLTIMOS DIGITOS NÃO BATERAM!!! <br><br>";

                return false;

            }

        } elseif($cod == false) {

            return false;
        }
    }

    public function validarISBN10($codigo){

        $cod = $this->verificarCodigo($codigo);

        if($cod == "ISBN-10"){

            $codigo = $this->codigo;
            
            $soma = 0;

            $mult = 10;

            for($i = 0; $i < 9; $i++){

                $soma += intval($codigo[$i]) * $mult;
                //echo "Soma = " . $soma . " ";
                $mult--;
            }

            echo "<br>";

            $mod = 11 - ($soma % 11);

            

            if($mod == intval($codigo[9])){

                //echo "O ÚLTIMO DIGITO NÃO BATEU\n";

                return true;

            }elseif($mod == 10 && $codigo[9] == "X"){

                return true;
            
            }else{

                //echo "O ÚLTIMO DIGITO BATÉU!\n";

                return $codigo;
            }


        }elseif($cod == false){

            return false;
        }
    }

    public function validarISBN13($codigo){

        $cod = $this->verificarCodigo($codigo);

        if($cod == "ISBN-13"){

            $codigo = $this->codigo;
                    
            $soma = 0;
            
            for($i = 0; $i < 12; $i++){
            
                if($i % 2 == 0){
            
                    $soma+= intval($codigo[$i]) * 1;
                    
                }else{
            
                    $soma += intval($codigo[$i]) * 3;
            
                }
            }
                    
            $mod = $soma % 10;
            
            $ultimo_digito = 10 - $mod;
                    
            if($ultimo_digito == intval($codigo[12])){
                // echo "O ÚLTIMO DIGITO BATEU!!!\n\n";

                return true;
            
            }else{
            
                // echo "O ÚLTIMO DIGITO NÃO BATEU!!!\n\n";

                return false;
            }
        }elseif($cod == false){

            return false;
        }
    }
}