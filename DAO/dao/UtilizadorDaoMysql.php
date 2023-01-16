<?php

require_once "models/Utilizador.php";

class UtilizadorDaoMysql implements UtilizadorDao{
    
    private $conn;

    public function __construct(PDO $driver){
        $this->conn=$driver;
    }

    public function add(Utilizador $u){
        $sql=$this->conn->prepare("INSERT INTO utilizadores (nome,email) VALUES (:nome,:email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();
        $u->setId($this->conn->lastInsertId());
        return $u;
    }

    public function findAll(){
        $array=[];
        $sql=$this->conn->query("SELECT * FROM utilizadores");
        if($sql->rowCount()>0){
            $data=$sql->fetchAll();
            foreach($data as $item){
                $u=new Utilizador();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                $array[]=$u;
            }
        }
        return $array;
    }

    public function findById($id){ 
        $sql=$this->conn->prepare("SELECT * FROM utilizadores WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount()>0){
            $data=$sql->fetch();
            $u=new Utilizador();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            return $u;
        }
        else{
            return false;
        }
    }
    
    public function findByEmail($email){
        $sql=$this->conn->prepare("SELECT * FROM utilizadores WHERE email=:email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount()>0){
            $data=$sql->fetch();
            $u=new Utilizador();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            return $u;
        }
        else{
            return false;
        }
        
    }

    public function update(Utilizador $u){
        $sql=$this->conn->prepare("UPDATE utilizadores SET nome=:nome, email=:email where id=:id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql=$this->conn->prepare("DELETE FROM utilizadores where id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}
?>
