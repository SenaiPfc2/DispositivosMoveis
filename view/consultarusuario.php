<?php include('menu.php'); ?> 

<?php include('default.php'); ?>

<?php
require_once('../controller/ControleUsuario.php');
Processo('consultar');
?>

<br>

<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">Usuários </div>

        <table class="table table-striped">
            <thead align="center">
            <td><b>COD</b></td>
            <td><b>NOME</b></td>
            <td><b>EMAIL</b></td>
            <td><b>SENHA</b></td>
            </thead>

            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tbody align="center">
                <td> <?php echo $row['idUser']; ?> </td>
                <td> <?php echo $row['NomeUser']; ?> </td>
                <td> <?php echo $row['Email']; ?> </td>
                <td> <?php echo $row['Senha']; ?> </td>
                <td>
                    <a href="editarusuario.php?id=<?php echo $row['idUser']; ?>"><button type="button" class="btn btn-primary">Editar</button></a>
                    <a href="consultarusuario.php?ok=excluir&id=<?php echo $row['idUser']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                </tbody>
            <?php } ?>
        </table>


    </div>
</div>