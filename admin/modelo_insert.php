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

require_once(JPATH_COMPONENT_ADMINISTRATOR.'/modelo_insertdb.php');

function insertEntry() {
     JToolBarHelper::title( JText::_( 'Cadastro de Portfolios' ), 'addedit.png' );

?>
<h3 class="header" style="color:#fff;">Cadastro de Portfolios</h3>
<div class="container">
<form id="form1" name="form1" method="post" action="index.php?option=com_modelo&task=add" enctype="multipart/form-data">
<div class="row">
    <div class="span5">
    <table class="table">
    <tr><div class="form-group">
    <td><label>Categoria : </label></td>
    <td><select name="categoria" id="categoria" style="width:30%">
        <option>Portfolio1</option>
        <option>Portfolio2</option>
        <option>Portfolio3</option>
        <option>Portfolio4</option>
        <option>Portfolio5</option>
    </select></td>
    </div></tr>
    <tr><div class="form-group">
    <td><label>Imagem : </label></td>
    <td><input name="imagem" type="file" id="imagem" style="width:100%"/></td>
    </div></tr>
  <tr><div class="form-group">
  <td><label>Descrição:</label></td> 
    <td><input name="descricao" type="text" id="descricao" style="width:100%"/><td>
    </div>
  </tr>
  <tr><div class="form-group">
    <td><a href="index.php?option=com_modelo"><strong>Voltar</strong></a></td>
    <td><i class="icon-plus"></i><input type="submit" name="Submit" value="Cadastrar" /></td>
  </div></tr>
  </table>
  </div>
</div>
</form>
</div>
<?php }?>
