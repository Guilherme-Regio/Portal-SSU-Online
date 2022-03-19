<?php
session_start();
if (isset($_SESSION['user'])) :
	$table = 'software';

	// Table's primary key
	$primaryKey = 'id';

	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case object
	// parameter names
	$columns = array(
		array('db' => 'escopo', 'dt' => 'escopo'),
		array('db' => 'tipo_de_licenciamento',  'dt' => 'tipo_de_licenciamento'),
		array('db' => 'qtd_usada',   'dt' => 'qtd_usada'),
		array('db' => 'qtd_pedida',   'dt' => 'qtd_pedida'),
		array('db' => 'qtd_fornecida',   'dt' => 'qtd_fornecida'),
		array('db' => 'calculo',   'dt' => 'calculo'),
		array('db' => 'key_user',   'dt' => 'key_user'),
		array('db' => 'gerente',     'dt' => 'gerente'),
		array('db' => 'vp',     'dt' => 'vp'),
		array('db' => 'valor',     'dt' => 'valor'),
		array('db' => 'id',     'dt' => 'id'),
		array('db' => 'descricao',     'dt' => 'descricao'),
	);

	// SQL server connection information
	$sql_details = array(
		'user' => 'rdtechmaster',
		'pass' => 'n91sadmy#h@SUPy',
		'db'   => 'rdtech',
		'host' => 'localhost'
	);


	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

	require __DIR__ . '/../configuracoes/ssp.class.php';

	echo json_encode(
		SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
	);
else :

	echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

	exit();
endif;
