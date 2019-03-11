<?php

/*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Olivira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado:
    Autor da Modificação: 

    Objetivo da Classe: Criar conexão com o banco de dados MySQL

*/

    class ConexaoMySql{

        private $server;
        private $user;
        private $password;
        private $database;

        //Método construtor
        public function __construct(){
           $this->server = "localhost";
           $this->user = "root";
           $this->password = "bcd127";
           $this->database = "db_contatos";
            
        }

        //Abre a conexão com o banco de dados
        public function connectDatabase(){
            //Tratamento de erros com Try Catch
            try {
                //'mysql:host=localhost;dbname=test_basic01', $user, $pass
                $conexao = new PDO('mysql:host='.$this->server. ';dbname='.$this->database, $this->user, $this->password);
                return $conexao;
            } catch (PDOException $e) {
                echo ("Erro ao conectar-se com o banco: <br>". $e->getLine(). " <br> Mensagem: <br> ".$e->getMessage());
            }
        }

        //Método para fechar a conexão com o banco de dados
        public function closeDatabase(){
            
            //$conxexao = null;
            unset($conexao);
        }

    }



?>