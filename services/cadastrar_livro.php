<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../utils/DB.php";

    use utils\DB;

    $banco = DB::getInstance();

    $nome_livro = (isset($_POST["nome_livro"]) && !empty($_POST["nome_livro"])) ? $_POST["nome_livro"] : null;
    $autor = (isset($_POST["autor"]) && !empty($_POST["autor"])) ? $_POST["autor"] : null;
    $categoria = (isset($_POST["categoria"]) && !empty($_POST["categoria"])) ? $_POST["categoria"] : null;
    $preco = (isset($_POST["preco"]) && !empty($_POST["preco"])) ? $_POST["preco"] : null;
    $ISBN = (isset($_POST["ISBN"]) && !empty($_POST["ISBN"])) ? $_POST["ISBN"] : null;
    $ano = (isset($_POST["ano"]) && !empty($_POST["ano"])) ? $_POST["ano"] : null;
    $editora = (isset($_POST["editora"]) && !empty($_POST["editora"])) ? $_POST["editora"] : null;
    $imagem = (isset($_FILES['image']) && !empty($_FILES['image'])) ? $_FILES['image'] : null;
    $sinopse = (isset($_POST["sinopse"]) && !empty($_POST["sinopse"])) ? $_POST["sinopse"] : null;


    if($nome_livro != null && $autor != null && $categoria != null && $preco != null && $ISBN != null && $ano != null && $editora != null){

        echo $nome_livro . "<br>";
        echo $autor . "<br>";
        echo $categoria . "<br>";
        echo $preco . "<br>";
        echo $ISBN . "<br>";
        echo $ano . "<br>";
        echo $editora . "<br>";
        echo $imagem . "<br>";
        echo $sinopse . "<br>";

    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif']; // Extensões permitidas
        $file_name = $_FILES['image']['name']; //Nome do Arquivo
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size']; //Tamanho do Arquivo

        // Obtém a extensão do arquivo
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Verifica se a extensão é permitida
        if (in_array($file_ext, $allowed)) {
            // Verifica o tamanho do arquivo (opcional)
            if ($file_size <= 2097152) { // Limite de 2MB
                $upload_dir = '../assets/public/images/';
                
                // Verifica se a pasta de destino existe, se não, cria
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                // Define o caminho do arquivo para salvar
                $file_path = $upload_dir . uniqid() . '.' . $file_ext;

                // Move o arquivo da pasta temporária para a pasta de destino
                if (move_uploaded_file($file_tmp, $file_path)) {
                    echo "Imagem enviada com sucesso! Caminho: " . $file_path;
                } else {
                    echo "Erro ao mover o arquivo.";
                }
            } else {
                echo "Erro: O arquivo é muito grande. Tamanho máximo permitido é de 2MB.";
            }
        } else {
            echo "Erro: Extensão de arquivo não permitida.";
        }
    } else {
        echo "Erro ao enviar o arquivo.";
    }






