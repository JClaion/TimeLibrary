<?php

$n = fgets(STDIN);

$n = preg_replace('/\D/', '', $n);

echo $n;


if(strlen($n) !== 11){

    echo "CPF inválido!";

}else{

    $primeiro_digito = null;
    $segundo_digito = null;
    $soma1 = 0;

    $multiplicador = 10;

        //PRIMEIRO LOOP

        for($i = 0; $i < 9; $i++){
    
            $soma1+= intval($n[$i]) * $multiplicador;

            echo "\n--" . $soma1 . "--\n";

            $multiplicador--;
        }

        if(($soma1 % 11) < 2){

            $calc = $soma1 % 11;

            $digito_inteiro = intval($n[9]);

            if($calc == $digito_inteiro){

                $primeiro_digito = true;
                echo "\nPrimeiro digito bateu : $calc\n";
            }else{

                echo "Primeiro digito não bateu: $calc\n";
            }

        }else{

            $calc = 11 - ($soma1 % 11);

            $digito_inteiro = intval($n[9]);        

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
    
            $soma2+= intval($n[$i]) * $multiplicador;

            $multiplicador--;
        }

        if(($soma2 % 11) < 2){

            $calc = $soma2 % 11;

            $digito_inteiro = intval($n[10]);

            if($calc == $digito_inteiro){

                $segundo_digito = true;
                echo "\nSegundo digito bateu : $calc\n";

            }else{

                echo "Segundo digito não bateu: $calc\n";
            }

        }else{

            $calc = 11 - ($soma2 % 11);

            $digito_inteiro = intval($n[10]);

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

