<?php
session_start();
if (isset($_SESSION['user'])) :
	$table = 'lista_geral';
	$primaryKey = 'id';
	$columns = array(
		array('db' => 'data_criacao', 'dt' => 'data_criacao'),
		array('db' => 'status_equipamento',  'dt' => 'status_equipamento'),
		array('db' => 'localidade',   'dt' => 'localidade'),
		array('db' => 'ativo',     'dt' => 'ativo'),
		array('db' => 'numero_serie',     'dt' => 'numero_serie'),
		array('db' => 'nome_colaborador',     'dt' => 'nome_colaborador'),
		array('db' => 'departamento',     'dt' => 'departamento'),
		array('db' => 'id',     'dt' => 'id'),

	);
	$sql_details = array(
		'user' => 'rdtechmaster',
		'pass' => 'n91sadmy#h@SUPy',
		'db'   => 'rdtech',
		'host' => 'localhost'
	);
	require __DIR__ . '/../configuracoes/ssp.class.php';

	echo json_encode(
		SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
	);

else :

	echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

	exit();
endif;
