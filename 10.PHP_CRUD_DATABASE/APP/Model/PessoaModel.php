<?php

class PessoaModel
{
    public $id, $nome, $cpf, $data_nascimento;

    public function save() {
        include 'DAO/PessoaDAO.php'; //conexão com a DAO

        $dao = new PessoaDAO();

        $dao->insert($this);

    }
}
