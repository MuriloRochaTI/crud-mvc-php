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
        private $conex;
        //Método construtor
        public function __construct(){
            //import da classe do banco para ficar padrão para todos os métodos
            require_once('conexaoMySQL.php');
            $this->conex = new ConexaoMySql();
        }

        //Inserir o registro | método insert | tá chegando um obj do tipo contato
        public function insert(Contato $contato){
            
            $insertSql = "INSERT INTO tbl_contatos(
                nome, email, telefone, celular, DATA_NASCIMENTO, OBS
                )
                VALUES(
                    '".$contato->getNome()."',
                    '".$contato->getEmail()."',
                    '".$contato->getTelefone()."',
                    '".$contato->getCelular()."',
                    '".$contato->getDataNascimento()."',
                    '".$contato->getObs()."'
                 )";
            echo $insertSql;
            //abrindo conexao com o banco
            $pdoConnect = $this->conex->connectDatabase();
            
            //Executa o script no banco de dado | retorna um boolean
            if($pdoConnect->query($insertSql)){
                //header('location:index.php');
            }else{
                echo "<script> alert('Houve um erro na inserção dos dados') </script>";
            }

            $this->conex->closeDatabase();
             
        }

        //Deletar o registro
        public function delete($id){
            $deleteSql = "DELETE FROM tbl_contatos WHERE codigo =".$id;
            //abrindo conexão
            $pdoConnect = $this->conex->connectDatabase();

            //Executa o script no banco de dado | retorna um boolean
            if($pdoConnect->query($deleteSql)){
                header('location:index.php');
            }else{
                echo "<script> alert('Houve um erro na exclusão do contato') </script>";
            }

            $this->conex->closeDataBase();
        }

        //Atualizar o registro
        public function update(Contato $contato){
            $updateSql = "UPDATE tbl_contatos SET 
            nome = '".$contato->getNome()."', 
            email = '".$contato->getEmail()."', 
            telefone = '".$contato->getTelefone()."', 
            celular = '".$contato->getCelular()."', 
            DATA_NASCIMENTO = '".$contato->getDataNascimento()."', 
            OBS = '".$contato->getObs()."' WHERE codigo=".$contato->getCodigo();
            
             //abrindo conexao com o banco
             $pdoConnect = $this->conex->connectDatabase();
             echo $updateSql;
             //Executa o script no banco de dado | retorna um boolean
             if($pdoConnect->query($updateSql)){
                 header('location:index.php');
             }else{
                 echo "<script> alert('Houve um erro na inserção dos dados') </script>";
             }
 
             $this->conex->closeDatabase();
            
             
        }

        //Select para listar todos os registros
        public function selectAll(){
            $selectAllSql = "SELECT * FROM tbl_contatos ORDER BY codigo DESC";
            $pdoConnect = $this->conex->connectDatabase();
            $select = $pdoConnect->query($selectAllSql);

            //Array de Objetos para retornar os contatos
            //No formato de PDO o proprío método query além de retornar os dados do BD ele também retorna características do PDO
            //ex: fetch(). É necessário específicar qual o modelo de conversão de dados, podendo ser: FETCH_ASSOC, FETCH_ARRAY, FETCH_OBJECT
            $cont = 0;
            while ($rsContatos = $select->fetch(PDO::FETCH_ASSOC)) {
                
                $listarContatosAll[] = new Contato();
                $listarContatosAll[$cont]->setCodigo($rsContatos['codigo']);
                $listarContatosAll[$cont]->setNome($rsContatos['nome']);
                $listarContatosAll[$cont]->setEmail($rsContatos['email']);
                $listarContatosAll[$cont]->setTelefone($rsContatos['telefone']);
                $listarContatosAll[$cont]->setCelular($rsContatos['celular']);
                $listarContatosAll[$cont]->setDataNascimento($rsContatos['DATA_NASCIMENTO']);
                $listarContatosAll[$cont]->setObs($rsContatos['OBS']);

                $cont++;

            }
            //Fechar a conexão com o BD
            $this->conex->closeDatabase();
            return $listarContatosAll;   
        }

        //seleciona o registro por ID
        public function selectById($id){
            $selectAllSql = "SELECT * FROM tbl_contatos WHERE codigo=".$id;
            $pdoConnect = $this->conex->connectDatabase();
            $select = $pdoConnect->query($selectAllSql);

            //retorna somente um contato
            if($rsContato = $select->fetch(PDO::FETCH_ASSOC)) {
                
                $listarContato = new Contato();
                $listarContato->setCodigo($rsContato['codigo']);
                $listarContato->setNome($rsContato['nome']);
                $listarContato->setEmail($rsContato['email']);
                $listarContato->setTelefone($rsContato['telefone']);
                $listarContato->setCelular($rsContato['celular']);
                $listarContato->setDataNascimento($rsContato['DATA_NASCIMENTO']);
                $listarContato->setObs($rsContato['OBS']);

            }
            //Fechar a conexão com o BD
            $this->conex->closeDatabase();
            return $listarContato;  
        }

    }

?>