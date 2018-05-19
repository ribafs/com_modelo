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

jimport('joomla.filesystem.folder');

// Record data received from form posting
function addEntry()  {     

     $msg='';
     $pic = $_FILES['imagem']['name'];
     $img = JURI::root().'images/portfolio/'.$pic;

     // Get reference to database object
     $db = JFactory::getDbo();
     $query = $db->getQuery(true);

     // Get email from form posting values
     $fldCategoria = JRequest::getString('categoria') ;
     if($fldCategoria==''){
         $msg = "Categoria requerida! ";
     }

     // Get nome from form posting values
     $fldImagem = $img;
     $fldImagem .= JRequest::getString('imagem') ;

    if($fldImagem==''){
        $msg .= "Imagem requerida! ";
    }

     // Get endereco from form posting values
     $fldDescricao = JRequest::getString('descricao') ;

    if($fldDescricao==''){
        $msg .= "Descrição requerida!";
    }

    if($msg) {
        print "<script>alert('$msg');
        history.back();</script>";
        exit;
    }

    $columns = array('categoria', 'imagem', 'descricao');

    $values = array($db->quote($fldCategoria),$db->quote($fldImagem),$db->quote($fldDescricao));

    $query
        ->insert($db->quoteName('#__modelo'))
        ->columns($db->quoteName($columns))
        ->values(implode(',', $values));

    // Set the query using our newly populated query object and execute it.
    if($fldCategoria != ''){
        $db->setQuery($query);
	    $db->execute();
        // echo "<h3>Portfolio cadastrado com sucesso!</h3>";

        // Upload
        // Criar a pasta portfolio

        $pastaPath = JPATH_SITE . '/images/portfolio';
        if(!JFolder::exists($pastaPath)){
            $pastaPath = JFolder::create($pastaPath);
        }

        if($pastaPath){
            $pic_loc = $_FILES['imagem']['tmp_name'];
	        $folder=JPATH_SITE."/images/portfolio/";
	        $folder=JPATH_SITE."/images/portfolio/".$pic;

	        if(move_uploaded_file($pic_loc,$folder)){
		        print '<h3>Portfolio cadastrado com êxito!</h3>';
	        }
            echo "<script>location='index.php?option=com_modelo';</script>";
        }else{
	        print "<h2>Erro ao criar a pasta images/portfolio</h2>";
            exit;
        }
    }else{
	    print "<h2>Erro na inclusão</h2>";
        exit;
    }
}
