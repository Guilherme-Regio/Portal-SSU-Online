<?php
session_start();
if (isset($_SESSION['user'])) :
$table = 'emissao';
$primaryKey = 'id';
$columns = array(
	array( 'db' => 'nome_colaborador', 'dt' => 'nome_colaborador' ),
	array( 'db' => 'data_admissao',  'dt' => 'data_admissao' ),
	array( 'db' => 'cpf_colaborador',   'dt' => 'cpf_colaborador' ),
	array( 'db' => 'rua',     'dt' => 'rua' ),
    array( 'db' => 'numero',     'dt' => 'numero' ),
    array( 'db' => 'complemento',     'dt' => 'complemento' ),
    array( 'db' => 'cep',     'dt' => 'cep' ),
	array( 'db' => 'bairro',     'dt' => 'bairro' ),
	array( 'db' => 'cidade',     'dt' => 'cidade' ),
	array( 'db' => 'uf',     'dt' => 'uf' ),
	array( 'db' => 'equipamento',     'dt' => 'equipamento' ),
	array( 'db' => 'ativo',     'dt' => 'ativo' ),
	array( 'db' => 'numero_serie',     'dt' => 'numero_serie' ),
	array( 'db' => 'valor',     'dt' => 'valor' ),
	array( 'db' => 'nota_fiscal',     'dt' => 'nota_fiscal' ),
	array( 'db' => 'codigo_rastreio',     'dt' => 'codigo_rastreio' ),
	array( 'db' => 'analista_rh',     'dt' => 'analista_rh' ),
	array( 'db' => 'chamado',     'dt' => 'chamado' ),
    array( 'db' => 'id',     'dt' => 'id' ),

);

$sql_details = array(
	'user' => 'rdtechmaster',
	'pass' => 'n91sadmy#h@SUPy',
	'db'   => 'rdtech',
	'host' => 'localhost'
);

require __DIR__.'/../configuracoes/ssp.class.php';

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
else :

	echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

	exit();
endif;
