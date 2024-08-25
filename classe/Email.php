<?php

namespace classe;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../utils/private/dados.php";
require_once "../vendor/vendor/autoload.php";


// private $servico = $host;
//     private $usr = $username;
//     private $pss = $password;

use PHPMailer\PHPMailer\PHPMailer;

//echo $teste;

class Email{

    private $servico;
    private $usr;
    private $pss;

    public function __construct(){

        global $host, $username, $password;

        $this->servico = $host;
        $this->usr = $username;
        $this->pss = $password;

    }

    public function emailGenerico(string $assunto, string $conteudo, string $destino, string $alt = null){
    
        $mail = new PHPMailer();

        $cod = $this->servico;
        $usr = $this->usr;
        $pss = $this->pss;

        $mail->isSMTP();
        $mail->Host = $cod;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $usr;
        $mail->Password = $pss;
        $mail->Port = 587;

        $mail->setFrom("flyinglocation2902@outlook.com", 'JVBC/JCMS Co.');
        $mail->addAddress($destino);

        $mail->isHTML(true);

        $mail->Subject = $assunto;

        $mail->Body = nl2br($conteudo);

        //$mail->AltBody = nl2br(strip_tags($alt));
        //Esse alt é a versão simplificada do e-mail, caso a plataforma não suporte e-mails com HTML.

        if(!$mail->send()) {
            //echo 'Não foi possível enviar a mensagem.';
            //echo 'Erro: ' . $mail->ErrorInfo;

            return false;

        } else {
            //echo "E-mail enviado com sucesso!!!<br>";
            return true;
        }
    }

}