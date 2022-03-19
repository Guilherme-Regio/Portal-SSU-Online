<?php
session_start();
?>
<?php
if(isset($_SESSION['user'])):
include("banco-acesso.php");
include("conecta.php");
$acess = $_SESSION['user'];
$acesso = "'".$acess."'";
if (verificarelatorio()){
};
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'relatorio.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td><b>status_equipamento</b></td>';
		$html .= '<td><b>localidade</b></td>';
		$html .= '<td><b>ativo</b></td>';
		$html .= '<td><b>numero_serie</b></td>';
		$html .= '<td><b>modelo_equipamento</b></td>';
        $html .= '<td><b>sistema_operacional</b></td>';
        $html .= '<td><b>processador</b></td>';
        $html .= '<td><b>data_aquisicao</b></td>';
        $html .= '<td><b>garantia_equipamento</b></td>';
        $html .= '<td><b>cpf_colaborador</b></td>';
        $html .= '<td><b>nome_colaborador</b></td>';
        $html .= '<td><b>departamento</b></td>';
        $html .= '<td><b>gestor</b></td>';
        $html .= '<td><b>diretoria</b></td>';
        $html .= '<td><b>vp</b></td>';
        $html .= '<td><b>mochila</b></td>';
        $html .= '<td><b>data_admissao</b></td>';
        $html .= '<td><b>regime_contratacao</b></td>';
        $html .= '<td><b>tipo_de_vaga</b></td>';
        $html .= '<td><b>observacao_dois</b></td>';
        $html .= '<td><b>analista_rh</b></td>';
        $html .= '<td><b>tipo_de_entrega</b></td>';
        $html .= '<td><b>endereco_colaborador</b></td>';
        $html .= '<td><b>data_desligamento</b></td>';
        $html .= '<td><b>observacao</b></td>';
        $html .= '<td><b>software_licenciado</b></td>';
        $html .= '<td><b>login</b></td>';
        $html .= '<td><b>senha</b></td>';
        $html .= '<td><b>analista_ssu</b></td>';
        $html .= '<td><b>data_criacao</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT * FROM lista_geral";
		$resultado_msg_contatos = mysqli_query($conexao , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["status_equipamento"].'</td>';
			$html .= '<td>'.$row_msg_contatos["localidade"].'</td>';
			$html .= '<td>'.$row_msg_contatos["ativo"].'</td>';
			$html .= '<td>'.$row_msg_contatos["numero_serie"].'</td>';
            $html .= '<td>'.$row_msg_contatos["modelo_equipamento"].'</td>';
            $html .= '<td>'.$row_msg_contatos["sistema_operacional"].'</td>';
            $html .= '<td>'.$row_msg_contatos["processador"].'</td>';
            $html .= '<td>'.$row_msg_contatos["data_aquisicao"].'</td>';
            $html .= '<td>'.$row_msg_contatos["garantia_equipamento"].'</td>';
            $html .= '<td>'.$row_msg_contatos["cpf_colaborador"].'</td>';
            $html .= '<td>'.$row_msg_contatos["nome_colaborador"].'</td>';
            $html .= '<td>'.$row_msg_contatos["departamento"].'</td>';
            $html .= '<td>'.$row_msg_contatos["gestor"].'</td>';
            $html .= '<td>'.$row_msg_contatos["diretoria"].'</td>';
            $html .= '<td>'.$row_msg_contatos["vp"].'</td>';
            $html .= '<td>'.$row_msg_contatos["mochila"].'</td>';
            $html .= '<td>'.$row_msg_contatos["data_admissao"].'</td>';
            $html .= '<td>'.$row_msg_contatos["regime_contratacao"].'</td>';
            $html .= '<td>'.$row_msg_contatos["tipo_de_vaga"].'</td>';
            $html .= '<td>'.$row_msg_contatos["observacao_dois"].'</td>';
            $html .= '<td>'.$row_msg_contatos["analista_rh"].'</td>';
            $html .= '<td>'.$row_msg_contatos["tipo_de_entrega"].'</td>';
            $html .= '<td>'.$row_msg_contatos["endereco_colaborador"].'</td>';
            $html .= '<td>'.$row_msg_contatos["data_desligamento"].'</td>';
            $html .= '<td>'.$row_msg_contatos["observacao"].'</td>';
            $html .= '<td>'.$row_msg_contatos["software_licenciado"].'</td>';
            $html .= '<td>'.$row_msg_contatos["login"].'</td>';
            $html .= '<td>'.$row_msg_contatos["senha"].'</td>';
            $html .= '<td>'.$row_msg_contatos["analista_ssu"].'</td>';
            $html .= '<td>'.$row_msg_contatos["data_criacao"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>
<?php

else:

    echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>