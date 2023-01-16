<?php
require "config.php";
$name=filter_input(INPUT_POST,"name");
$email=filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
if($name && $email){

    $sql=$conn->prepare("select * from utilizadores where email=:email");
    $sql->bindValue(':email',$email);
    $sql->execute();
    if($sql->rowCount()===0){
        $sql=$conn->prepare("INSERT INTO utilizadores (nome,email) VALUES (:name,:email)");
        $sql->bindValue(':name',$name);
        $sql->bindValue(':email',$email);
        $sql->execute();

        header("Location: index.php");
        exit;
    }
    else{
        header("Location: adicionar.php");
        exit;}
}
else{
    header("Location: adicionar.php");
    exit;
}
?> 