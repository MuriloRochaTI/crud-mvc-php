<?php


    /*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Oliveira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado: 15/03/2019 | 18/03/2019
    Autor da Modificação: Murilo Oliveira

    Objetivo da Classe: Controller de contatos

    */

    //Classe que controla os dados do contatos 
    class ControllerContato {
        //Criar um atributo do tipo objeto que será utilizado por todos os métodos
        //A instância desse Objeto está sendo criado no construtor
        private $contatoDAO;
        public function __construct(){
            //Import da classe contatoDAO para inserir no banco de dados
            //Essa classe é responsavel por manipular o CRUD no banco de dados
            require_once('model/DAO/contatoDAO.php');

            require_once('model/contatoClass.php');

            //instância do contatoDAO para inserir no BD como atributo da classe
            $this->contatoDAO = new ContatoDAO();
        }

        //Inserir um novo registro
        public function inserirContato(){
            //Verifica qual método está sendo requisitado do formulário (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                //Resgatando os values do formulário
                $nome = $_POST['txtnome'];
                $telefone = $_POST['txttelefone'];
                $celular = $_POST['txtcelular'];
                $email = $_POST['txtemail'];
                $datanasc = $_POST['txtdatanasc'];
                $obs = $_POST['txtobs'];

                
                $contatoClass = new Contato();

                //Guardando oss values POST no objeto contatoClass
                $contatoClass->setNome($nome);
                $contatoClass->setTelefone($telefone);
                $contatoClass->setCelular($celular);
                $contatoClass->setEmail($email);
                $contatoClass->setDataNascimento($datanasc);
                $contatoClass->setObs($obs);

                //Chaamando o método inserir do contatoDAO, e estamos passando como parametro 
                //o objeto $contatoClass que tem todos os dados que serãoo inseridos
                $this->contatoDAO->insert($contatoClass);   

            }else{
                echo "<script> alert('Erro!') </script>";    
            }
        }

        //Excluir o registro
        public function excluirContato(){
            //resgatando o id do contato
            $id = $_GET['id'];
            //chamada para o método de excluir contato 
            //passando como parametro o ID
            $this->contatoDAO->delete($id);

        }

        //Atualizar o registro existente
        public function atualizarContato(){

            $id = $_GET['id'];
            //Verifica qual método está sendo requisitado do formulário (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                //Resgatando os values do formulário
                $nome = $_POST['txtnome'];
                $telefone = $_POST['txttelefone'];
                $celular = $_POST['txtcelular'];
                $email = $_POST['txtemail'];
                $datanasc = $_POST['txtdatanasc'];
                $obs = $_POST['txtobs'];

                
                $contatoClass = new Contato();

                //Guardando oss values POST no objeto contatoClass
                $contatoClass->setCodigo($id);
                $contatoClass->setNome($nome);
                $contatoClass->setTelefone($telefone);
                $contatoClass->setCelular($celular);
                $contatoClass->setEmail($email);
                $contatoClass->setDataNascimento($datanasc);
                $contatoClass->setObs($obs);

                //Chaamando o método update do contatoDAO, e estamos passando como parametro 
                //o objeto $contatoClass que tem todos os dados que serãoo inseridos
                $this->contatoDAO->update($contatoClass);   

            }else{
                echo "<script> alert('Erro!') </script>";    
            }
        }

        //Listar todos os registros
        public function listarContato(){
            //instância do contatoDAO
            //$listarContatoDAO = new ContatoDAO();
            //Chamando o método para listar os contatos 
            return $this->contatoDAO->selectAll();
        }

        //Buscar um registro existente
        public function buscarContato(){
            //resgatando o ID para busca
            $id = $_GET['id'];
            return $this->contatoDAO->selectById($id);

        }

    }
?>