<?php

require_once("../model/UsuarioDAO.php");

function Processo($Processo) {

    switch ($Processo) {

        case 'incluir':

            global $linha;
            global $rs;

            $usuario = new UsuarioDAO();

            $usuario->consultar("select * from tbusuarios"); 
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if (isset($_POST["ok"])) {
                $usuario->incluir($_POST['nome'], $_POST['email'],$_POST['senha']);
                echo '<script>alert("Cadastrado com sucesso !");</script>'; 
                echo '<script>window.location="consultarusuario.php";</script>'; 
            }

            break;

        case 'consultar': 

            global $linha; 
            global $rs; 

            $usuario = new UsuarioDAO();
            
            $usuario->consultar("select * from tbusuarios");
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if (isset($_GET["ok"])) {
                if (($_GET["ok"]) === "excluir") {
                    $usuario->excluir($_GET['id']);
                    echo '<script>alert("Excluido com sucesso !");</script>'; 
                    echo '<script>window.location="consultarusuario.php";</script>'; 
                }
            }

            break;


        case 'editar':

            global $linha;
            global $rs; 

            $usuario = new UsuarioDAO();

            $usuario->consultar("select * from tbusuarios where idUser=" . $_GET['id']); 
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if (isset($_POST["ok"])) {
                if ($_POST['ok'] == "true") {
                    $usuario->alterar($_POST['nome'], $_POST['email'], $_POST['senha'], $_GET['id']);
                    echo '<script>alert("Alterado com sucesso !");</script>'; 
                    echo '<script>window.location="consultarusuario.php";</script>'; 
                }
            }

            break;
    }
}
