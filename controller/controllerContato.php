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
    class ControllerContato{

        public function __construct(){
            //Import da classe contatoDAO para inserir no banco de dados
            //Essa classe é responsavel por manipular o CRUD no banco de dados
            require_once('model/DAO/contatoDAO.php');

            require_once('model/contatoClass.php');
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

                

                //instância do contatoDAO
                $contatoDAO = new ContatoDAO();

                //Chaamando o método inserir do contatoDAO, e estamos passando como parametro 
                //o objeto $contatoClass que tem todos os dados que serãoo inseridos
                $contatoDAO->insert($contatoClass); 


                


            }else{
                echo "<script> alert('Erro!') </script>";
                
            }
        }

        //Excluir o registro
        public function excluirContato(){

        }

        //Atualizar o registro existente
        public function atualizarContato(){
            
        }

        //Listar todos os registros
        public function listarContato(){
            //instância do contatoDAO
            $listarContatoDAO = new ContatoDAO();
            //Chamando o método para listar os contatos 
            return $listarContatoDAO->selectAll();
        }

        //Buscar um registro existente
        public function buscarContato(){

        }

    }
?>