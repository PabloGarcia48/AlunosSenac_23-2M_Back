<?php

class PessoaModel {
    public $id, $nome, $cpf, $data_nascimento;

    public $rows; //propriedade para armazenar todas as linhas que vierem do banco de dados

    public function save() {
        include 'DAO/PessoaDAO.php';  //conexão com pessoaDAO

        $dao = new PessoaDAO(); //nova instância do objto PessoaDAO

        if (empty($this->id)) {
            $dao->insert($this); // para o update
        } else {
            $dao->update($this);
        }

        // $dao->insert($this);

    }

    public function getAllRows() {
        include 'DAO/PessoaDAO.php';
        
        $dao = new PessoaDAO();
        
        $this->rows = $dao->select();
        
    }
    
    public function getById(int $id) { // para o update
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();

        // return $dao->selectById($id); //codar primeiro, depois resolver o erro com o código abaixo IF

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PessoaModel();

        /*
        if ($obj) {
            return $obj;
        } else {
            return new PessoaModel(); //Se tem id retorna o $obj, caso não encontre o id retorna uma nova Pessoa Model que está vazia
        }

        */

        
    }

    public function delete(int $id) {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $dao->delete($id);
    }

}

?>