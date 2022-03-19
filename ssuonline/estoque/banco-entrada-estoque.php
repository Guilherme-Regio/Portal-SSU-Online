<?php
if (isset($_SESSION['user'])) :
function listaEstoque($conexao) {
    $lista_geral = array();
    $resultado = mysqli_query($conexao, "select * from lista_geral");


    while($Estoque = mysqli_fetch_assoc($resultado)) {
        array_push($lista_geral, $Estoque);
    }
    return $lista_geral;
}
function insereEstoque($conexao, $status_equipamento, $localidade, $ativo, $numero_serie, $modelo_equipamento, $sistema_operacional, $processador, $data_aquisicao, $garantia_equipamento, $nota_fiscal_equipamento, $analista_ssu) {
    $query = "insert into lista_geral (status_equipamento, localidade, ativo, numero_serie, modelo_equipamento, sistema_operacional, processador, data_aquisicao, garantia_equipamento, nota_fiscal_equipamento, analista_ssu) 
    values ('{$status_equipamento}','{$localidade}','{$ativo}','{$numero_serie}','{$modelo_equipamento}','{$sistema_operacional}','{$processador}','{$data_aquisicao}','{$garantia_equipamento}','{$nota_fiscal_equipamento}','{$analista_ssu}')";
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
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
