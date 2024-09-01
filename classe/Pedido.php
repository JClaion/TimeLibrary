<?php

namespace classe;

require_once "../utils/DB.php";
use utils\DB;

class Pedido{

    private $idPedido;
    private $cliente;
    private $data;
    private $livros;
    private $precoTotal;


    public function calcularValor(){

        echo "Valor calculado!";
    }

    public static function pegarTodos() {

        $banco = DB::getInstance();

        return $banco->select("*", "pedidos"); // MySQL object
    }

}

?>

