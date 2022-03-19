<?php
if (isset($_SESSION['user'])) :
    ini_set('default_charset', 'UTF-8');
?>
<?php

    function listaControle($conexao)
    {
        $lista_geral = array();
        $resultado = mysqli_query($conexao, "select * from lista_geral");

        while ($produtogeral = mysqli_fetch_assoc($resultado)) {
            array_push($lista_geral, $produtogeral);
        }
        return $lista_geral;
    }

    function atualizarControle(
        $conexao,
        $status_equipamento_alt,
        $localidade_alt,
        $nome_colaborador_alt,
        $cpf_colaborador_alt,
        $cargo_alt,
        $departamento_alt,
        $gestor_alt,
        $diretoria_alt,
        $vp_alt,
        $mochila_alt,
        $analista_rh_alt,
        $data_admissao_alt,
        $regime_contratacao_alt,
        $tipo_de_vaga_alt,
        $software_licenciado_alt,
        $analista_ssu_atual_alt,
        $versao_office_alt,
        $licenca_office_alt,
        $observacao,
        $dataop,
        $endereco_colaborador,
        $id
    ) {
        $query = "UPDATE lista_geral SET status_equipamento='$status_equipamento_alt', localidade='$localidade_alt', nome_colaborador='$nome_colaborador_alt', cpf_colaborador='$cpf_colaborador_alt', cargo='$cargo_alt', departamento='$departamento_alt', 
    gestor='$gestor_alt', diretoria='$diretoria_alt', vp='$vp_alt', mochila='$mochila_alt', analista_rh='$analista_rh_alt', data_admissao='$data_admissao_alt', regime_contratacao='$regime_contratacao_alt', tipo_de_vaga='$tipo_de_vaga_alt', 
    software_licenciado='$software_licenciado_alt', analista_ssu='$analista_ssu_atual_alt', versao_office='$versao_office_alt', licenca_office='$licenca_office_alt', observacao='$observacao', data_criacao='$dataop', endereco_colaborador='$endereco_colaborador' WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function buscaControle($conexao, $id)
    {
        $query = "SELECT * FROM lista_geral where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    function buscaPrint($conexao, $id)
    {
        $query = "SELECT nome FROM lista_geral where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return;
    }
    function removeRat($conexao, $id)
    {
        $query = "DELETE FROM lista_geral where id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function inseriHistorico($conexao, $nome_colaborador_alt, $analista_ssu_atual_alt, $dataop, $ativo_alt)
    {
        $query = "INSERT INTO desligados (nome, analista, dataop, ativo)
    values ('{$nome_colaborador_alt}','{$analista_ssu_atual_alt}','{$dataop}','{$ativo_alt}')";
        return mysqli_query($conexao, $query);
    }
    function listaHistorico($conexao, $ativo)
    {
        $produtos = array();
        $resultado = mysqli_query($conexao, "SELECT * FROM desligados WHERE ativo = {$ativo}");
        while ($produto = mysqli_fetch_assoc($resultado)) {
            array_push($produtos, $produto);
        };
        return $produtos;
    };
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
