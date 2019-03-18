<?php
    /*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Olivira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado:
    Autor da Modificação: 

    Objetivo da Classe: CRUD da classe de Contatos

    */
    class ContatoDAO{

        //Método construtor
        public function __construct(){
            //import da classe do banco para ficar padrão para todos os métodos
            require_once('conexaoMySQL.php');
        }

        //Inserir o registro// método insert tá chegando um obj do tipo contato
        public function insert(Contato $contato){
            
            $insertSql = "INSERT tbl_contatos(
                nome, email, telefone, celular, DATA_NASCIMENTO, OBS
                )
                VALUES(
                    '".$contato->getNome()."',
                    '".$contato->getEmail()."',
                    '".$contato->getTelefone()."',
                    '".$contato->getCelular()."',
                    '".$contato->getDataNascimento()."',
                    '".$contato->getObs()."'
                 )

                 
                
                 
             ";
            
            //Instância do banco
            $connect = new ConexaoMySql();

            //abrindo conexao com o banco
            $pdoConnect = $connect->connectDatabase();
            
            //Executa o script no banco de dado | retorna um boolean
            if($pdoConnect->query($insertSql)){
                header('location:index.php');
            }else{
                echo "<script> alert('Houve um erro na inserção dos dados') </script>";
            }

            $connect->closeDataBase();
             
        }

        //Deletar o registro
        public function delete(){

        }

        //Atualizar o registro
        public function update(){

        }

        //Select para listar todos os registros
        public function selectAll(){
            $selectAllSql = "SELECT * FROM tbl_contatos ORDER BY codigo DESC";

            $connect = new ConexaoMySql();

            //abrindo conexao com o banco
            $pdoConnect = $connect->connectDatabase();
            
            $select = $pdoConnect->query($selectAllSql);

            //Array de Objetos para retornar os contatos
            //No formato de PDO o proprío método query além de retornar os dados do BD ele também retorna características do PDO
            //ex: fetch(). É necessário específicar qual o modelo de conversão de dados, podendo ser: FETCH_ASSOC, FETCH_ARRAY, FETCH_OBJECT
            $cont = 0;
            while ($rsContatos = $select->fetch(PDO::FETCH_ASSOC)) {
                
                $listarContatosAll[] = new Contato();
                $listarContatosAll[$cont]->setNome($rsContatos['nome']);
                $listarContatosAll[$cont]->setEmail($rsContatos['email']);
                $listarContatosAll[$cont]->setTelefone($rsContatos['telefone']);
                $listarContatosAll[$cont]->setCelular($rsContatos['celular']);
                $listarContatosAll[$cont]->setDataNascimento($rsContatos['DATA_NASCIMENTO']);
                $listarContatosAll[$cont]->setObs($rsContatos['OBS']);

                $cont++;

            }
            $connect->closeDataBase();
            return $listarContatosAll;

            
        }

        //seleciona o registro por ID
        public function selectById(){

        }

    }

?>