<h1>TESTE</h1>

<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../utils/DB.php";
    require_once "../utils/CodigoValido.php";
    require_once "../utils/Email.php";
    use utils\CodigoValido;
    use utils\DB;
    use utils\Email;

    $mailer = new Email();

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

    $tipo_pessoa = (isset($_POST["tipo_pessoa"]) && !empty($_POST["tipo_pessoa"])) ? $_POST["tipo_pessoa"] : null;

    //echo "=====O valor escolhido é: $tipo_pessoa=====<br>";

    // var_dump($nome, $email, $senha, $cep, $complemento, $estado, $cidade, $bairro, $rua);

    if($nome != null && $email != null && $senha != null && $complemento && $cep != null && $estado != null && $cidade != null && $bairro != null && $rua != null){

        // echo "CHEGUEI!!!";

        $codigo_cpf = null;
        $codigo_cnpj = null;

        if(isset($_POST["cpf"]) && !empty($_POST["cpf"]) && isset($_POST["rg"]) && !empty($_POST["rg"])){

            $cpf = $_POST["cpf"];
    
            $codigo_cpf = $cod->validarCPF($cpf);

            //echo "CPF = $codigo_cpf";
    
            $rg = $_POST["rg"];

            //echo "INSERINDO FISICO!!!";
        
            $conta_estado = 0;
        
            $cadastrar_dados = $banco->insert("clientes", "'$nome', '$email', '$senha', '$rua', $numero, '$complemento', '$cep', '$cidade', '$estado', $conta_estado", "nome, email, senha, rua, numero, complemento, cep, cidade, estado, conta_estado");

            $consulta_id_cliente = $banco->select("id", "clientes", "WHERE", "nome = '$nome'");

            if($consulta_id_cliente && mysqli_num_rows($consulta_id_cliente) > 0){

                $linha_fisica = mysqli_fetch_assoc($consulta_id_cliente);

                $id_fisica = $linha_fisica["id"];

                //echo "===ID consultado do cliente físico $nome: $id_fisica === <br>";

                $inserir_fisico = $banco->insert("fisica", "$id_fisica, '$codigo_cpf', '$rg'", "id_cliente, cpf, rg");

                if($inserir_fisico == true){

                    //echo "ID, CPF e RG INSERIDOSSS!!!";

                    $tok = uniqid();

                    $assunto = "
                        Criação de conta.
                    ";
                    $conteudo = "                        
                        Olá, este e-mail serve tanto para confirmar que o seu e-mail existe quanto para confirmar a criação da sua conta, para confirmar, <a href = 'http://201.2.18.191:2222/TimeLibrary/services/pegar_token_url.php?token=$tok'>clique aqui</a>
                    ";

                    $destino = $email;

                    $expiracao_token = date('Y-m-d H:i:s', strtotime('+1 hour'));

                    $inserir_token = $banco->insert("tokens", "'$tok', $id_fisica, '$expiracao_token'", "token, id_cliente, tempo_token");
                    
                    $mensagem_email = $mailer->enviarEmail($assunto, $conteudo, $destino);

                    $_SESSION["email_cadastro"] = true;

                    header("Location: ../views/user/login.php");

                    //echo "CHeguei aqui (fisico)!!!";
                }else{

                    //echo "INSERÇÃO DOS CÓDIGOS FALHOU PARA A PESSOA FISICA!";

                    $_SESSION["email_cadastro"] = false;

                }
            }

        }elseif(isset($_POST["cnpj"]) && !empty($_POST["cnpj"]) && isset($_POST["inscricao_estadual"]) && !empty($_POST["inscricao_estadual"])){
    
            $cnpj = $_POST["cnpj"];

            $codigo_cnpj = $cod->validarCNPJ($cnpj);

            echo "<br>CNPJ = $codigo_cnpj<br>";

            $inscricao_estadual = $_POST["inscricao_estadual"];

            //echo "<br>INSERINDO JURIDICO!!!<br>";

            $conta_estado = 0;
        
            $cadastrar_dados = $banco->insert("clientes", "'$nome', '$email', '$senha', '$rua', $numero, '$complemento', '$cep', '$cidade', '$estado', $conta_estado", "nome, email, senha, rua, numero, complemento, cep, cidade, estado, conta_estado");

            $consulta_id_cliente = $banco->select("id", "clientes", "WHERE", "nome = '$nome'");

            if($consulta_id_cliente && mysqli_num_rows($consulta_id_cliente) > 0){

                $linha_juridica = mysqli_fetch_assoc($consulta_id_cliente);

                $id_juridica = $linha_juridica["id"];

                //echo "<br>===ID consultado do cliente jurídico $nome: $id_juridica === <br>";

                $inserir_juridico = $banco->insert("juridica", "$id_juridica, '$codigo_cnpj', '$inscricao_estadual'", "id_cliente, cnpj, inscricao_estadual");

                if($inserir_juridico == true){

                    //echo "<br>ID, CNPJ e INSCRIÇÃO ESTADUAL INSERIDOSSS!!!<br>";

                    $tok = uniqid();

                    $assunto = "
                        Criação de conta.
                    ";
                    $conteudo = "                        
                        Olá, este e-mail serve tanto para confirmar que o seu e-mail existe quanto para confirmar a criação da sua conta, para confirmar, <a href = 'http://201.2.18.191:2222/TimeLibrary/services/pegar_token_url.php?token=$tok'>clique aqui</a>
                    ";
                    $destino = $email;

                    $expiracao_token = date('Y-m-d H:i:s', strtotime('+1 hour'));

                    $inserir_token = $banco->insert("tokens", "'$tok', $id_juridica, '$expiracao_token'", "token, id_cliente, tempo_token");

                    $mensagem_email = $mailer->enviarEmail($assunto, $conteudo, $destino);

                    $_SESSION["email_cadastro"] = true;

                    header("Location: ../views/user/login.php");

                }else{

                    echo "<br>INSERÇÃO DOS CÓDIGOS FALHOU PARA A PESSOA JURIDICA!<br>";

                    $_SESSION["email_cadastro"] = false;

                }
            }
        }
    }

?>

