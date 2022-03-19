<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])):
include __DIR__."/../../configuracoes/banco-acesso.php";
include __DIR__."/../../configuracoes/conecta.php";
$acess = $_SESSION['user'];
$acesso = "'".$acess."'";
if (verificaImagens()){
};
?>
<?php
imagemloja();
?>
<?php

else:

  echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>
