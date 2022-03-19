<?php
$table = 'imagens';
$primaryKey = 'id';
$columns = array(
	array( 'db' => 'nome', 'dt' => 'nome' ),
	array( 'db' => 'departamento',  'dt' => 'departamento' ),
	array( 'db' => 'descricao',   'dt' => 'descricao' ),
	array( 'db' => 'versao',   'dt' => 'versao' ),
    array( 'db' => 'id',     'dt' => 'id' ),
	array( 'db' => 'download',     'dt' => 'download' ),

);
$sql_details = array(
	'user' => 'rdtechmaster',
	'pass' => 'n91sadmy#h@SUPy',
	'db'   => 'rdtech',
	'host' => 'localhost'
);
require ('ssp.class.php');
$where = "departamento = 'Farmacias'";
echo json_encode(
	SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);