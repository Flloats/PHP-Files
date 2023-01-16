<?php
require "config.php";

$id=filter_input(INPUT_GET,"id");

if($id ){

    $sql=$conn->prepare("delete from utilizadores where id=:id");
    $sql->bindValue(':id',$id);
    $sql->execute();

}

header("Location: index.php");
exit;

?> 



