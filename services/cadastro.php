<h1>TESTE</h1>

<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../utils/DB.php";
    require_once "../utils/CodigoValido.php";
    use utils\CodigoValido;
    use utils\DB;

    $cod = new CodigoValido;

    $banco = DB::getInstance();

    $nome = (isset($_POST["nome"]) && !empty($_POST["nome"])) ? $_POST["nome"] : null;

    $email = (isset($_POST["email"]) && !empty($_POST["email"])) ? $_POST["email"] : null;

    $senha = (isset($_POST["senha"]) && !empty($_POST["senha"])) ? $_POST["senha"] : null;

    // $cpf_cnpj = (isset($_POST["cpf_cnpj"]) && !empty($_POST["cpf_cnpj"])) ? $_POST["cpf_cnpj"] : null;

    $cep = (isset($_POST["cep"]) && !empty($_POST["cep"])) ? $_POST["cep"] : null;

    $complemento = (isset($_POST["complemento"]) && !empty($_POST["complemento"])) ? $_POST["complemento"] : null;

    $estado = (isset($_POST["estado"]) && !empty($_POST["estado"])) ? $_POST["estado"] : null;

    $cidade = (isset($_POST["cidade"]) && !empty($_POST["cidade"])) ? $_POST["cidade"] : null;

    $bairro = (isset($_POST["bairro"]) && !empty($_POST["bairro"]))  ? $_POST["bairro"] : null;

    $rua = (isset($_POST["rua"]) && !empty($_POST["rua"])) ? $_POST["rua"] : null;

    $numero = (isset($_POST["numero"]) && !empty($_POST["numero"])) ? $_POST["numero"] : null;

    $pessoa = (isset($_POST["pessoa"]) && !empty($_POST["pessoa"])) ? $_POST["pessoa"] : null;

    





    // echo "O valor escolhido é: $pessoa";

    //var_dump($nome, $email, $senha, $cpf_cnpj, $cep, $complemento, $estado, $cidade, $bairro, $rua);

    if($nome != null && $email != null && $senha != null && $cpf_cnpj != null && $complemento && $cep != null && $estado != null && $cidade != null && $bairro != null && $rua != null){

        echo "CHEGUEI!!!";

        $codigo_teste = null;

        if(isset($_POST["cpf"]) && !empty($_POST["cpf"]) && isset($_POST["rg"]) && !empty($_POST["rg"])){

            $cpf = $_POST["cpf"];
    
            $codigo_teste = $cod->validarCPF($cpf);
    
            $rg = $_POST["rg"];
    
        }elseif(isset($_POST["cnpj"]) && !empty($_POST["cnpj"]) && isset($_POST["ie"]) && !empty($_POST["ie"])){
    
            $cnpj = $_POST["cnpj"];

            $codigo_teste = $cod->validarCNPJ($cnpj);

            $inscricao_estadual = $_POST["ie"];
    
        }

        if($codigo_teste == null || $codigo_teste == false){

            echo "O CPF/CNPJ está inválido!";

        }else{

            echo "INSERINDO!!!";
        
            $cadastrar_dados = $banco->insert("clientes", "'$nome', '$email', '$senha', '$rua', $numero, '$complemento', '$cep', '$cidade', '$estado'", "nome, email, senha, rua, numero, complemento, cep, cidade, estado");

            $consulta_id_cliente = $banco->select("id", "clientes", "WHERE", "nome = '$nome'");

            echo "ID do cliente consultado do cliente: $nome <br>";

            if($cadastrar_dados == true){

                echo "Inserção concluida!<br>";

            }else{

                echo "FALHA!";
            }

        }

    }

?>

