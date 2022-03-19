<?php
session_start();
if (isset($_SESSION['user'])) :
    include __DIR__ . "/../configuracoes/banco-acesso.php";
    include __DIR__ . "/../configuracoes/conecta.php";
$acess = $_SESSION['user'];
$acesso = "'".$acess."'";
if (verificaImp()){
};
?>
<?php
      include("banco-produto.php");

$id = $_GET['id'];
$result_dados = "SELECT * FROM lista_geral WHERE id='$id'";
$resultado_dados = mysqli_query($conexao, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);

$mes = date('M');

$mes_extenso = array(
  'Jan' => 'Janeiro',
  'Feb' => 'Fevereiro',
  'Mar' => 'Marco',
  'Apr' => 'Abril',
  'May' => 'Maio',
  'Jun' => 'Junho',
  'Jul' => 'Julho',
  'Aug' => 'Agosto',
  'Nov' => 'Novembro',
  'Sep' => 'Setembro',
  'Oct' => 'Outubro',
  'Dec' => 'Dezembro'
);
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/print.css" >
    <title>SSU Online</title>
  </head>
  <body>
    <page size="A4">

        <button style="float: right;" onclick="window.print()">Imprimir</button>

        <div class="navbar-header"></div>
        <form id="form2" name="form2" method="POST" action="!#">
            <table class="tab_rat">

                <div class="centro_paragrafo"
                <p> <strong>RAT - Relatório de Atendimento Técnico - Raia Drogasil</strong></p>
                </div>
                <tr>
                    <th width="698" bgcolor="#CCCCCC" scope="col"><div align="left"><em>1) Identificação:</em></div></th>
                </tr>
            </table>
            <table width="705" border="0">
                <tr>
                    <td>Nome do Técnico</td>
                    <?php
                    $agora = date('d/m/Y');
                    ?>
                    <td colspan="3"><input name="nometec2" type="text" disabled="disabled" id="nometec3" size="88" value="<?php echo ($row_dados['analista_ssu']); ?>"></td>
                </tr>
                <tr>
                    <td width="96">Data Entrega</td>
                    <td width="197"><input name="textfield" type="text" disabled="disabled" id="textfield" value="<?=($agora)?>"></td>
                    <td width="145">Departamento</td>
                    <td width="240"><input name="textfield2" type="text" disabled="disabled" id="textfield2" size="30"  value="<?php echo ($row_dados['departamento']); ?>"></td>
                </tr>
                <tr>
                    <td>SRI</td>
                    <td><input name="textfield3" type="text" disabled="disabled" id="textfield3" value="<?php echo $row_dados['sri_equipamento']; ?>"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>ativo</td>
                    <td><input name="textfield4" type="text" disabled="disabled" id="textfield4" size="32" value="<?php echo $row_dados['ativo']; ?>"></td>
                    <td>Numero de Série</td>
                    <td><input name="textfield7" type="text" disabled="disabled" id="textfield7" size="30" value="<?php echo $row_dados['numero_serie']; ?>"></td>
                </tr>
                <tr>
                    <td>Marca/Modelo</td>
                    <td colspan="3"><input name="textfield5" type="text" disabled="disabled" id="textfield5" size="88" value="<?php echo $row_dados['modelo_equipamento']; ?>"></td>
                </tr>
                <tr>
                    <td>Versão do Office</td>
                    <td colspan="3"><input name="textfield6" type="text" disabled="disabled" id="textfield6" size="88" value="<?php echo $row_dados['versao_office']; ?>"></td>
                </tr>
                <tr>
                    <td>Nome do Funcionário</td>
                    <td colspan="3"><input name="nometec" type="text" disabled="disabled" id="nometec2" size="88" value="<?php echo ($row_dados['nome_colaborador']); ?>"></td>
                </tr>
            </table>
            </form>
    
   <div class="escrita_esquerda ">
