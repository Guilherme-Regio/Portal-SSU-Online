<?php
session_start();
?>
<?php
if (isset($_SESSION['user'])) :
  include __DIR__ . "/../configuracoes/banco-acesso.php";
  include __DIR__ . "/../configuracoes/conecta.php";
  $acess = $_SESSION['user'];
  $acesso = "'" . $acess . "'";
  if (verificaAdmissao()) {
  };
?>
  <?php
  ?>
  <div class="card text-center">
    <div class="card-header text-muted" style="background: #818896">
      Emissão de Nota
    </div>
    <div class="card-body">
      <!-- Cabeçalho da Tabela -->
      <table id="testeteste" class="display nowrap cell-border" style="width:100%">
        <thead>
          <tr>
            <th class="span12 text-center">Ações</th>
            <th>Nome do Colaborador</th>
            <th>Data de Admissão</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>CEP</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Equipamento</th>
            <th>Ativo</th>
            <th>Número de Série</th>
            <th>Valor</th>
            <th>Nota Fiscal</th>
            <th>Código de Rastreio</th>
            <th>Analista Responsável</th>
            <th>Chamado</th>
          </tr>
        </thead>
      </table>
      <br></br>
      <div class="card-footer text-muted" style="background: #818896">
        SSU Online
      </div>
    </div>
  </div>
  <?php include __DIR__ . "/../footer.php"; ?>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#testeteste').DataTable({
        'responsive': true,
        'scrollY': 430,
        'scrollX': true,
        'processing': true,
        'serverSide': true,
        'ajax': {
          "url": "objects.php"
        },
        'columns': [{
            data: 'id',
            render: function(data) {
              return '<a class="btn btn-primary" href="altera-form-nota.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>  <a class="btn btn-danger" href="delete_lista_nota.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/></svg></a>'
            }
          },
          {
            data: 'nome_colaborador'
          },
          {
            data: 'data_admissao'
          },
          {
            data: 'cpf_colaborador'
          },
          {
            data: 'rua'
          },
          {
            data: 'numero'
          },
          {
            data: 'complemento'
          },
          {
            data: 'cep'
          },
          {
            data: 'bairro'
          },
          {
            data: 'cidade'
          },
          {
            data: 'uf'
          },
          {
            data: 'equipamento'
          },
          {
            data: 'ativo'
          },
          {
            data: 'numero_serie'
          },
          {
            data: 'valor'
          },
          {
            data: 'nota_fiscal'
          },
          {
            data: 'codigo_rastreio'
          },
          {
            data: 'analista_rh'
          },
          {
            data: 'chamado'
          },
        ],
      });
    });
  </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
  <style type="text/css">
    div.dataTables_wrapper {
      width: auto;
      margin: auto;
    }
  </style>
<?php

else :

  echo  '<center><h3 class="h3"> ACESSO NEGADO, FAVOR EFETUAR LOGIN!!!</h3></center>';

  exit();
endif;

?>