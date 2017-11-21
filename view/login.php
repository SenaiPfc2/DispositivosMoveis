<?php include('menu.php'); ?>

<?php include('default.php'); ?>

<?php

require_once('../controller/ControleUsuario.php');
Processo('acessar');
?>

        <div class="container">
            <form class="form-signin">
                <h2 class="form-signin-heading"></h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                <div class="checkbox">
                </div>
                <div>
                    <input type="button" name="button" id="button" value="Acessar" class="btn btn-primary"/>
                    <input type="hidden" name="acessar" id="acessar" />
                </div>
            </form>
        </div> <!-- /container -->


