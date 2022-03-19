<?php
if (isset($_SESSION['user'])) :
function updateSoftware($conexao, $software_alterar, $tipo_de_licenciamento_alterar, $qtd_usada_alterar, $qtd_pedida_alterar, $qtd_fornecida_alterar, $key_user_alterar, $gerente_alterar, $vp_alterar, $valor_alterar, $descricao_alterar, $id)
{
    $query = "UPDATE software SET escopo='$software_alterar', tipo_de_licenciamento='$tipo_de_licenciamento_alterar', qtd_usada='$qtd_usada_alterar', qtd_pedida='$qtd_pedida_alterar', qtd_fornecida='$qtd_fornecida_alterar', key_user='$key_user_alterar', gerente='$gerente_alterar', vp='$vp_alterar', valor='$valor_alterar', descricao='$descricao_alterar' WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}
function buscaSoftware($conexao, $id) {
    $query ="SELECT * FROM software where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
else :

	echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

	exit();
endif;