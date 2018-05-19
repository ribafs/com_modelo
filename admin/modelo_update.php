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

require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelo_updatedb.php');

function editEntry() {
//print $app->input->getCmd('email');exit;
     JToolBarHelper::title( JText::_( 'Cadastro de portfolios' ), 'addedit.png' );

     $app = JFactory::getApplication();

     $db = JFactory::getDBO();
     $query = "SELECT a.id, a.categoria, a.imagem,a.descricao FROM #__modelo AS a" . " WHERE a.imagem = " . JRequest::getString('imagem');

     $db->setQuery( $query, 0, 10 );
     if($rows = $db->loadObjectList()) {

    ?>

    <div class="container">
    <form id="form1" name="form1" method="post" action="index.php?option=com_modelo&task=update" enctype="multipart/form-data">
    <div class="row">
        <div class="span5">
        <h3 class="header" style="color:#fff;">Cadastro de portfolios</h3>
        <table class="table">
        <tr><div class="form-group">
        <td><label>ID : </label></td>
        <td><input name="id" type="text" id="id" value="<?php echo $rows[0]->id; ?>" style="width:35%;"/></td>
        </div></tr>
        <tr><div class="form-group">
        <td><label>Categoria : </label></td>
        <td><select name="categoria" id="categoria" style="width:35%;">
            <option <?php if ($rows[0]->categoria=='Portfolio1') print 'selected';?>>Portfolio1</option>
            <option <?php if ($rows[0]->categoria=='Portfolio2') print 'selected';?>>Portfolio2</option>
            <option <?php if ($rows[0]->categoria=='Portfolio3') print 'selected';?>>Portfolio3</option>
            <option <?php if ($rows[0]->categoria=='Portfolio4') print 'selected';?>>Portfolio4</option>
            <option <?php if ($rows[0]->categoria=='Portfolio5') print 'selected';?>>Portfolio5</option>
        </select></td>
        </div></tr>
        <tr><div class="form-group">
        <td><label>Imagem : </label></td>
        <td><input name="imagem" type="file" id="imagem" style="width:100%;"/></td>
        </div></tr>
        <tr><div class="form-group">
        <td><label>Descrição:</label></td> 
        <td><input name="descricao" type="text" id="descricao" value="<?php echo $rows[0]->descricao; ?>" style="width:100%;"/><td>
        </div></tr>
        <tr><div class="form-group">
        <td><a href="index.php?option=com_modelo"><strong>Voltar</strong></a></td>
        <td><i class="icon-edit"></i><input type="submit" name="Submit" value="Salvar Alerações" /></td>
        </div></tr>
      </table>
      </div>
    </div>
    </form>
    </div>
    <?php 
    }// End If     
}
?>
