<?php
/**
* @version $Id: portfolio.php 5203 2007-06-15 02:45:14Z DanR $
* @copyright Copyright (C) 2007 Dan Rahmel. All rights reserved.
* @package portfolio
* This component displays portfolio entries and allows the addition
* of entries from registered users.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
    require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelo_insert.php');
    require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelo_update.php');
    require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelo_deletedb.php');

// Check the task parameter and execute appropriate function
switch( JRequest::getVar( 'task' )) { 
    case 'add': 
        addEntry(); 
        break; 
    case 'insert': 
        insertEntry(); 
        break; 
    case 'edit': 
        editEntry(); 
        break; 
    case 'update': 
        updateEntry(); 
        break; 
    case 'delete': 
        deleteEntry(); 
        break; 
    case 'upload': 
        uploadEntry(); 
        break; 
    default: 
        displayEntries(); 
        break; 
} 

// Display edit list of all cadastro de portfolios entries
function displayEntries() {

     // Set title in Administrator interface      
     JToolBarHelper::title( JText::_( 'Cadastro de Portfolios' ), 'addedit.png' );

    require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelodb.php');

    if($nr > 0){  
?>
<div class="container">
    <div class="row">
        <div class="span7">
            <h3 class="header" style="color:#fff;">Cadastro de Portfolios</h3>
            <table class="table table-striped table-hover">
            <tr>
                <td><strong><?php echo JText::_( 'Categoria' ); ?></strong></td>
                <td><strong><?php echo JText::_( 'Imagem' ); ?></strong></td>
                <td><strong><?php echo JText::_( 'Descricao' ); ?></strong></td>
                <td colspan="2"><div align="center"><strong>Ações</strong></div></td>
            </tr>
        </div><!--/span6 -->
    </div><!--/row -->

    <?php
          echo '<div class="row">' .
            '<div class="span7">';
          foreach ($rows as $row) {	
              $update = "index.php?option=com_modelo&task=edit&imagem=". "'$row->imagem'";
              $delete = "index.php?option=com_modelo&task=delete&imagem=". "'$row->imagem'";

          echo '<tr><td>' . $row->categoria . '</td>' .
                   '<td><img src="' . $row->imagem . '" width="30px"></td>' .
                   '<td>' . $row->descricao . '</td>' .
                   "<td class='btn'><a href=" . $update . "><i class='icon-edit'></i>Alterar</a></td>" .
                   "<td class='btn'><a href=" . $delete . " onclick=\"return confirm('Tem certeza de que deseja excluir?');\"><i class='icon-remove'></i>Excluir</a></td>" .
               '</tr>';
          }

     }else{
        print '<h3>Nenhum Portfolio cadastrado ainda!</h3>';
     }
     ?>
            </table>
            <tr><td colspan="5" class="btn"><a href="index.php?option=com_modelo&task=insert"><i class="icon-plus"></i>Novo</a></td></tr>
        </div><!--/row -->
    </div><!--/span6 -->
</div><!--/container -->            

<?php }?>
