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
                $usuario->incluir($_POST['nome'], $_POST['email'], $_POST['senha']);
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

        case 'acessar':

            global $_SG;
            $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
            // Usa a função addslashes para escapar as aspas
            $nusuario = addslashes($usuario);
            $nsenha = addslashes($senha);


            global $linha;
            global $rs;

            $usuario = new UsuarioDAO();

            $usuario->consultar("select * from tbusuarios where Email=" . $_GET['email'] . " AND Senha=" . $_GET['senha']);
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if (empty($rs)) {
                // Nenhum registro foi encontrado => o usuário é inválido
                return false;
            } else {
                // Definimos dois valores na sessão com os dados do usuário
                $_SESSION['usuarioID'] = $resultado['idUser']; // Pega o valor da coluna 'id do registro encontrado no MySQL
                $_SESSION['usuarioNome'] = $resultado['NomeUser']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
                // Verifica a opção se sempre validar o login
                if ($_SG['validaSempre'] == true) {
                    // Definimos dois valores na sessão com os dados do login
                   // $_SESSION['usuarioLogin'] = $usuario;
                   // $_SESSION['usuarioSenha'] = $senha;
                }
                return true;
            }



            break;
    }

    function protegePagina() {
        global $_SG;
        if (!isset($_SESSION['usuarioID']) OR ! isset($_SESSION['usuarioNome'])) {
            // Não há usuário logado, manda pra página de login
            expulsaVisitante();
        } else if (!isset($_SESSION['usuarioID']) OR ! isset($_SESSION['usuarioNome'])) {
            // Há usuário logado, verifica se precisa validar o login novamente
            if ($_SG['validaSempre'] == true) {
                // Verifica se os dados salvos na sessão batem com os dados do banco de dados
                if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
                    // Os dados não batem, manda pra tela de login
                    expulsaVisitante();
                }
            }
        }
    }

    /**
     * Função para expulsar um visitante
     */
    function expulsaVisitante() {
        global $_SG;
        // Remove as variáveis da sessão (caso elas existam)
        unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
        // Manda pra tela de login
        header("Location: " . $_SG['paginaLogin']);
    }

}

?>