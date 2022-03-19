<?php
function listaEstoque($conexao) {
    $lista_geral = array();
    $resultado = mysqli_query($conexao, "select * from lista_geral");


    while($Estoque = mysqli_fetch_assoc($resultado)) {
        array_push($lista_geral, $Estoque);
    }
    return $lista_geral;
}
function insereEstoque($conexao, $Status, $localidade, $ativo, $Serie, $Modelo, $Sistema, $processador, $Data_Aquisicao, $Garantia_do_Equipamento, $Nota, $Tecnico) {
    $query = "insert into lista_geral (status_equipamento, localidade, ativo, numero_serie, modelo_equipamento, sistema_operacional, processador, data_aquisicao, garantia_equipamento, nota_fiscal_equipamento, analista_ssu) 
    values ('{$Status}','{$localidade}','{$ativo}','{$Serie}','{$Modelo}','{$Sistema}','{$processador}','{$Data_Aquisicao}','{$Garantia_do_Equipamento}','{$Nota}','{$Tecnico}')";
    return mysqli_query($conexao, $query);
}
function buscaDescarte($conexao, $id) {
    $query ="SELECT * FROM lista_geral where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
function removeDescarte($conexao, $id) {
    $query = "delete from lista_geral where id = {$id}";
    return mysqli_query($conexao, $query);
}
