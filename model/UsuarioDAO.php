<?php

require_once('Conexao.php');

class UsuarioDAO {

    public function incluir($nome, $email, $senha) {

        $insert = 'insert into tbusuarios(NomeUser, Email, Senha)values("' . $nome . '","' . $email . '","' . $senha . '")';

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($insert);
    }

    // ----- FUNÇÃO DE CONSULTA DE DADOS ----- //

    public function consultar($sql) {

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($sql);

        $this->Linha = @mysqli_affected_rows($Acesso->result);

        $this->Result = $Acesso->result;
    }

    // ----- FUNÇÃO DE EXCLUSÃO DE DADOS ----- //

    public function excluir($id) {

        $delete = 'delete from tbusuarios where idUser="' . $id . '"';

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($delete);
    }

    // ----- FUNÇÃO DE EDIÇÃO DE DADOS ----- //

    public function alterar($nome, $email, $senha, $id) {

        $update = 'update tbusuarios set NomeUser="' . $nome . '", Email="' . $email . '" , Senha="' . $senha . '" where idUser="' . $id . '"';

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Linha = mysqli_num_rows($Acesso->result);

        $this->Result = $Acesso->result;
    }

}
?>

