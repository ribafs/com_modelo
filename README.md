Componente Modelo para Cadastro de Portfolios

Este componente é bem simples em se comparando com um componente que usa MVC no Joomla.
Este usa apenas duas camadas, a view/html e o model/banco de dados. Cada camada em um arquivos eparado.

Sanitizar este componente e demais extensões:
- Usar quote e quoteName além dos novos métodos do Joomla 3

Converter este código
     $db = JFactory::getDBO();
     $db->getQuery(true);
     $query = "SELECT categoria, imagem, descricao FROM #__modelo ORDER BY categoria, id ASC";
     $db->setQuery( $query);
     $rows = $db->loadObjectList();
     $nr=$db->getAffectedRows();

Neste


Aqui foi usado alguns bons recursos como:
- Upload de arquivos
- Criação de diretórios
- Usa o Bootstrap 2, que é default no Joomla 3 com fontes/ícones
- Operações com bancos de dados, com uma grid/CRUD para listar, inserir, editar e excluir
- Entre outros

A parte administrativa lista, insere, edita e exclui os itens dos portfolios
A parte do site (módulo) apenas mostra o portfolio

CREATE TABLE IF NOT EXISTS `#__modelo`
(
	`id` int primary key auto_increment NOT NULL,
	`categoria` VARCHAR(45) NOT NULL, 
	`imagem` varchar(100) UNIQUE NOT NULL, 
	`descricao` VARCHAR(105)
);

No site receber os parâmetroa titulo e categoria:

Será feito o upload das imagens para images/portfolio. Todas as imagens com 400x400px
- Primeiro cadastrar categorias, imagens e descrições através do componente
- Depois configurar o módulo para exibir o portfolio

As descrições devem ser pequenas, com apenas o máximo de 70 caracteres.

Créditos neste componente:
Este componente foi criado tendo como base o com_clientes, que foi criado baseado no guestbook do Dan Rahmel em seu livro Joomla! Professional para Joomla 1.5.
Upload - http://www.codingcage.com/2014/12/simple-file-uploading-with-php.html

Esta versão do componente, como forma de aprender mais sobre a programação no Joomla, resolvi quebrar o único arquivo em vários arquivos, visto que o código tem essa característica. Ao invés de ter o switch inicial, o fluxo das informações será controlado diretamente através dos arquivos:
- ribafs_portfolio.php (ponto de entrada, que contém apenas o form do displayEntries)
- ribafs_portfoliodb.php (apenas o código do select do form acima)
- ribafs_portfolio_insert.php (código do form insertEntriy)
- ribafs_portfolio_insertdb.php (consulta do form acima)
- ribafs_portfolio_update.php (código do form updateEntry)
- ribafs_portfolio_updatedb.php (consulta do form acima)
- ribafs_portfolio_deletedb.php (consulta do botão delete no displayEntries)

A ideia foi aprender e simplificar manutenções, além de separar em duas camadas todas as etapas, em arquivos com o HTML e arquivos com o código PHP.
Cada etapa tem dois arquivos, um para a view/html e outro para o model/php/banco. 

Os arquivos sem db contém a parte da view/html e os com db são o model.
No componente original o displayEntries é o default chamado e dele se chama os demais.
Ainda criei mais um arquivo que foi o ribafs_portfoliodb.php, que contém apenas a consulta ao banco da função original displayEntries() e adicionarei um include para ele no ribafs_portfolio.php.


