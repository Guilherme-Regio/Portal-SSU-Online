<?php
session_start();
if (isset($_SESSION['user'])) :
	$table = 'tab_admissao';
	$primaryKey = 'id';
	$columns = array(
		array('db' => 'data_atual', 'dt' => 'data_atual'),
		array('db' => 'data_admissao',  'dt' => 'data_admissao'),
		array('db' => 'nome_colaborador',   'dt' => 'nome_colaborador'),
		array('db' => 'cargo',     'dt' => 'cargo'),
		array('db' => 'departamento',     'dt' => 'departamento'),
		array('db' => 'email_gestor',     'dt' => 'email_gestor'),
		array('db' => 'sri_equipamento',     'dt' => 'sri_equipamento'),
		array('db' => 'sistema_operacional',     'dt' => 'sistema_operacional'),
		array('db' => 'equipamento',     'dt' => 'equipamento'),
		array('db' => 'ativo',     'dt' => 'ativo'),
		array('db' => 'numero_serie',     'dt' => 'numero_serie'),
		array('db' => 'login_us',     'dt' => 'login_us'),
		array('db' => 'senha',     'dt' => 'senha'),
		array('db' => 'email',     'dt' => 'email'),
		array('db' => 'infomacao_adicional',     'dt' => 'infomacao_adicional'),
		array('db' => 'regime_contratacao',     'dt' => 'regime_contratacao'),
		array('db' => 'tipo_de_vaga',     'dt' => 'tipo_de_vaga'),
		array('db' => 'substituicao1_1',     'dt' => 'substituicao1_1'),
		array('db' => 'substituicao2_2',     'dt' => 'substituicao2_2'),
		array('db' => 'recolhimento1_1',     'dt' => 'recolhimento1_1'),
		array('db' => 'analista_rh',     'dt' => 'analista_rh'),
		array('db' => 'tipo_de_entrega',     'dt' => 'tipo_de_entrega'),
		array('db' => 'gestor',     'dt' => 'gestor'),
		array('db' => 'diretoria',     'dt' => 'diretoria'),
		array('db' => 'vp',     'dt' => 'vp'),
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
