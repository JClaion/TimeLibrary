<?php

namespace classe;

require_once "../utils/DB.php";
use utils\DB;

class Livro {

    private $codLivro;
    private $nome;
    private $autor;
    private $preco;
    private $isbn;
    private $ano;
    private $cod_editora; // Referência ao código da cod_editora, se necessário

    public function __construct($codLivro = null, $nome = null, $autor = null, $preco = null, $isbn = null, $ano = null, $cod_editora = null) {
        $this->codLivro = $codLivro;
        $this->nome = $nome;
        $this->autor = $autor;
        $this->preco = $preco;
        $this->isbn = $isbn;
        $this->ano = $ano;
        $this->cod_editora = $cod_editora;
    }

    public static function mostrarLivros() {

        $livros = [];

        $banco = DB::getInstance();

        return $banco->select("*", "livros"); // MySQL object
    }
}
?>