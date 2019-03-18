<?php

    /*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Oliveira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado: 15/03/2019
    Autor da Modificação: Murilo Oliveira

    Objetivo da Classe: Rotas

    */

    $controller = null;
    $modo = null;

    if(isset($_GET['controller'])){

        //Sempre serão enviadas pela View, seja nas ações de inserir, apagar, buscar ou excluir;
        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch ($controller){

            case 'CONTATOS':
                switch ($modo){
                    case 'INSERIR':
                        require_once('controller/controllerContato.php'); 
                        $controllerContato = new controllerContato();//Instância
                        $controllerContato->inserirContato(); //Chamando o método de inserir um novo contato
                        
                        break;

                    case 'ATUALIZAR':

                    case 'EXCLUIR':

                    case 'BUSCAR':

                }
            break;
        }

    }else{

        echo "<script> alert('Erro!') </script>";
    }


?>