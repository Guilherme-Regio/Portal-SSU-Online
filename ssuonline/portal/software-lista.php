<?php
session_start();
if (isset($_SESSION['user'])) :
?>
<?php
include __DIR__."/../configuracoes/banco-acesso.php";
include  __DIR__."/../configuracoes/conecta.php";
$acess = $_SESSION['user'];
$acesso = "'".$acess."'";
if (verificaRat()){
};
?>
<?php
if (verificaSoftwareApagar()){};
else :

	echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

	exit();
endif;
?>


