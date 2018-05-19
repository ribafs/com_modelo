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

// Update data received from form posting
function updateEntry()  {
     // Set title in Administrator interface      
     JToolBarHelper::title( JText::_( 'Atualizar Entrada do Cadastro de Portfolios' ), 'addedit.png' );
     
     // Get reference to database object
     $db = JFactory::getDBO();
 	 $query = $db->getQuery(true);

     $pic = $_FILES['imagem']['name'];
     $img = JURI::root().'images/portfolio/'.$pic;
     $fldId = "'" . JRequest::getInt('id') . "'";
     $fldCategoria = "'" . JRequest::getString('categoria') . "'";
     $fldImagem = "'" . $img . "'";

     $fldDescricao = "'" . JRequest::getString('descricao') . "'";

 	 $query->update('#__modelo');
	 $query->set('categoria = ' . $fldCategoria);
	 $query->set('imagem = ' . $fldImagem);
	 $query->set('descricao = ' . $fldDescricao);
	 $query->where('id = ' . $fldId);
	 $db->setQuery($query);

	 $db->execute();

     // Upload
     $pic_loc = $_FILES['imagem']['tmp_name'];
     $folder=JPATH_SITE."/images/portfolio/".$pic;
	    if(move_uploaded_file($pic_loc,$folder)){
             echo "<h3>Portfolio atualizado com sucesso!</h3>";
             echo "<script>location='index.php?option=com_modelo';</script>";
	    }else{
		    print '<h3>Erro ao alterar Portfolio</h3>';
            exit;
	    }
}


