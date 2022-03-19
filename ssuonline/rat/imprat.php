<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
  include __DIR__ . "/../configuracoes/banco-acesso.php";
  include __DIR__ . "/../configuracoes/conecta.php";
  $acess = $_SESSION['user'];
  $acesso = "'" . $acess . "'";
  if (verificaImp()) {
  };
?>
  <?php
  include("banco-produto.php");

  $id = $_GET['id'];
  $result_dados = "SELECT * FROM lista_geral WHERE id='$id'";
  $resultado_dados = mysqli_query($conexao, $result_dados);
  $row_dados = mysqli_fetch_assoc($resultado_dados);

  ?>
  <!doctype html>
  <html lang="pt-BR">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/print.css">
    <title>SSU Online</title>
  </head>

  <body>
    <page size="A4">

      <button style="float: right;" onclick="window.print()">Imprimir</button>

      <div class="navbar-header"></div>
      <form id="form2" name="form2" method="POST" action="!#">
        <table class="tab_rat">

          <div class="centro_paragrafo" <p> <strong>RAT - Relatório de Atendimento Técnico - Raia Drogasil</strong></p>
          </div>
          <tr>
            <th width="698" bgcolor="#CCCCCC" scope="col">
              <div align="left"><em>1) Identificação:</em></div>
            </th>
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
            <td width="197"><input name="textfield" type="text" disabled="disabled" id="textfield" value="<?= ($agora) ?>"></td>
            <td width="145">Departamento</td>
            <td width="240"><input name="textfield2" type="text" disabled="disabled" id="textfield2" size="30" value="<?php echo ($row_dados['departamento']); ?>"></td>
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


        <table width="703" border="0">
          <tr>
            <th width="697" bgcolor="#CCCCCC" scope="col">
              <div align="left"><em>2) Check-list no laboratório</em></div>
            </th>
          </tr>
        </table>
        <table width="696" border="0">
          <tr>
            <td width="13">&nbsp;</td>
            <td width="25"><input name="checkbox" type="checkbox" id="checkbox" />
              <label class="label" for="checkbox"></label>
              <div align="justify"></div>
            </td>
            <td width="318"><label class="label" for="textfield">Foi Executado Atualizado S.O</label></td>
            <td width="20"><input name="checkbox9" type="checkbox" id="checkbox9" /></td>
            <td width="281">
              <p align="left">Termo Preenchido e Assinado</p>
            </td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox2" type="checkbox" id="checkbox2" /></td>
            <td>Orientação Sobre o Service Now</td>
            <td><input name="checkbox10" type="checkbox" id="checkbox10" /></td>
            <td>
              <div align="left">Orientação do Uso do OneDrive</div>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox3" type="checkbox" id="checkbox3" /></td>
            <td>Orientação Sobre a VPN</td>
            <td><input name="checkbox11" type="checkbox" id="checkbox11" /></td>
            <td>
              <div align="left">Domínio</div>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox4" type="checkbox" id="checkbox4" /></td>
            <td>Teams (Orientação)</td>
            <td><input name="checkbox12" type="checkbox" id="checkbox12" /></td>
            <td>
              <div align="left">Entregue Kit Admissional (Mochila)</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox5" type="checkbox" id="checkbox5" /></td>
            <td>Configurado Perfil do Usuário</td>
            <td><input name="checkbox13" type="checkbox" id="checkbox13" /></td>
            <td>
              <div align="left">Configurado Itunes</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox6" type="checkbox" id="checkbox6" /></td>
            <td>MFA</td>
            <td><input name="checkbox14" type="checkbox" id="checkbox14" /></td>
            <td>
              <div align="left">Impressora Cadastrada</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox7" type="checkbox" id="checkbox7" /></td>
            <td>Possui a Ultima Versão da Imagem</td>
            <td><input name="checkbox15" type="checkbox" id="checkbox15" /></td>
            <td>
              <div align="left">Testado Recebimento de E-mail</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td><input name="checkbox8" type="checkbox" id="checkbox8" /></td>
            <td>Wi-Fi Funcionando e Login em Cache</td>
            <td><input name="checkbox16" type="checkbox" id="checkbox16" /></td>
            <td>
              <div align="left">Antivírus</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
              <div align="left"></div>
            </td>
            <td>&nbsp;</td>


          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4">
              <div align="left">X________________________________________________________________</div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td colspan="4">
              <div align="left">Assinatura: </div>
            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>


            <td colspan="4"></br>
              <div align="left">Confirmo o recebimento do equipamento e estou ciente que as demais solicitações deverão ser encaminhadas ao setor responsável, ou efetuada a abertura de chamado através do Service Now.</div>
            </td>

            <td>&nbsp;</td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td colspan="4">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4">X________________________________________________________________</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4">
              <div align="left">Assinatura do Técnico</div>
            </td>
            <td>&nbsp;</td>
          </tr>




        </table>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

      </form>


  </body>

  </html>
<?php

else :

  echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

  exit();
endif;

?>