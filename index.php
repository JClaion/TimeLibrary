<?php

require_once "classe/CodigoValido.php";

use classe\CodigoValido;

$cod = new CodigoValido();

// $verificar_codigo = $cod->validarCPF("018.095.802-00");

// if($verificar_codigo == false){

//     echo "Código inválido!";

// }else{

//     echo "Código válido!!";

// }

// $verificar_codigo = $cod->validarCNPJ("60.537.263/0001-66");

// if($verificar_codigo == false){

//     echo "Código inválido!";

// }else{

//     echo "Código válido!!";

// }

// $verificar_codigo = $cod->validarISBN10("0-85131-041-9");

// if($verificar_codigo == false){

//     echo "Código inválido!";

// }else{

//     echo "Código válido!!";

// }

$verificar_codigo = $cod->validarISBN13("ISBN 978 – 85 – 333 – 0227 – 3");

if($verificar_codigo == false){

    echo "Código inválido!";

}else{

    echo "Código válido!!";

}
