<?php

namespace classe;


class DB{

private $banco_servidor = "localhost";
private $banco_usuario = "jvbc";
private $banco_senha = "4426655xara";
private $banco_nome = "TL";


public $conexao;
private static $instancia;

private function __construct(){

    $this->conexao = mysqli_connect($this->banco_servidor, $this->banco_usuario, $this->banco_senha, $this->banco_nome);
    if (!$this->conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }else{

        //echo "Conexão bem-sucedida!";
    }
}

public static function getInstance(){
    if(self::$instancia == NULL){
        self::$instancia = new self;
    }
    return self::$instancia;
}

public function select($coluna, $tabela, $tipoCondicao = null, $condicao = null, ...$parametros) {
    if ($tipoCondicao && $condicao) {

        $sql = "SELECT $coluna FROM $tabela $tipoCondicao $condicao";    
        $stmt = mysqli_prepare($this->conexao, $sql);

        if ($stmt) {
            if (!empty($parametros)) {
                $tipos = str_repeat('s', count($parametros)); 
                mysqli_stmt_bind_param($stmt, $tipos, ...$parametros);

            }
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        } else {
            echo "Busca não funcionou: " . mysqli_error($this->conexao);
            return false;

        }
    } else {

        $sql = "SELECT $coluna FROM $tabela;";
        return mysqli_query($this->conexao, $sql) ?: false;
    }
}

public function insert($tabela, $valores, $colunas = null){

    if($colunas){

        $sql = "INSERT INTO $tabela ($colunas) VALUES ($valores)";
    } else {
        $sql = "INSERT INTO $tabela VALUES ($valores)";
    }

    $stmt = mysqli_prepare($this->conexao, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($this->conexao);
        return false;
    }
}

public function update($tabela, $sets, $tipoCondicao, $condicao, ...$parametros) {
    $sql = "UPDATE $tabela SET $sets $tipoCondicao $condicao";
    $tipos = ""; 
    foreach ($parametros as $parametro) {
        if (is_int($parametro)) {
            $tipos .= "i"; 
        } elseif (is_double($parametro)) {
            $tipos .= "d";
        } elseif (is_string($parametro)) {
            $tipos .= "s"; 
        } else {
            $tipos .= "b";
        }
    }
    
    $stmt = mysqli_prepare($this->conexao, $sql);
    if ($stmt) {
        if (!empty($parametros)) {
            mysqli_stmt_bind_param($stmt, $tipos, ...$parametros);
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        echo "Erro ao atualizar dados: " . mysqli_error($this->conexao);
        return false;
    }
}

public function delete($tabela, $tipoCondicao, $condicao, ...$parametros) {
    $sql = "DELETE FROM $tabela $tipoCondicao $condicao";
    $stmt = mysqli_prepare($this->conexao, $sql);
    if ($stmt) {
        if (!empty($parametros)) {
            $tipos = ""; 
            foreach ($parametros as $parametro) {
                if (is_int($parametro)) {
                    $tipos .= "i"; 
                } elseif (is_double($parametro)) {
                    $tipos .= "d"; 
                } elseif (is_string($parametro)) {
                    $tipos .= "s"; 
                } else {
                    $tipos .= "b"; 
                }
            }
            mysqli_stmt_bind_param($stmt, $tipos, ...$parametros);
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        echo "Erro ao excluir dados: " . mysqli_error($this->conexao);
        return false;
    }
}
}

