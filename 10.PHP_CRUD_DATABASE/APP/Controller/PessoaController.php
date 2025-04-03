<?php

class PessoaController {

    // listar os itens
    public static function index() {

        include 'Model/PessoaModel.php'; //inclui o pessoa model que vai transportar os objetos de um lugar para o outro

        $model = new PessoaModel(); // instancia o objeto
        $model->getAllRows(); //model está vindo com array de objetos e desta forma iteramos sobre todos os itens aqui

        include 'View/modules/Pessoa/ListaPessoa.php';
    }

    // devolver o formulário
    public static function form() {
        include 'Model/PessoaModel.php'; //para update
        $model = new PessoaModel(); //para update

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }

       // $model = $model->getById((int) $_GET['id']); //para update TypeCast, vem da URL e força a transformação em Int

        // var_dump($model); 

        include 'View/modules/Pessoa/FormPessoa.php';
    }

    public static function save() {
        // var_dump($_POST);
        include 'Model/PessoaModel.php'; //inclui o pessoa model que vai transportar os objetos de um lugar para o outro

        $model = new PessoaModel(); // instancia o objeto

        $model-> id = $_POST['id']; // para o update
        $model-> nome = $_POST['nome'];
        $model-> cpf = $_POST['cpf'];
        $model-> data_nascimento = $_POST['data_nascimento'];

        $model->save();

        header("Location: /pessoa");
    }

    public static function delete(){
        include 'Model/PessoaModel.php';
        $model = new PessoaModel();

        $model->delete((int) $_GET['id']);

        header("Location: /pessoa");
    }


}


?>