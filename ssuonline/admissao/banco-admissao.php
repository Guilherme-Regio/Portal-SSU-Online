<?php
if (isset($_SESSION['user'])) :
    function listaLicencas($conexao)
    {
        $tab_admissao = array();
        $resultado = mysqli_query($conexao, "select * from tab_admissao ");


        while ($licencas = mysqli_fetch_assoc($resultado)) {
            array_push($tab_admissao, $licencas);
        }
        return $tab_admissao;
    }
    function insereLicencas($conexao, $nome_colaborador, $cpf_colaborador, $cargo, $departamento, $gestor, $email_gestor, $vp, $diretoria, $data_admissao, $regime_contratacao, $analista_rh, $matricula, $tipo_de_entrega, $cep, $uf, $cidade, $bairro, $rua, $numero, $complemento, $sri_equipamento, $sistema_operacional, $infomacao_adicional, $tipo_de_vaga, $substituicao1_1, $substituicao2_2, $efetivacao1_1, $movimentacao1_1, $temporario1_1, $substituicao_loop_loop, $status, $data_atual)
    {
        $query = "insert into tab_admissao (nome_colaborador, cpf_colaborador, cargo, departamento, gestor, email_gestor, vp, diretoria, data_admissao, regime_contratacao, analista_rh, matricula, tipo_de_entrega, cep, uf, cidade, bairro, rua, numero, complemento, sri_equipamento, sistema_operacional, infomacao_adicional, tipo_de_vaga, substituicao1_1, substituicao2_2, efetivacao1_1, movimentacao1_1, temporario1_1, substituicao_loop_loop, status, data_atual) 
    values ('{$nome_colaborador}','{$cpf_colaborador}','{$cargo}','{$departamento}','{$gestor}','{$email_gestor}','{$vp}','{$diretoria}','{$data_admissao}','{$regime_contratacao}','{$analista_rh}','{$matricula}','{$tipo_de_entrega}','{$cep}','{$uf}','{$cidade}','{$bairro}','{$rua}','{$numero}','{$complemento}','{$sri_equipamento}','{$sistema_operacional}','{$infomacao_adicional}','{$tipo_de_vaga}','{$substituicao1_1}','{$substituicao2_2}','{$efetivacao1_1}','{$movimentacao1_1}','{$temporario1_1}','{$substituicao_loop_loop}','{$status}','{$data_atual}')";
        return mysqli_query($conexao, $query);
    }
    function buscaAdmissao($conexao, $id)
    {
        $query = "SELECT * FROM tab_admissao where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    function buscaNota($conexao, $id)
    {
        $query = "SELECT * FROM emissao where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    function atualizaNota(
        $conexao,
        $nome_colaborador_alt,
        $data_admissao_alt,
        $cpf_colaborador_alt,
        $rua_alt,
        $numero_alt,
        $complemento_alt,
        $cep_alt,
        $bairro_alt,
        $cidade_alt,
        $uf_alt,
        $equipamento_alt,
        $ativo_alt,
        $numero_serie_alt,
        $valor_alt,
        $nota_fiscal_alt,
        $codigo_rastreio_alt,
        $analista_rh_alt,
        $chamado_alt,
        $id
    ) {
        $query = "UPDATE emissao SET nome_colaborador='$nome_colaborador_alt', data_admissao='$data_admissao_alt', cpf_colaborador='$cpf_colaborador_alt', rua='$rua_alt', numero='$numero_alt', complemento='$complemento_alt', cep='$cep_alt', bairro='$bairro_alt', 
    cidade='$cidade_alt', uf='$uf_alt', equipamento='$equipamento_alt', ativo='$ativo_alt', numero_serie='$numero_serie_alt', valor='$valor_alt', nota_fiscal='$nota_fiscal_alt', codigo_rastreio='$codigo_rastreio_alt', analista_rh='$analista_rh_alt', chamado='$chamado_alt'WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function atualizaAtivo($conexao, $nome_colaborador_alt, $ativo_alt, $numero_serie_alt)
    {
        $query = "UPDATE emissao SET ativo='$ativo_alt', numero_serie='$numero_serie_alt' WHERE nome_colaborador LIKE '$nome_colaborador_alt'";
        return mysqli_query($conexao, $query);
    }
    function insereRat($conexao, $status_equipamento, $nome_colaborador_alt, $cpf_colaborador_alt, $cargo_alt, $departamento_alt, $gestor_alt, $diretoria_alt, $vp_alt, $analista_rh_alt, $data_admissao_alt, $regime_contratacao_alt, $tipo_de_entrega_alt, $tipo_de_vaga_alt, $endereco_alt, $ativo_alt)
    {
        $query = "UPDATE lista_geral SET status_equipamento='$status_equipamento', nome_colaborador='$nome_colaborador_alt', cpf_colaborador='$cpf_colaborador_alt', cargo='$cargo_alt', departamento='$departamento_alt', 
    gestor='$gestor_alt', diretoria='$diretoria_alt', vp='$vp_alt', analista_rh='$analista_rh_alt', data_admissao='$data_admissao_alt', regime_contratacao='$regime_contratacao_alt', tipo_de_entrega='$tipo_de_entrega_alt', tipo_de_vaga='$tipo_de_vaga_alt', 
    endereco_colaborador='$endereco_alt' WHERE ativo = {$ativo_alt}";
        return mysqli_query($conexao, $query);
    }
    function insereAdmissao(
        $conexao,
        $status_alt,
        $nome_colaborador_alt,
        $cpf_colaborador_alt,
        $cargo_alt,
        $email_gestor_alt,
        $departamento_alt,
        $gestor_alt,
        $diretoria_alt,
        $vp_alt,
        $analista_rh_alt,
        $data_admissao_alt,
        $matricula_alt,
        $regime_contratacao_alt,
        $tipo_de_entrega_alt,
        $tipo_de_vaga_alt,
        $ativo_alt,
        $numero_serie_alt,
        $cep_alt,
        $uf_alt,
        $cidade_alt,
        $bairro_alt,
        $rua_alt,
        $numero_alt,
        $complemento_alt,
        $sri_equipamento_alt,
        $sistema_operacional_alt,
        $infomacao_adicional_alt,
        $login_alt,
        $senha_alt,
        $email_alt,
        $substituicao1_1_alt,
        $substituicao2_2_alt,
        $recolhimento1_1_alt,
        $id
    ) {
        $query = "UPDATE tab_admissao SET status_equipamento='$status_alt', nome_colaborador='$nome_colaborador_alt', cpf_colaborador='$cpf_colaborador_alt', cargo='$cargo_alt', departamento='$departamento_alt', 
    gestor='$gestor_alt', email_gestor='$email_gestor_alt', diretoria='$diretoria_alt', vp='$vp_alt', analista_rh='$analista_rh_alt', data_admissao='$data_admissao_alt', matricula='$matricula_alt', regime_contratacao='$regime_contratacao_alt', 
    tipo_de_entrega='$tipo_de_entrega_alt', tipo_de_vaga='$tipo_de_vaga_alt', ativo='$ativo_alt', numero_serie='$numero_serie_alt', cep='$cep_alt', uf='$uf_alt', cidade='$cidade_alt', bairro='$bairro_alt', rua='$rua_alt', 
    numero='$numero_alt', complemento='$complemento_alt', sri_equipamento='$sri_equipamento_alt', sistema_operacional='$sistema_operacional_alt', infomacao_adicional='$infomacao_adicional_alt', login_us='$login_alt', senha='$senha_alt', email='$email_alt', 
    substituicao1_1='$substituicao1_1_alt', substituicao2_2='$substituicao2_2_alt', recolhimento1_1='$recolhimento1_1_alt'  WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function insereNota($conexao, $nome_colaborador, $data_admissao, $cpf_colaborador, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $analista_rh)
    {
        $query = "insert into emissao (nome_colaborador, data_admissao, cpf_colaborador, rua, numero, complemento, cep, bairro, cidade, uf, analista_rh) 
    values ('{$nome_colaborador}','{$data_admissao}','{$cpf_colaborador}','{$rua}','{$numero}','{$complemento}','{$cep}','{$bairro}','{$cidade}','{$uf}','{$analista_rh}')";
        return mysqli_query($conexao, $query);
    }
    function buscaAtivo($conexao, $ativo_alt)
    {
        $query = "SELECT ativo FROM lista_geral where ativo = {$ativo_alt}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    function removeAdmissao($conexao, $id)
    {
        $query = "DELETE from tab_admissao where id = {$id}";
        return mysqli_query($conexao, $query);
    }
    function removeNota($conexao, $id)
    {
        $query = "DELETE from emissao where id = {$id}";
        return mysqli_query($conexao, $query);
    }
else :

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;
