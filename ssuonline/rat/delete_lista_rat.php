<?php
session_start();
include("banco-produto.php");
include __DIR__ . "/../configuracoes/conecta.php";
$id = $_GET['id'];
if (removeRat($conexao, $id)) {
      header("Location: produto-lista.php");
} else {
      header("Location: produto-lista.php");
}
