<?php

    namespace utils;
    
    class CNPJ extends CodigoValido{

        private $codigo;

        public function validarCNPJ($codigo){

            $cod = $this->verificarCodigo($codigo);
        
            if($cod == "CNPJ"){
                
                $primeiro_digito = null;
                $segundo_digito = null;
        
                $codigo = $this->codigo;
    
                echo "1° Código dentro do método: $codigo <br>";
    
        
                $mult1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
                $mult2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        
                $soma1 = 0;
                echo "Loop 1 <br>";
    
                for($i = 0; $i < 13; $i++){
    
                    $soma1 += intval($codigo[$i]) * $mult1[$i];
                    echo $codigo[$i];
    
                }
    
                echo "<br>";
    
                echo "2° Código dentro do método: $codigo <br>";
    
                $mod1 = 11 - ($soma1 % 11);
    
                echo "Módulo 1 = $mod1 <br>";
    
                if($mod1 < 2 || $mod1 >= 10){
    
                    $mod1 = 0;
                }
        
                $soma2 = 0;
    
                echo "Loop 2 <br>";
    
                for($i = 0; $i < 14; $i++){
    
                    $soma2 += intval($codigo[$i]) * $mult2[$i];
                    echo $codigo[$i];
                }
    
                echo "<br>";
    
                echo "3° Código dentro do método: $codigo <br>";
    
                $mod2 = 11 - ($soma2 % 11);
    
                echo "Módulo 2 = $mod2 <br>";
    
                if($mod2 < 2 || $mod2 >= 10){
    
                    $mod2 = 0;
                }
    
                for($i = 0; $i < 14; $i++){
    
                    echo "Posicao $i: " . $codigo[$i] . "<br>";
    
    
                }
    
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
    
                    return true;
    
                } else {
    
                    return false;
    
                }
    
            } elseif($cod == false) {
    
                return false;
            }
        }

    }