<?php
require "config.php";
require "dao/UtilizadorDaoMysql.php";

$utilizadorDao=new UtilizadorDaoMysql($conn);

$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);


if($name && $email){
    if($utilizadorDao->findByEmail($email)===false){
        $novoUtilizador=new Utilizador();
        $novoUtilizador->setNome($name);
        $novoUtilizador->setEmail($email);
        $utilizadorDao->add($novoUtilizador);
        header("Location: index.php");
        exit;
    }else{
        header("Location: adicionar.php");
        exit;
    }
}else{
    header("Location: adicionar.php");
    exit;
}
?>