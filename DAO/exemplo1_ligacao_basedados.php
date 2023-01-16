<?php
//PDO
$servername="localhost";
$username="root";
$password="";
$database="vendas";

//Criação de uma ligação à BD
try{
    $conn= new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    //Verificação de ligação
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //definir o modo de erro do PDO para exerção
    echo "Ligação estabelecida";
}catch(PDOException $msg){
    echo "Ocorreu um erro de ligação à base de dados:".$msg->getMessage();
}
?>