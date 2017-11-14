<?php include('menu.php'); ?> 

<?php include('default.php'); ?>

<?php
require_once('../controller/ControleUsuario.php');
Processo('editar');
?>

<script src="js/Validacaoform.js"></script>

<div class="container">

    <form class="form-signin" action="" id="form" name="form" method="post">
        <h3 class="form-signin-heading">Editar Usuário</h3>

          <?php while ($row = mysqli_fetch_array($rs)) { ?>
        
        <div class="form-group">
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $row['NomeUser']; ?>">
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>">
            <input type="text" id="senha" name="senha" class="form-control" value="<?php echo $row['Senha']; ?>">
        </div>

   <?php } ?>
        
        <div class="form-group">
            <div>
                <input type="button" name="button" id="button" value="Salvar" class="btn btn-primary" onclick="validar(document.form);"/>
                <input type="hidden" name="ok" id="ok" />
            </div>
        </div>

    </form>

</div> <!-- /container -->

