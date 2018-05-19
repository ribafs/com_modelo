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

     // Set title in Administrator interface      
     JToolBarHelper::title( JText::_( 'Cadastro de Portfolios' ), 'addedit.png' );

     // Query database for cadastro de portfolios entries
     $db = JFactory::getDBO();
     $db->getQuery(true);
     $query = "SELECT categoria, imagem, descricao FROM #__modelo ORDER BY categoria, id ASC";
     $db->setQuery( $query);
     $rows = $db->loadObjectList();
     $nr=$db->getAffectedRows();


