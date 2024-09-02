<?php

namespace classe;

require_once "../utils/DB.php";
use utils\DB;

class Editora{

    private $codEditora;
    private $nome;
    private $contato;
    private $email;

    public static function pegarTodos() {

        $banco = DB::getInstance();

        return $banco->select("*", "editoras"); // MySQL object
    }
}