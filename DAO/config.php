<?php
//config.php
$db_host="localhost";
$db_name="test";
$db_user="root";
$db_pass="";

//Criação de uma ligação à BD
$conn=new PDO("mysql:host=$db_host;dbname=test",$db_user,$db_pass);
?>