<?php include('menu.php'); ?> 

<?php include('default.php'); ?>

<?php

require_once('../controller/ControleUsuario.php');
Processo('incluir');
?>

<script src="js/Validacaoform.js"></script>

<div class="container">

    <form class="form-signin" action="" id="form" name="form" method="post">
        <h3 class="form-signin-heading">Cadastrar Usuário</h3>

        <div class="form-group">
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required autofocus>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        </div>


        <div class="form-group">
            <div>
                <input type="button" name="button" id="button" value="Cadastrar" class="btn btn-primary" onclick="validar(document.form);"/>
                <input type="hidden" name="ok" id="ok" />
            </div>
        </div>

    </form>

</div>