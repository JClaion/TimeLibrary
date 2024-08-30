<?php

namespace utils;

    class ISBN10 extends CodigoValido{

        private $codigo;

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
    
                    return false;
                }
    
    
            }elseif($cod == false){
    
                return false;
            }
        }
    }