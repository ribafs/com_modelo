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

function deleteEntry()  { 
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);

    $fldImagem = JRequest::getString('imagem');

    $conditions = array(
        $db->quoteName('imagem') . ' = '.$fldImagem 
    );

    $query->delete($db->quoteName('#__modelo'));
    $query->where($conditions);

    if($db->setQuery($query)){
	    $result = $db->execute();
	    print "<h2>Portfolio excluído com sucesso<h2>";
        echo "<script>location='index.php?option=com_modelo';</script>";
    }else{
	    print "<h2>Erro na exclusão<h2>";
    }
}

