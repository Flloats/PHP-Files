<?php
class Utilizador{

    private $id;
    private $nome;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function setId($i){
        $this->id=trim($i);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome=ucwords(trim($n));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e){
        $this->email=strtolower(trim($e));
    }
}

interface UtilizadorDAO{
    public function add(Utilizador $u);
    public function findAll();
    public function findbyEmail($email);
    public function findById($id);
    public function update(Utilizador $u);
    public function delete($id);
}

?>
