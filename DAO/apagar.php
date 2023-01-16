<?php
require "config.php";
require "dao/UtilizadorDaoMysql.php";

$utilizadorDao = new UtilizadorDaoMysql($conn);

$id=filter_input(INPUT_GET, "id");

if($id){
    $utilizadorDao->delete($id);
    
}
header ("Location: index.php");
exit;
?>