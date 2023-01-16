<?php
require "config.php";
$lista=[];
$sql=$conn->query("select * from utilizadores");
if($sql->rowCount()>0){
    $lista=$sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="adicionar.php">Adicionar utilizador</a>
<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $utilizador):?>
        <tr>
            <td><?php echo $utilizador['id'];?></td>
            <td><?php echo $utilizador['nome'];?></td>
            <td><?php echo $utilizador['email'];?></td>
            <td>
                <a href="editar.php?id=<?php echo $utilizador['id'];?>">[Editar]</a>
                <a href="apagar.php?id=<?php echo $utilizador['id'];?>" onclick="return confirm('Tem a certeza que deseja apagar o registo?')">[Apagar]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

