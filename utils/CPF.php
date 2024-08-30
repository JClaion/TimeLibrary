<?php

namespace utils;

use utils\CodigoValido;

class CPF extends CodigoValido{
    
        private $codigo;

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
        
                    // echo "\nO CPF É VÁLIDO!\n";
        
                    return true;
        
                }else{
        
                    // echo "\nO CPF É INVÁLIDO!\n";
        
                    return false;
                }
        
            }elseif($cod == false){
        
                return false;
        
            }
        }
    }

