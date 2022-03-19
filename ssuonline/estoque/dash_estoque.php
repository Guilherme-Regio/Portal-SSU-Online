<?php
session_start();
?>
<?php
if(isset($_SESSION['user'])):
include("banco-acesso.php");
include("conecta.php");
$acess = $_SESSION['user'];
$acesso = "'".$acess."'";
if (verificaEstoque()){
};
?>
<iframe title="DashEstoquerat - Página 1" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=dad65f96-60c0-41e9-8ea7-4564281795a0&autoAuth=true&ctid=81a2db7b-b536-4905-a47b-6d892bd2f210&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLWJyYXppbC1zb3V0aC1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldC8ifQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
<?php include("footer.php"); ?>
<?php

else:

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>
