<?php
session_start(); 
include __DIR__."/../configuracoes/conecta.php";
include("banco-admissao.php");
$id = $_GET['id'];
if(removeAdmissao($conexao, $id)){
      header("Location: admissao-lista.php");
}else{
      header("Location: admissao-lista.php");
}