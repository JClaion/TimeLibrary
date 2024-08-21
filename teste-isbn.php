<?php

$isbn = fgets(STDIN);

echo "\nISBN antes dos caracteres: $isbn\n";

$isbn = preg_replace('/\D/', '', $isbn);

echo "\nISBN depois dos caracteres: $isbn\n";

$soma = 0;

for($i = 0; $i < 12; $i++){

    if($i % 2 == 0){

        $soma+= intval($isbn[$i]) * 1;
        
    }else{

        $soma += intval($isbn[$i]) * 3;

    }
}

echo "\n\n====ISBN: $soma ====\n\n";

$mod = $soma % 10;

$ultimo_digito = 10 - $mod;

echo "ULTIMO DIGITO: $ultimo_digito\n\n";

if($ultimo_digito == intval($isbn[12]))
{
    echo "O ÚLTIMO DIGITO BATEU!!!\n\n";

}else{

    echo "O ÚLTIMO DIGITO NÃO BATEU!!!\n\n";
}


