<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once "../utils/Email.php";
require_once "../utils/DB.php";

use utils\Email;
use utils\DB;

$banco = DB::getInstance();

if(isset($_POST["rec_email"]) && !empty($_POST["rec_email"])){

    $rec_email = $_POST["rec_email"];
    //var_dump($rec_email);

    $procurar_email = $banco->select("email", "clientes", "WHERE", "email = '$rec_email'");

    if($procurar_email && mysqli_num_rows($procurar_email) > 0){

        $linha = mysqli_fetch_assoc($procurar_email);

        $email_procurado = $linha["email"];

        $_SESSION["email_encontrado"] = true;

        header("Location:../views/user/login.php");

    }else{

        $_SESSION["email_encontrado"] = false;

        header("Location:../views/user/login.php");

    }
}