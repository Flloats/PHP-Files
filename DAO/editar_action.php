<?php
require "config.php";
require "dao/UtilizadorDaoMysql.php";

$utilizadorDao = new UtilizadorDaoMysql($conn);


$id=filter_input(INPUT_POST,"id");
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

if($id && $name && $email){
        $utilizador = new Utilizador();
        $utilizador->setId($id);
        $utilizador->setNome($name);
        $utilizador->setEmail($email);

        $utilizadorDao->update($utilizador);
        header("Location: index.php");
        exit;
}else{
    header("Location: editar.php?id=".$id);
    exit;
}
?>