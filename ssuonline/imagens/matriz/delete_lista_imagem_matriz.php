<?php
session_start();
include ("banco_imagem.php");
include __DIR__ . "/../../configuracoes/conecta.php";
$id = $_GET['id'];
if (removeImagem($conexao, $id)) {
      header("Location: listar-matriz.php");
} else {
      header("Location: listar-matriz.php");
}
