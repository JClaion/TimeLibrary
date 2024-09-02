<?php

namespace classe;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../utils/DB.php";
use utils\DB;

class Fisica extends Usuario{

    private $cpf;
    private $rg;

    public function associarDados($id_cliente, $cpf, $rg){

        $banco = DB::getInstance();
        $inserir_dados = $banco->insert("fisica", "$id_cliente, $cpf, $rg", "id_cliente, cpf, rg");


    }
    public static function pegarTodos() {

        $banco = DB::getInstance();

        return $banco->select("*", "fisica"); // MySQL object
    }
}