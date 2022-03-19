<?php
session_start();
include __DIR__ . "/../configuracoes/conecta.php";
include("banco-admissao.php");
$id = $_GET['id'];
if (removeNota($conexao, $id)) {
      header("Location: emissao.php");
} else {
      header("Location: emissao.php");
}