<p style="font-weight: 400; text-align: center;"><strong>TERMO DE RESPONSABILIDADE</strong></p>
<p>Estou recebendo de RD S.A os equipamentos abaixo e comprometo-me a utilizar o EQUIPAMENTO, de propriedade de RD S.A., para uso estritamente profissional e estou ciente de que n&atilde;o devo instalar outros softwares com ou sem licen&ccedil;a de utiliza&ccedil;&atilde;o v&aacute;lida.</p>
<p>Estou ciente que a instala&ccedil;&atilde;o de softwares sem a licen&ccedil;a de utiliza&ccedil;&atilde;o original e que n&atilde;o seja obtido juntamente ao fornecedor ou revendedor autorizado, &eacute; crime previsto em nossa lei penal. Caso seja necess&aacute;ria a instala&ccedil;&atilde;o de outro software, estou ciente que deverei requerer junto &agrave; &Aacute;rea de Tecnologia da Informa&ccedil;&atilde;o da empresa a instala&ccedil;&atilde;o do mesmo, que avaliar&aacute; a possibilidade e a disponibilidade para a instala&ccedil;&atilde;o do software requisitado.&nbsp;</p>
<p>Declaro que a posse e a utiliza&ccedil;&atilde;o do EQUIPAMENTO s&atilde;o de minha inteira responsabilidade.</p>
<p>Estou ciente de que a RD S.A poder&aacute;, a seu exclusivo crit&eacute;rio, solicitar-me a devolu&ccedil;&atilde;o do equipamento a qualquer momento durante a vig&ecirc;ncia do meu contrato de trabalho, ou em caso de mudan&ccedil;a de minha atual fun&ccedil;&atilde;o, ou quando finda ou rescindida a rela&ccedil;&atilde;o de emprego, ou ainda se descumprida qualquer das obriga&ccedil;&otilde;es aqui previstas. Nestes casos, obrigo-me a proceder &agrave; devolu&ccedil;&atilde;o incontinente do aparelho em perfeito estado de conserva&ccedil;&atilde;o e funcionamento &agrave; RD S.A.; t&atilde;o logo seja solicitado. No caso de devolu&ccedil;&atilde;o do EQUIPAMENTO danificado, ou na impossibilidade de devolv&ecirc;-lo por perda, autorizo o desconto do correspondente valor em Folha de Pagamento.</p>
<p>&nbsp;Considerando as condi&ccedil;&otilde;es que me foram oferecidas, obrigo-me a:</p>
<p>&nbsp;(I) Assumir com exclusividade a guarda e a correta utiliza&ccedil;&atilde;o do referido EQUIPAMENTO, respondendo pelos defeitos decorrentes do uso inadequado, pela perda do mesmo;(II) A comunicar &agrave; RD S.A qualquer avaria defeito, perda, furto ou roubo do EQUIPAMENTO imediatamente ao ocorrido, para ado&ccedil;&atilde;o das provid&ecirc;ncias necess&aacute;rias;(III) Pagar ou reembolsar &agrave; RD S.A os valores correspondentes ao conserto do EQUIPAMENTO, em casos de defeito provocados pelo uso incorreto do mesmo e/ou reposi&ccedil;&atilde;o do aparelho em caso de perda.(IV) Autorizar, em caso de rescis&atilde;o do meu contrato de trabalho, o desconto em folha de pagamento dos valores previstos no item (III) ap&oacute;s a apresenta&ccedil;&atilde;o da nota fiscal correspondente ao conserto ou compra, a t&iacute;tulo de ressarcimento caso a RD S.A efetue esses pagamentos;(V) N&atilde;o instalar outros softwares no equipamento sem pr&eacute;vio requerimento junto &agrave; &Aacute;rea de Tecnologia da Informa&ccedil;&atilde;o, mesmo que se tenha licen&ccedil;a de utiliza&ccedil;&atilde;o original;(VI) Responder, civil e criminalmente, pela instala&ccedil;&atilde;o de softwares considerados irregulares;(VII) Ressarcir a RD S.A os desembolsos e preju&iacute;zos causados pela instala&ccedil;&atilde;o de softwares irregulares ou softwares instalados sem autoriza&ccedil;&atilde;o expressa da RD S.A.;(VIII) N&atilde;o utilizar o equipamento para il&iacute;citos civis e criminais;(IX) N&atilde;o acessar sites que n&atilde;o sejam relacionados com o servi&ccedil;o a ser prestado, assim como n&atilde;o efetuar uploads/downloads de outros aplicativos, como m&uacute;sica, v&iacute;deo, etc., que n&atilde;o estejam vinculados com o servi&ccedil;o a ser prestado.</p>
<div>&nbsp;</div>
<div>
<p><strong>Este Termo de Responsabilidade substitui qualquer outro anteriormente firmado.</strong></p>



<p><strong>EQUIPAMENTOS:</strong></p>
<p><strong>01 <?php echo $row_dados['modelo_equipamento']; ?></strong></p>
<p><strong>Numero de s&eacute;rie: <?php echo $row_dados['numero_serie']; ?> ativo: <?php echo $row_dados['ativo']; ?></strong></p>
<p><strong>S&atilde;o Paulo,<?php echo date('d')?> de <?php echo $mes_extenso["$mes"]?>  <?php echo date('Y');?></strong></p>
<p><strong>________________________________________________________</strong></p>
<p><strong>Nome do Funcion&aacute;rio: <?php echo ($row_dados['nome_colaborador']); ?> Departamento : <?php echo ($row_dados['departamento']); ?></strong></p>


<p><strong>________________________________________________________</strong></p>
<p><strong>Nome do Ténico: <?php echo ($row_dados['analista_ssu']); ?></p>
</div>

</html>
<?php

else:

  echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

    exit();
endif;

?>