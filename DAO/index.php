<?php
require "config.php";
require "dao/UtilizadorDaoMysql.php";

$utilizadorDao=new UtilizadorDaoMysql($conn);
$lista=$utilizadorDao->findAll();
?>
<a href="adicionar.php">Adiciona Utilizador</a>
<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $utilizador): ?>
    <tr>
        <td><?=$utilizador->getId(); ?></td>
        <td><?=$utilizador->getNome(); ?></td>
        <td><?=$utilizador->getEmail(); ?></td>
        <td>
            <a href="editar.php?id=<?=$utilizador->getId(); ?>">[ Editar ]</a>
            <a href="apagar.php?id=<?=$utilizador->getId(); ?>"onclick="return confirm('Tem certeza que deseja apagar o registro?')">[ Apagar ]</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>