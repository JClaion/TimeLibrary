<?php

namespace utils;

    class ISBN13 extends CodigoValido{

        private $codigo;

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