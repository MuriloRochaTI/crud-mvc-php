<?php


    /*
    Projeto: Exercício de MVC em tela de contatos
    Autor: Murilo Olivira
    Data: 11/03/2019

    Data Modificação: 12/03/2019 
    Contéudo Modificado:
    Autor da Modificação: 

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

                    case 'ATUALIZAR':

                    case 'EXCLUIR':

                    case 'BUSCAR':

                }
        }

    }else{

        echo "<script> alert('Erro!') </script>";
    }


?>