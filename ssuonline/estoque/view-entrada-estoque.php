<?php include("header.php");
      include("conecta.php");
      include("banco-Estoque.php"); ?>


<?php

$nome = $_POST['nome'];
$depart = $_POST['depart'];
$sri = $_POST['sri'];
$equip = $_POST['equip'];
$atEquip = $_POST['atEquip'];
$numSerEquip = $_POST['numSerEquip'];
$atMon = $_POST['atMon'];
$numSerMon = $_POST['numSerMon'];
$off = $_POST['off'];
$licOff = $_POST['licOff'];
$os = $_POST['os'];
$tec = $_POST['tec'];
$atividade = $_POST['atividade'];
$dataop = date('Y-m-d'); 


if(alteraProduto($conexao, $nome, $depart, $sri, $equip, $atEquip, $numSerEquip, $atMon,
 $numSerMon, $off, $licOff, $os, $tec, $atividade, $dataop)) { ?>
    <p class="text-success">O equipamento do usuario <?= $nome; ?>, do <?= $depart; ?>  foi adicionado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O equipamento <?= $atEquip; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php include("footer.php"); ?>