<?php
   
    $nome = null;
    $telefone = null;
    $celular = null;
    $email = null;
    $dt_nasc = null;
    $obs = null;

   if(isset($contato)){
      $id = $contato->getCodigo();
      $nome = $contato->getNome();
      $telefone = $contato->getTelefone();
      $celular = $contato->getCelular();
      $email = $contato->getEmail();
      $dt_nasc = $contato->getDataNascimento();
      $obs = $contato->getObs();

      $action = "router.php?controller=contatos&modo=atualizar&id=".$id;

   }else{
      $action = "router.php?controller=contatos&modo=inserir";
   }
    
?>


    	<div id="cadastro">
        	
            <form name="frmcontatos" method="POST" autocomplete="off" action="<?php echo($action) ?>">
            
                <table id="tblcadastro">
                  <tr>
                    <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Nome:</td>
                    <td><input id="nome" value="<?php echo($nome);?>" name="txtnome" type="text"  required placeholder="Nome"  /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Telefone:</td>
                    <td><input id="telefone" name="txttelefone" type="tel" value="<?php echo($telefone);?>"  /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Celular:</td>
                    <td><input name="txtcelular" type="tel" value="<?php echo($celular);?>" placeholder="Ex:011 99999-9999" /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Email:</td>
                    <td><input name="txtemail" type="email" value="<?php echo($email);?>" /></td>
                  </tr>
				          <tr>
                    <td class="tblcadastro_td">Data Nascimento:</td>
                    <td><input name="txtdatanasc" type="text" value="<?php echo($dt_nasc);?>" /></td>
                  </tr>
                  
				          <tr>
				  
                    <td class="tblcadastro_td">Obs:</td>
                    <td><textarea name="txtobs" cols="20" rows="5"><?php echo($obs);?></textarea></td>
                  </tr>
                  <tr>
                    <td><input name="btnsalvar" type="submit" value="Salvar" /></td>
                    <td><input name="btnlimpar" type="reset" value="Limpar" /></td>
                  </tr>
                </table>
            
            </form>

        </div>
		<div id="consulta">
        	<table id="tblconsulta">
              <tr>
                <td class="titulo_tabela" colspan="5">Consulta de Contatos</td>
              </tr>
              <tr class="tblcadastro_td">
                <td>Nome:</td>
                <td>Email:</td>
                <td>Telefone:</td>
                <td>Data de Nascimento:</td>
                <td>Opções</td>
              </tr>
              <tr class="tblconsulta_dados">
                <td></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

            <!-- consultas -->
            <?php 
              //Import da controle de contatos
              require_once('controller/controllerContato.php');
              //Instância da controller contatos
              $listarContatos = new ControllerContato();
              //Chamada do método de listar contatos
              $rsListarContatos = $listarContatos->listarContato();

              $cont = 0;

              while($cont < count($rsListarContatos)){
            ?>    

                      <tr class="tblconsulta_dados">
                        <td><?php echo($rsListarContatos[$cont]->getNome()); ?></td>
                        <td><?php echo($rsListarContatos[$cont]->getEmail()); ?></td>
                        <td><?php echo($rsListarContatos[$cont]->getTelefone()); ?></td>
                        <td><?php echo($rsListarContatos[$cont]->getDataNascimento()); ?></td>
                        <!-- Data e Obs -->
                        
                          <td>
                           
                          <a href="router.php?controller=contatos&modo=buscar&id=<?php echo($rsListarContatos[$cont]->getCodigo());?>">
                                  <img src="view/img/bg.png" width="20" height="20">
                            </a>|
                            <a href="router.php?controller=contatos&modo=excluir&id=<?php echo($rsListarContatos[$cont]->getCodigo());?>">
                                  <img src="view/img/bg.png" width="20" height="20"> 
                            </a>
                        
                        </td>
                      </tr>
                <?php 
                  $cont++;
                  }
                ?>
            </table>
        </div>
    </div>
     
</div>

</body>
</html>



	

