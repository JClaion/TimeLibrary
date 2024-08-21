<?php

$cnpj = fgets(STDIN);

echo "CNPJ antes da validação: $cnpj\n\n";

$cnpj = preg_replace('/\D/', '', $cnpj);

echo "CNPJ depois da validação: $cnpj\n\n";

//5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2

$mult1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
$mult2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

$soma = 0;

for($i = 0; $i < 12; $i++){

    $soma += intval($cnpj[$i]) * $mult1[$i];

}

echo "A soma 1 ficou: $soma\n\n";

$mod1 = 11 - ($soma % 11);

echo "O primeiro digito verificador é: $mod1\n\n";

$soma = 0;

for($i = 0; $i < 13; $i++){

    $soma += intval($cnpj[$i]) * $mult2[$i];

}

echo "A soma 2 ficou: $soma\n\n";

$mod2 = 11 - ($soma % 11);

echo "O segundo digito verificador é: $mod2\n\n";

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



