<?php

    /*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Olivira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado:
    Autor da Modificação: 

    Objetivo da Classe: Classe de Contatos

    */

    class Contato {

        //Atributos do banco
        private $codigo;
        private $nome;
        private $email;
        private $telefone;
        private $celular;
        private $dataNascimento;
        private $obs;

        public function __construct(){

        }

        //Métodos
        //GET -> Pegar a informação e enviar para a view
        //SET -> Recebe a informação da view e envia para o objeto
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }


        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getCelular(){

            
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento){

            if(strpos($dataNascimento, "/")){
                //Tratamento da data para enviar para o banco
                $this->dataNascimento = date("Y-m-d", strtotime($dataNascimento));
            }else if(strpos($dataNascimento, "-")){
                $this->dataNascimento = date("d/m/Y", strtotime($dataNascimento));
            }
            
        }

        public function getObs(){
            return $this->obs;
        }

        public function setObs($obs){
            $this->obs = $obs;
        }
    }

?>