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

    public function getTudo() {
        return [
            'codLivro'   => $this->codLivro ?? 'Não disponível',
            'nome'       => $this->nome ?? 'Não disponível',
            'autor'      => $this->autor ?? 'Não disponível',
            'preco'      => $this->preco ?? 'Não disponível',
            'isbn'       => $this->isbn ?? 'Não disponível',
            'ano'        => $this->ano ?? 'Não disponível',
            'cod_editora'    => $this->cod_editora ?? 'Não disponível'
        ];
    }

    public static function mostrarLivros() {

        $livros = [];

        $banco = DB::getInstance();

        $obj = $banco->select("*", "livros"); // MySQL object

        if ($obj && mysqli_num_rows($obj) > 0) {
            while ($linha = mysqli_fetch_assoc($obj)) {
                $livro = new Livro(
                    $linha['cod_livro'] ?? null,
                    $linha['nome_livro'] ?? null,
                    $linha['Autor'] ?? null,
                    $linha['preco'] ?? null,
                    $linha['isbn'] ?? null,
                    $linha['ano'] ?? null,
                    $linha['cod_editora'] ?? null
                );

                $livros[] = $livro;
            }
        }

        return $livros;
    }
}
?>