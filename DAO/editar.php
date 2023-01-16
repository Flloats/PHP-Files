<?php
require "config.php";
require "dao/UtilizadorDaoMysql.php";

$utilizadorDao = new UtilizadorDaoMysql($conn);

$utilizador=false;

$id = filter_input(INPUT_GET,"id");

if($id){
    $utilizador = $utilizadorDao->findById($id);
}

if($utilizador === false){
    header("location:index.php");
    exit;
}

$id=filter_input(INPUT_GET,"id");
?>

<h1>Editar Utilizador</h1>
<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$utilizador->getId()?>">
    <label>
        Nome:<br>
        <input type="text" name="name" value="<?=$utilizador->getNome();?>">
    </label>
    <br><br>
    <label>
        E-mail:<br>
        <input type="email" name="email" value="<?=$utilizador->getEmail();?>">
    </label>
    <br><br>
    <input type="submit" value="Salvar">
</form>

