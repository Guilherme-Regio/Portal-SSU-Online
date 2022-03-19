<?php
function editImagem()
{
    if ($_SESSION['nick'] === 'Usuario_ADM_AD' or $_SESSION['nick'] === 'Sub_Usuario_ADM_AD'){
    header("Content-type: text/html; charset=utf-8", true);
    setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
    <?php
    include __DIR__ . "/../configuracoes/banco-view.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    ?>
    <!-- JS  -->
    <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
    <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
    <!-- CS  -->
    <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="/bibliotecas/css/teste.css">
    <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SSU Online</title>
    </head>
    <script>
        jQuery(function($) {

            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });




        });
    </script>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="https://ssuonline/home.php">SSU Online</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?php echo $_SESSION["nick"] ?>
                            </span>
                            <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <!-- sidebar-header  -->
                    <div class="sidebar-search">
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control search-menu" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <?php verificaAcessoRat() ?>
                            <?php verificaAcessoAdmissao() ?>
                            <?php verificaAcessoEstoque() ?>
                            <?php verificaAcessoImagens() ?>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-sticky-note"></i>
                                    <span>Procedimentos</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="#">Matriz</a>
                                        </li>
                                        <li>
                                            <a href="#">Lojas</a>
                                        </li>
                                        <li>
                                            <a href="#">CDs</a>
                                        </li>
                                        <li>
                                            <a href="#">Geral</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-menu">
                                <span>Extra</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Documentação</span>
                                    <span class="badge badge-pill badge-primary">Beta</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                    <span>Softwares</span>
                                </a>
                            </li>
                            <?php verificaAcessoScripts() ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-signal"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="/configuracoes/sair.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <?php
    }
}
function addimagem()
{
    header("Content-type: text/html; charset=utf-8", true);
    setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
    <?php
    include __DIR__ . "/../configuracoes/banco-view.php";
    include __DIR__ . "/../configuracoes/conecta.php";
    ?>
    <!-- JS  -->
    <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
    <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
    <!-- CS  -->
    <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="/bibliotecas/css/teste.css">
    <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SSU Online</title>
    </head>
    <script>
        jQuery(function($) {

            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });




        });
    </script>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="https://ssuonline/home.php">SSU Online</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?php echo $_SESSION["nick"] ?>
                            </span>
                            <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <!-- sidebar-header  -->
                    <div class="sidebar-search">
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control search-menu" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <?php verificaAcessoRat() ?>
                            <?php verificaAcessoAdmissao() ?>
                            <?php verificaAcessoEstoque() ?>
                            <?php verificaAcessoImagens() ?>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-sticky-note"></i>
                                    <span>Procedimentos</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="#">Matriz</a>
                                        </li>
                                        <li>
                                            <a href="#">Lojas</a>
                                        </li>
                                        <li>
                                            <a href="#">CDs</a>
                                        </li>
                                        <li>
                                            <a href="#">Geral</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-menu">
                                <span>Extra</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Documentação</span>
                                    <span class="badge badge-pill badge-primary">Beta</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                    <span>Softwares</span>
                                </a>
                            </li>
                            <?php verificaAcessoScripts() ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-signal"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="/configuracoes/sair.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <?php
                }
                function imagemloja()
                {
                    if ($_SESSION['nick'] === 'Usuario_ADM_AD' or $_SESSION['nick'] === 'Sub_Usuario_ADM_AD') { ?>
                        <div class="card">
                            <div class="card-header text-muted" style="background: #818896">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#staticBackdrop" data-tt="tooltip" data-placement="bottom" title="Upload de Imagem" style="background: #818896; color: #ffffff; border:#818896">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z" />
                                        <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="imagem-matriz" class="display nowrap cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="span12 text-center">Download</th>
                                            <th class="span12 text-center">Ações</th>
                                            <th>Nome da Imagem</th>
                                            <th>Versão</th>
                                            <th>Setor</th>
                                            <th>Descrição</th>
                                        </tr>
                                    </thead>
                                </table>
                                <br></br>
                                <div class="card-footer text-muted text-center" style="background: #818896">
                                    SSU Online
                                </div>
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Adicionar Imagem</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body ">
                                                <form accept-charset="utf-8" class="display nowrap" action="insere_imagem.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 char">
                                                            <label class="label" for="nome_imagem">Nome da Imagem</label>
                                                            <input accept-charset="utf-8" class="form-control" type="text" id="nome_imagem" placeholder="Nome da Imagem" name="nome_imagem" required>
                                                        </div>
                                                        <div class="form-group col-md-12 char">
                                                            <label class="label" for="departamento" style="font-weight:bold;">Departamento</label>
                                                            <select type="text" name="departamento" class="form-control" id="departamento" placeholder="Departamento" required>
                                                                <option>Matriz - SSU</option>
                                                                <option>Farmacias</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12 char">
                                                            <label class="label" for="descricao_img" style="font-weight:bold;">Descrição</label>
                                                            <input accept-charset="utf-8" class="form-control" type="text" id="descricao_img" placeholder="Nome da Imagem" name="descricao_img" required>
                                                        </div>
                                                        <div class="form-group col-md-12 char">
                                                            <label class="label" for="versao" style="font-weight:bold;">Versão</label>
                                                            <input accept-charset="utf-8" class="form-control" type="text" id="versao" placeholder="Versão da Imagem" name="versao" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <input type="file" name="arquivo">
                                                        </div>
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button onclick="enviar()" class="btn btn-primary" type="submit" data-tt="tooltip" data-placement="bottom" title="Enviar" style="background: #3a3f48; border-color:#3a3f48;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include __DIR__ . "/../footer.php"; ?>
                            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    var table = $('#imagem-matriz').DataTable({
                                        'responsive': true,
                                        'scrollY': 430,
                                        'scrollX': true,
                                        'processing': true,
                                        'serverSide': true,
                                        'ajax': {
                                            "url": "objects.php"
                                        },
                                        'columns': [{
                                                data: 'download',
                                                render: function(data) {
                                                    return '<a class="btn btn-primary" href="' + data + '" download>Download</a>'
                                                }
                                            },
                                            {
                                                data: 'id',
                                                render: function(data) {
                                                    return '<a class="btn btn-primary" href="/configuracoes/altera_form_imagens_l.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>  <a class="btn btn-danger" href="delete_lista_imagem_loja.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></a>'
                                                }
                                            },
                                            {
                                                data: 'nome'
                                            },
                                            {
                                                data: 'versao'
                                            },
                                            {
                                                data: 'departamento'
                                            },
                                            {
                                                data: 'descricao'
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
                    } elseif (in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                            <div class="card text-center">
                                <div class="card-header text-muted" style="background: #818896">
                                    Imagens
                                </div>
                                <div class="card-body">
                                    <table id="imagem-matriz" class="display nowrap cell-border" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="span12 text-center">Ações</th>
                                                <th>Nome da Imagem</th>
                                                <th>Versão</th>
                                                <th>Setor</th>
                                                <th>Descrição</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br></br>
                                    <div class="card-footer text-muted" style="background: #818896">
                                        SSU Online
                                    </div>
                                </div>
                                <?php include __DIR__ . "/../footer.php"; ?>
                                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var table = $('#imagem-matriz').DataTable({
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
                                                        return '<a class="btn btn-primary" href="' + data + '" download>Download</a>'
                                                    }
                                                },

                                                {
                                                    data: 'nome'
                                                },
                                                {
                                                    data: 'versao'
                                                },
                                                {
                                                    data: 'departamento'
                                                },
                                                {
                                                    data: 'descricao'
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
                        }
                    }
                    function imagemmatriz()
                    {
                        if ($_SESSION['nick'] === 'Usuario_ADM_AD' or $_SESSION['nick'] === 'Sub_Usuario_ADM_AD') { ?>
                                <div class="card">
                                    <div class="card-header text-muted" style="background: #818896">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#staticBackdrop" data-tt="tooltip" data-placement="bottom" title="Upload de Imagem" style="background: #818896; color: #ffffff; border:#818896">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z" />
                                                <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                                            </svg></button>
                                    </div>
                                    <div class="card-body">
                                        <table id="imagem-matriz" class="display nowrap cell-border" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="span12 text-center">Download</th>
                                                    <th class="span12 text-center">Ações</th>
                                                    <th>Nome da Imagem</th>
                                                    <th>Versão</th>
                                                    <th>Setor</th>
                                                    <th>Descrição</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <br></br>
                                        <div class="card-footer text-muted text-center" style="background: #818896">
                                            SSU Online
                                        </div>
                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Adicionar Imagem</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <form accept-charset="utf-8" class="display nowrap" action="insere_imagem.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12 char">
                                                                    <label class="label" for="nome_imagem">Nome da Imagem</label>
                                                                    <input accept-charset="utf-8" class="form-control" type="text" id="nome_imagem" placeholder="Nome da Imagem" name="nome_imagem" required>
                                                                </div>
                                                                <div class="form-group col-md-12 char">
                                                                    <label class="label" for="departamento" style="font-weight:bold;">Departamento</label>
                                                                    <select type="text" name="departamento" class="form-control" id="departamento" placeholder="Departamento" required>
                                                                        <option>Matriz - SSU</option>
                                                                        <option>Farmacias</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12 char">
                                                                    <label class="label" for="descricao_img" style="font-weight:bold;">Descrição</label>
                                                                    <input accept-charset="utf-8" class="form-control" type="text" id="descricao_img" placeholder="Nome da Imagem" name="descricao_img" required>
                                                                </div>
                                                                <div class="form-group col-md-12 char">
                                                                    <label class="label" for="versao" style="font-weight:bold;">Versão</label>
                                                                    <input accept-charset="utf-8" class="form-control" type="text" id="versao" placeholder="Versão da Imagem" name="versao" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="file" name="arquivo">
                                                                </div>
                                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                        <button onclick="enviar()" class="btn btn-primary" type="submit" data-tt="tooltip" data-placement="bottom" title="Enviar" style="background: #3a3f48; border-color:#3a3f48;">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php include __DIR__ . "/../footer.php"; ?>
                                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            var table = $('#imagem-matriz').DataTable({
                                                'responsive': true,
                                                'scrollY': 430,
                                                'scrollX': true,
                                                'processing': true,
                                                'serverSide': true,
                                                'ajax': {
                                                    "url": "objects.php"
                                                },
                                                'columns': [{
                                                        data: 'download',
                                                        render: function(data) {
                                                            return '<a class="btn btn-primary" href="' + data + '" download>Download</a>'
                                                        }
                                                    },
                                                    {
                                                        data: 'id',
                                                        render: function(data) {
                                                            return '<a class="btn btn-primary" href="/configuracoes/altera_form_imagens_m.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>  <a class="btn btn-danger" href="delete_lista_imagem_matriz.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></a>'
                                                        }
                                                    },
                                                    {
                                                        data: 'nome'
                                                    },
                                                    {
                                                        data: 'versao'
                                                    },
                                                    {
                                                        data: 'departamento'
                                                    },
                                                    {
                                                        data: 'descricao'
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
                            } elseif (in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                    <div class="card text-center">
                                        <div class="card-header text-muted" style="background: #818896">
                                        </div>
                                        <div class="card-body">
                                            <table id="imagem-matriz" class="display nowrap cell-border" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="span12 text-center">Download</th>
                                                        <th>Nome da Imagem</th>
                                                        <th>Versão</th>
                                                        <th>Setor</th>
                                                        <th>Descrição</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br></br>
                                            <div class="card-footer text-muted" style="background: #818896">
                                                SSU Online
                                            </div>
                                        </div>
                                        <?php include __DIR__ . "/../footer.php"; ?>
                                        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                var table = $('#imagem-matriz').DataTable({
                                                    'responsive': true,
                                                    'scrollY': 430,
                                                    'scrollX': true,
                                                    'processing': true,
                                                    'serverSide': true,
                                                    'ajax': {
                                                        "url": "objects.php"
                                                    },
                                                    'columns': [{
                                                            data: 'download',
                                                            render: function(data) {
                                                                return '<a class="btn btn-primary" href="' + data + '" download>Download</a>'
                                                            }
                                                        },
                                                        {
                                                            data: 'nome'
                                                        },
                                                        {
                                                            data: 'versao'
                                                        },
                                                        {
                                                            data: 'departamento'
                                                        },
                                                        {
                                                            data: 'descricao'
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
                                }
                            }
                            function verificaImagens()
                            {
                                if (in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                        <?php
                                        include("banco-view.php");
                                        include("conecta.php");
                                        ?>
                                        <!-- JS  -->
                                        <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
                                        <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                        <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
                                        <!-- CS  -->
                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


                                        <!DOCTYPE html>
                                        <html lang="pt-br">

                                        <head>
                                            <meta charset="utf-8">
                                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                            <title>SSU Online</title>
                                        </head>
                                        <script>
                                            jQuery(function($) {

                                                $(".sidebar-dropdown > a").click(function() {
                                                    $(".sidebar-submenu").slideUp(200);
                                                    if (
                                                        $(this)
                                                        .parent()
                                                        .hasClass("active")
                                                    ) {
                                                        $(".sidebar-dropdown").removeClass("active");
                                                        $(this)
                                                            .parent()
                                                            .removeClass("active");
                                                    } else {
                                                        $(".sidebar-dropdown").removeClass("active");
                                                        $(this)
                                                            .next(".sidebar-submenu")
                                                            .slideDown(200);
                                                        $(this)
                                                            .parent()
                                                            .addClass("active");
                                                    }
                                                });

                                                $("#close-sidebar").click(function() {
                                                    $(".page-wrapper").removeClass("toggled");
                                                });
                                                $("#show-sidebar").click(function() {
                                                    $(".page-wrapper").addClass("toggled");
                                                });




                                            });
                                        </script>

                                        <body>
                                            <div class="page-wrapper chiller-theme toggled">
                                                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                                                    <i class="fas fa-bars"></i>
                                                </a>
                                                <nav id="sidebar" class="sidebar-wrapper">
                                                    <div class="sidebar-content">
                                                        <div class="sidebar-brand">
                                                            <a href="https://ssuonline/home.php">SSU Online</a>
                                                            <div id="close-sidebar">
                                                                <i class="fas fa-times"></i>
                                                            </div>
                                                        </div>
                                                        <div class="sidebar-header">
                                                            <div class="user-pic">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                                </svg>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="user-name"><?php echo $_SESSION["nick"] ?>
                                                                </span>
                                                                <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                                                                <span class="user-status">
                                                                    <i class="fa fa-circle"></i>
                                                                    <span>Online</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- sidebar-header  -->
                                                        <div class="sidebar-search">
                                                            <div>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control search-menu" placeholder="Search...">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- sidebar-search  -->
                                                        <div class="sidebar-menu">
                                                            <ul>
                                                                <li class="header-menu">
                                                                    <span>General</span>
                                                                </li>
                                                                <?php verificaAcessoRat() ?>
                                                                <?php verificaAcessoAdmissao() ?>
                                                                <?php verificaAcessoEstoque() ?>
                                                                <?php verificaAcessoImagens() ?>
                                                                <li class="sidebar-dropdown">
                                                                    <a href="#">
                                                                        <i class="fa fa-sticky-note"></i>
                                                                        <span>Procedimentos</span>
                                                                    </a>
                                                                    <div class="sidebar-submenu">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">Matriz</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Lojas</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">CDs</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Geral</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li class="header-menu">
                                                                    <span>Extra</span>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-book"></i>
                                                                        <span>Documentação</span>
                                                                        <span class="badge badge-pill badge-primary">Beta</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-cog"></i>
                                                                        <span>Softwares</span>
                                                                    </a>
                                                                </li>
                                                                <?php verificaAcessoScripts() ?>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-signal"></i>
                                                                        <span>Dashboard</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- sidebar-menu  -->
                                                    </div>
                                                    <!-- sidebar-content  -->
                                                    <div class="sidebar-footer">
                                                        <a href="#">
                                                            <i class="fa fa-bell"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-cog"></i>
                                                        </a>
                                                        <a href="/configuracoes/sair.php">
                                                            <i class="fa fa-power-off"></i>
                                                        </a>
                                                    </div>
                                                </nav>
                                                <!-- sidebar-wrapper  -->
                                                <main class="page-content">
                                                    <div class="container-fluid">
                                                    <?php
                                                }
                                            }
                                            function verificaRHadmissao()
                                            {
                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD' or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                        <?php
                                                        include("banco-view.php");
                                                        include("conecta.php");
                                                        ?>
                                                        <!-- JS  -->
                                                        <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
                                                        <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                        <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
                                                        <!-- CS  -->
                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


                                                        <!DOCTYPE html>
                                                        <html lang="pt-br">

                                                        <head>
                                                            <meta charset="utf-8">
                                                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                                            <title>SSU Online</title>
                                                        </head>
                                                        <script>
                                                            jQuery(function($) {

                                                                $(".sidebar-dropdown > a").click(function() {
                                                                    $(".sidebar-submenu").slideUp(200);
                                                                    if (
                                                                        $(this)
                                                                        .parent()
                                                                        .hasClass("active")
                                                                    ) {
                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                        $(this)
                                                                            .parent()
                                                                            .removeClass("active");
                                                                    } else {
                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                        $(this)
                                                                            .next(".sidebar-submenu")
                                                                            .slideDown(200);
                                                                        $(this)
                                                                            .parent()
                                                                            .addClass("active");
                                                                    }
                                                                });

                                                                $("#close-sidebar").click(function() {
                                                                    $(".page-wrapper").removeClass("toggled");
                                                                });
                                                                $("#show-sidebar").click(function() {
                                                                    $(".page-wrapper").addClass("toggled");
                                                                });




                                                            });
                                                        </script>

                                                        <body>
                                                            <div class="page-wrapper chiller-theme toggled">
                                                                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                                                                    <i class="fas fa-bars"></i>
                                                                </a>
                                                                <nav id="sidebar" class="sidebar-wrapper">
                                                                    <div class="sidebar-content">
                                                                        <div class="sidebar-brand">
                                                                            <a href="https://ssuonline/home.php">SSU Online</a>
                                                                            <div id="close-sidebar">
                                                                                <i class="fas fa-times"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sidebar-header">
                                                                            <div class="user-pic">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                                                </svg>
                                                                            </div>
                                                                            <div class="user-info">
                                                                                <span class="user-name"><?php echo $_SESSION["nick"] ?>
                                                                                </span>
                                                                                <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                                                                                <span class="user-status">
                                                                                    <i class="fa fa-circle"></i>
                                                                                    <span>Online</span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- sidebar-header  -->
                                                                        <div class="sidebar-search">
                                                                            <div>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control search-menu" placeholder="Search...">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">
                                                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- sidebar-search  -->
                                                                        <div class="sidebar-menu">
                                                                            <ul>
                                                                                <li class="header-menu">
                                                                                    <span>General</span>
                                                                                </li>
                                                                                <?php verificaAcessoRat() ?>
                                                                                <?php verificaAcessoAdmissao() ?>
                                                                                <?php verificaAcessoEstoque() ?>
                                                                                <?php verificaAcessoImagens() ?>
                                                                                <li class="sidebar-dropdown">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-sticky-note"></i>
                                                                                        <span>Procedimentos</span>
                                                                                    </a>
                                                                                    <div class="sidebar-submenu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#">Matriz</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#">Lojas</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#">CDs</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#">Geral</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="header-menu">
                                                                                    <span>Extra</span>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <i class="fa fa-book"></i>
                                                                                        <span>Documentação</span>
                                                                                        <span class="badge badge-pill badge-primary">Beta</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <i class="fa fa-cog"></i>
                                                                                        <span>Softwares</span>
                                                                                    </a>
                                                                                </li>
                                                                                <?php verificaAcessoScripts() ?>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <i class="fa fa-signal"></i>
                                                                                        <span>Dashboard</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <!-- sidebar-menu  -->
                                                                    </div>
                                                                    <!-- sidebar-content  -->
                                                                    <div class="sidebar-footer">
                                                                        <a href="#">
                                                                            <i class="fa fa-bell"></i>
                                                                        </a>
                                                                        <a href="#">
                                                                            <i class="fa fa-envelope"></i>
                                                                        </a>
                                                                        <a href="#">
                                                                            <i class="fa fa-cog"></i>
                                                                        </a>
                                                                        <a href="/configuracoes/sair.php">
                                                                            <i class="fa fa-power-off"></i>
                                                                        </a>
                                                                    </div>
                                                                </nav>
                                                                <!-- sidebar-wrapper  -->
                                                                <main class="page-content">
                                                                    <div class="container-fluid">
                                                                    <?php
                                                                } else {
                                                                    header('Location: home.php');
                                                                };
                                                            };
                                                            function verificaAdmissao()
                                                            {
                                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD' or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                        <?php
                                                                        include("banco-view.php");
                                                                        include("conecta.php");
                                                                        ?>
                                                                        <!-- JS  -->
                                                                        <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
                                                                        <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                                        <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
                                                                        <!-- CS  -->
                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


                                                                        <!DOCTYPE html>
                                                                        <html lang="pt-br">

                                                                        <head>
                                                                            <meta charset="utf-8">
                                                                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                                                            <title>SSU Online</title>
                                                                        </head>
                                                                        <script>
                                                                            jQuery(function($) {

                                                                                $(".sidebar-dropdown > a").click(function() {
                                                                                    $(".sidebar-submenu").slideUp(200);
                                                                                    if (
                                                                                        $(this)
                                                                                        .parent()
                                                                                        .hasClass("active")
                                                                                    ) {
                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                        $(this)
                                                                                            .parent()
                                                                                            .removeClass("active");
                                                                                    } else {
                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                        $(this)
                                                                                            .next(".sidebar-submenu")
                                                                                            .slideDown(200);
                                                                                        $(this)
                                                                                            .parent()
                                                                                            .addClass("active");
                                                                                    }
                                                                                });

                                                                                $("#close-sidebar").click(function() {
                                                                                    $(".page-wrapper").removeClass("toggled");
                                                                                });
                                                                                $("#show-sidebar").click(function() {
                                                                                    $(".page-wrapper").addClass("toggled");
                                                                                });




                                                                            });
                                                                        </script>

                                                                        <body>
                                                                            <div class="page-wrapper chiller-theme toggled">
                                                                                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                                                                                    <i class="fas fa-bars"></i>
                                                                                </a>
                                                                                <nav id="sidebar" class="sidebar-wrapper">
                                                                                    <div class="sidebar-content">
                                                                                        <div class="sidebar-brand">
                                                                                            <a href="https://ssuonline/home.php">SSU Online</a>
                                                                                            <div id="close-sidebar">
                                                                                                <i class="fas fa-times"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="sidebar-header">
                                                                                            <div class="user-pic">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <div class="user-info">
                                                                                                <span class="user-name"><?php echo $_SESSION["nick"] ?>
                                                                                                </span>
                                                                                                <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                                                                                                <span class="user-status">
                                                                                                    <i class="fa fa-circle"></i>
                                                                                                    <span>Online</span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- sidebar-header  -->
                                                                                        <div class="sidebar-search">
                                                                                            <div>
                                                                                                <div class="input-group">
                                                                                                    <input type="text" class="form-control search-menu" placeholder="Search...">
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">
                                                                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- sidebar-search  -->
                                                                                        <div class="sidebar-menu">
                                                                                            <ul>
                                                                                                <li class="header-menu">
                                                                                                    <span>General</span>
                                                                                                </li>
                                                                                                <?php verificaAcessoRat() ?>
                                                                                                <?php verificaAcessoAdmissao() ?>
                                                                                                <?php verificaAcessoEstoque() ?>
                                                                                                <?php verificaAcessoImagens() ?>
                                                                                                <li class="sidebar-dropdown">
                                                                                                    <a href="#">
                                                                                                        <i class="fa fa-sticky-note"></i>
                                                                                                        <span>Procedimentos</span>
                                                                                                    </a>
                                                                                                    <div class="sidebar-submenu">
                                                                                                        <ul>
                                                                                                            <li>
                                                                                                                <a href="#">Matriz</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a href="#">Lojas</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a href="#">CDs</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a href="#">Geral</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </li>
                                                                                                <li class="header-menu">
                                                                                                    <span>Extra</span>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#">
                                                                                                        <i class="fa fa-book"></i>
                                                                                                        <span>Documentação</span>
                                                                                                        <span class="badge badge-pill badge-primary">Beta</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#">
                                                                                                        <i class="fa fa-cog"></i>
                                                                                                        <span>Softwares</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                                <?php verificaAcessoScripts() ?>
                                                                                                <li>
                                                                                                    <a href="#">
                                                                                                        <i class="fa fa-signal"></i>
                                                                                                        <span>Dashboard</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <!-- sidebar-menu  -->
                                                                                    </div>
                                                                                    <!-- sidebar-content  -->
                                                                                    <div class="sidebar-footer">
                                                                                        <a href="#">
                                                                                            <i class="fa fa-bell"></i>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <i class="fa fa-envelope"></i>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <i class="fa fa-cog"></i>
                                                                                        </a>
                                                                                        <a href="/configuracoes/sair.php">
                                                                                            <i class="fa fa-power-off"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </nav>
                                                                                <!-- sidebar-wrapper  -->
                                                                                <main class="page-content">
                                                                                    <div class="container-fluid">
                                                                                    <?php
                                                                                } else {
                                                                                    header('Location: home.php');
                                                                                };
                                                                            };
                                                                            function verificaEstoque()
                                                                            {
                                                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD') { ?>
                                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                                        <?php
                                                                                        include("banco-view.php");
                                                                                        include("conecta.php");
                                                                                        ?>
                                                                                        <!-- JS  -->
                                                                                        <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
                                                                                        <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                                                        <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
                                                                                        <!-- CS  -->
                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                                                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                                                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


                                                                                        <!DOCTYPE html>
                                                                                        <html lang="pt-br">

                                                                                        <head>
                                                                                            <meta charset="utf-8">
                                                                                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                                                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                            <title>SSU Online</title>
                                                                                        </head>
                                                                                        <script>
                                                                                            jQuery(function($) {

                                                                                                $(".sidebar-dropdown > a").click(function() {
                                                                                                    $(".sidebar-submenu").slideUp(200);
                                                                                                    if (
                                                                                                        $(this)
                                                                                                        .parent()
                                                                                                        .hasClass("active")
                                                                                                    ) {
                                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                                        $(this)
                                                                                                            .parent()
                                                                                                            .removeClass("active");
                                                                                                    } else {
                                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                                        $(this)
                                                                                                            .next(".sidebar-submenu")
                                                                                                            .slideDown(200);
                                                                                                        $(this)
                                                                                                            .parent()
                                                                                                            .addClass("active");
                                                                                                    }
                                                                                                });

                                                                                                $("#close-sidebar").click(function() {
                                                                                                    $(".page-wrapper").removeClass("toggled");
                                                                                                });
                                                                                                $("#show-sidebar").click(function() {
                                                                                                    $(".page-wrapper").addClass("toggled");
                                                                                                });




                                                                                            });
                                                                                        </script>

                                                                                        <body>
                                                                                            <div class="page-wrapper chiller-theme toggled">
                                                                                                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                                                                                                    <i class="fas fa-bars"></i>
                                                                                                </a>
                                                                                                <nav id="sidebar" class="sidebar-wrapper">
                                                                                                    <div class="sidebar-content">
                                                                                                        <div class="sidebar-brand">
                                                                                                            <a href="https://ssuonline/home.php">SSU Online</a>
                                                                                                            <div id="close-sidebar">
                                                                                                                <i class="fas fa-times"></i>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="sidebar-header">
                                                                                                            <div class="user-pic">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                                                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                                                                                </svg>
                                                                                                            </div>
                                                                                                            <div class="user-info">
                                                                                                                <span class="user-name"><?php echo $_SESSION["nick"] ?>
                                                                                                                </span>
                                                                                                                <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                                                                                                                <span class="user-status">
                                                                                                                    <i class="fa fa-circle"></i>
                                                                                                                    <span>Online</span>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!-- sidebar-header  -->
                                                                                                        <div class="sidebar-search">
                                                                                                            <div>
                                                                                                                <div class="input-group">
                                                                                                                    <input type="text" class="form-control search-menu" placeholder="Search...">
                                                                                                                    <div class="input-group-append">
                                                                                                                        <span class="input-group-text">
                                                                                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!-- sidebar-search  -->
                                                                                                        <div class="sidebar-menu">
                                                                                                            <ul>
                                                                                                                <li class="header-menu">
                                                                                                                    <span>General</span>
                                                                                                                </li>
                                                                                                                <?php verificaAcessoRat() ?>
                                                                                                                <?php verificaAcessoAdmissao() ?>
                                                                                                                <?php verificaAcessoEstoque() ?>
                                                                                                                <?php verificaAcessoImagens() ?>
                                                                                                                <li class="sidebar-dropdown">
                                                                                                                    <a href="#">
                                                                                                                        <i class="fa fa-sticky-note"></i>
                                                                                                                        <span>Procedimentos</span>
                                                                                                                    </a>
                                                                                                                    <div class="sidebar-submenu">
                                                                                                                        <ul>
                                                                                                                            <li>
                                                                                                                                <a href="#">Matriz</a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                <a href="#">Lojas</a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                <a href="#">CDs</a>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                <a href="#">Geral</a>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                                <li class="header-menu">
                                                                                                                    <span>Extra</span>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <a href="#">
                                                                                                                        <i class="fa fa-book"></i>
                                                                                                                        <span>Documentação</span>
                                                                                                                        <span class="badge badge-pill badge-primary">Beta</span>
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <a href="#">
                                                                                                                        <i class="fa fa-cog"></i>
                                                                                                                        <span>Softwares</span>
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                                <?php verificaAcessoScripts() ?>
                                                                                                                <li>
                                                                                                                    <a href="#">
                                                                                                                        <i class="fa fa-signal"></i>
                                                                                                                        <span>Dashboard</span>
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <!-- sidebar-menu  -->
                                                                                                    </div>
                                                                                                    <!-- sidebar-content  -->
                                                                                                    <div class="sidebar-footer">
                                                                                                        <a href="#">
                                                                                                            <i class="fa fa-bell"></i>
                                                                                                        </a>
                                                                                                        <a href="#">
                                                                                                            <i class="fa fa-envelope"></i>
                                                                                                        </a>
                                                                                                        <a href="#">
                                                                                                            <i class="fa fa-cog"></i>
                                                                                                        </a>
                                                                                                        <a href="/configuracoes/sair.php">
                                                                                                            <i class="fa fa-power-off"></i>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </nav>
                                                                                                <!-- sidebar-wrapper  -->
                                                                                                <main class="page-content">
                                                                                                    <div class="container-fluid">
                                                                                                    <?php
                                                                                                } else {
                                                                                                    header('Location: home.php');
                                                                                                };
                                                                                            };
                                                                                            function verificaRat()
                                                                                            {
                                                                                                if (($_SESSION['nick'] === 'Usuario_ADM_AD') or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                                                        <?php
                                                                                                        include("banco-view.php");
                                                                                                        include("conecta.php");
                                                                                                        ?>
                                                                                                        <!-- JS  -->
                                                                                                        <script src="/bibliotecas/jquery3/jquery-3.6.0.min.js"></script>
                                                                                                        <script src="/bibliotecas/bootstrap-4/js/bootstrap.min.js"></script>
                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                                                                        <script src="/bibliotecas/bootstrap-4//js/bootstrap.min.js"></script>
                                                                                                        <!-- CS  -->
                                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                                                                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                                                                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


                                                                                                        <!DOCTYPE html>
                                                                                                        <html lang="pt-br">

                                                                                                        <head>
                                                                                                            <meta charset="utf-8">
                                                                                                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                                                                                            <meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                                            <title>SSU Online</title>
                                                                                                        </head>
                                                                                                        <script>
                                                                                                            jQuery(function($) {

                                                                                                                $(".sidebar-dropdown > a").click(function() {
                                                                                                                    $(".sidebar-submenu").slideUp(200);
                                                                                                                    if (
                                                                                                                        $(this)
                                                                                                                        .parent()
                                                                                                                        .hasClass("active")
                                                                                                                    ) {
                                                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                                                        $(this)
                                                                                                                            .parent()
                                                                                                                            .removeClass("active");
                                                                                                                    } else {
                                                                                                                        $(".sidebar-dropdown").removeClass("active");
                                                                                                                        $(this)
                                                                                                                            .next(".sidebar-submenu")
                                                                                                                            .slideDown(200);
                                                                                                                        $(this)
                                                                                                                            .parent()
                                                                                                                            .addClass("active");
                                                                                                                    }
                                                                                                                });

                                                                                                                $("#close-sidebar").click(function() {
                                                                                                                    $(".page-wrapper").removeClass("toggled");
                                                                                                                });
                                                                                                                $("#show-sidebar").click(function() {
                                                                                                                    $(".page-wrapper").addClass("toggled");
                                                                                                                });




                                                                                                            });
                                                                                                        </script>

                                                                                                        <body>
                                                                                                            <div class="page-wrapper chiller-theme toggled">
                                                                                                                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                                                                                                                    <i class="fas fa-bars"></i>
                                                                                                                </a>
                                                                                                                <nav id="sidebar" class="sidebar-wrapper">
                                                                                                                    <div class="sidebar-content">
                                                                                                                        <div class="sidebar-brand">
                                                                                                                            <a href="https://ssuonline/home.php">SSU Online</a>
                                                                                                                            <div id="close-sidebar">
                                                                                                                                <i class="fas fa-times"></i>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="sidebar-header">
                                                                                                                            <div class="user-pic">
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="55" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                                                                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                                                                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                                                                                                </svg>
                                                                                                                            </div>
                                                                                                                            <div class="user-info">
                                                                                                                                <span class="user-name"><?php echo $_SESSION["nick"] ?>
                                                                                                                                </span>
                                                                                                                                <span class="user-role"><?php echo $_SESSION["cargo"] ?></span>
                                                                                                                                <span class="user-status">
                                                                                                                                    <i class="fa fa-circle"></i>
                                                                                                                                    <span>Online</span>
                                                                                                                                </span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <!-- sidebar-header  -->
                                                                                                                        <div class="sidebar-search">
                                                                                                                            <div>
                                                                                                                                <div class="input-group">
                                                                                                                                    <input type="text" class="form-control search-menu" placeholder="Search...">
                                                                                                                                    <div class="input-group-append">
                                                                                                                                        <span class="input-group-text">
                                                                                                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                                                                                                        </span>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <!-- sidebar-search  -->
                                                                                                                        <div class="sidebar-menu">
                                                                                                                            <ul>
                                                                                                                                <li class="header-menu">
                                                                                                                                    <span>General</span>
                                                                                                                                </li>
                                                                                                                                <?php verificaAcessoRat() ?>
                                                                                                                                <?php verificaAcessoAdmissao() ?>
                                                                                                                                <?php verificaAcessoEstoque() ?>
                                                                                                                                <?php verificaAcessoImagens() ?>
                                                                                                                                <li class="sidebar-dropdown">
                                                                                                                                    <a href="#">
                                                                                                                                        <i class="fa fa-sticky-note"></i>
                                                                                                                                        <span>Procedimentos</span>
                                                                                                                                    </a>
                                                                                                                                    <div class="sidebar-submenu">
                                                                                                                                        <ul>
                                                                                                                                            <li>
                                                                                                                                                <a href="#">Matriz</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a href="#">Lojas</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a href="#">CDs</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a href="#">Geral</a>
                                                                                                                                            </li>
                                                                                                                                        </ul>
                                                                                                                                    </div>
                                                                                                                                </li>
                                                                                                                                <li class="header-menu">
                                                                                                                                    <span>Extra</span>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a href="#">
                                                                                                                                        <i class="fa fa-book"></i>
                                                                                                                                        <span>Documentação</span>
                                                                                                                                        <span class="badge badge-pill badge-primary">Beta</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a href="#">
                                                                                                                                        <i class="fa fa-cog"></i>
                                                                                                                                        <span>Softwares</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <?php verificaAcessoScripts() ?>
                                                                                                                                <li>
                                                                                                                                    <a href="#">
                                                                                                                                        <i class="fa fa-signal"></i>
                                                                                                                                        <span>Dashboard</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                        <!-- sidebar-menu  -->
                                                                                                                    </div>
                                                                                                                    <!-- sidebar-content  -->
                                                                                                                    <div class="sidebar-footer">
                                                                                                                        <a href="#">
                                                                                                                            <i class="fa fa-bell"></i>
                                                                                                                        </a>
                                                                                                                        <a href="#">
                                                                                                                            <i class="fa fa-envelope"></i>
                                                                                                                        </a>
                                                                                                                        <a href="#">
                                                                                                                            <i class="fa fa-cog"></i>
                                                                                                                        </a>
                                                                                                                        <a href="/configuracoes/sair.php">
                                                                                                                            <i class="fa fa-power-off"></i>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </nav>
                                                                                                                <!-- sidebar-wrapper  -->
                                                                                                                <main class="page-content">
                                                                                                                    <div class="container-fluid">
                                                                                                                    <?php
                                                                                                                } else {
                                                                                                                    header('Location: home.php');
                                                                                                                };
                                                                                                            };
                                                                                                            function verificaImp()
                                                                                                            {

                                                                                                                if (($_SESSION['nick'] === 'Usuario_ADM_AD') or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos']) or in_array("CN=GRP_AD=_Grupos,OU=_AD,DC=dominio,DC=com", $_SESSION['grupos'])) { ?>
                                                                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css" id="bootstrap-css">
                                                                                                                        <link rel="stylesheet" href="/bibliotecas/css/teste.css">
                                                                                                                        <link rel="stylesheet" href="/bibliotecas/bootstrap-4/css/bootstrap.min.css">
                                                                                                                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
                                                                                                                    <?php

                                                                                                                } else {
                                                                                                                    header('Location: home.php');
                                                                                                                };
                                                                                                            };
                                                                                                            function verificaADM()
                                                                                                            {
                                                                                                                if (($_SESSION['nick'] === 'Usuario_ADM_AD')) { ?>
                                                                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                                                                        <?php
                                                                                                                        include("banco-view.php");
                                                                                                                        include("conecta.php");
                                                                                                                        $acess = $_SESSION['user'];
                                                                                                                        $acesso = "'" . $acess . "'";
                                                                                                                        ?>
                                                                                                                    <?php
                                                                                                                } else {
                                                                                                                    header('Location: home.php');
                                                                                                                };
                                                                                                            };
                                                                                                            function verificaRatApagar()
                                                                                                            {
                                                                                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD' or $_SESSION['nick'] === 'Sub_Usuario_ADM_AD') { ?>
                                                                                                                        <div class="card">
                                                                                                                            <div class="card-header text-muted" style="background: #818896">
                                                                                                                                <button id="botao_rat" style="background: #818896; color: #ffffff; border:#818896" disabled> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                                                                                                                                        <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                                                                                                                        <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                                                                                                                        <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z" />
                                                                                                                                    </svg></button> &nbsp; &nbsp;
                                                                                                                                <button id="botao_lixo" style="background: #818896; color: #ffffff; border:#818896" onclick="clickTeclado(this.value);" value="mudar"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                                                                                    </svg></button> &nbsp; &nbsp; &nbsp;
                                                                                                                                <a href="/configuracoes/gerar_planilha.php" id="botao_gerar_relatorio" style="background: #818896; color: #ffffff; border:#818896" onclick="clickTeclado(this.value);" value="planilha"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                                                                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                                                                                                                    </svg></a>
                                                                                                                            </div>
                                                                                                                            <div class="card-body">
                                                                                                                                <table id="teste" name="teste" class="display nowrap cell-border" style="width:100%">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th class="span12 text-center">Ações</th>
                                                                                                                                            <th>Data de Criação</th>
                                                                                                                                            <th>Status do Equipamento</th>
                                                                                                                                            <th>Localidade</th>
                                                                                                                                            <th>Ativo</th>
                                                                                                                                            <th>Número de Série</th>
                                                                                                                                            <th>Nome do Colaborador</th>
                                                                                                                                            <th>Departamento</th>

                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                </table>
                                                                                                                                <br></br>
                                                                                                                                <div class="card-footer text-muted" style="background: #818896">
                                                                                                                                    SSU Online
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <?php include __DIR__ . "/../footer.php"; ?>
                                                                                                                            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                                                                                                            <script type="text/javascript">
                                                                                                                                $(document).ready(function() {
                                                                                                                                    var table = $('#teste').DataTable({
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
                                                                                                                                                    return '<a class="btn btn-primary" href="altera-form-produto.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>  <a class="btn btn-danger" id="confirmation" name="confirmation" href="delete_lista_rat.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/></svg></a>'
                                                                                                                                                }
                                                                                                                                            },

                                                                                                                                            {
                                                                                                                                                data: 'data_criacao'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'status_equipamento'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'localidade'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'ativo'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'numero_serie'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'nome_colaborador'
                                                                                                                                            },
                                                                                                                                            {
                                                                                                                                                data: 'departamento'
                                                                                                                                            },

                                                                                                                                        ],
                                                                                                                                    });
                                                                                                                                });
                                                                                                                            </script>
                                                                                                                            <script type="text/javascript">
                                                                                                                                $("#botao_lixo").click(function() {
                                                                                                                                    $('#teste').attr('hidden');
                                                                                                                                })
                                                                                                                            </script>
                                                                                                                            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
                                                                                                                            <style type="text/css">
                                                                                                                                div.dataTables_wrapper {
                                                                                                                                    width: auto;
                                                                                                                                    margin: auto;
                                                                                                                                }
                                                                                                                            </style>

                                                                                                                        <?php
                                                                                                                    } else { ?>
                                                                                                                            <div class="card text-center">
                                                                                                                                <div class="card-header text-muted" style="background: #818896">
                                                                                                                                    R.A.T
                                                                                                                                </div>
                                                                                                                                <div class="card-body">
                                                                                                                                    <table id="teste" class="display nowrap cell-border" style="width: 100%">
                                                                                                                                        <thead>
                                                                                                                                            <tr>
                                                                                                                                                <th class="span12 text-center">Ações</th>
                                                                                                                                                <th>Data de Criação</th>
                                                                                                                                                <th>Status do Equipamento</th>
                                                                                                                                                <th>Localidade</th>
                                                                                                                                                <th>Ativo</th>
                                                                                                                                                <th>Número de Série</th>
                                                                                                                                                <th>Nome do Colaborador</th>
                                                                                                                                                <th>Departamento</th>
                                                                                                                                            </tr>
                                                                                                                                        </thead>
                                                                                                                                    </table>
                                                                                                                                    <br></br>
                                                                                                                                    <div class="card-footer text-muted" style="background: #818896">
                                                                                                                                        SSU Online
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <?php include __DIR__ . "/../footer.php"; ?>
                                                                                                                                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                                                                                                                <script type="text/javascript">
                                                                                                                                    $(document).ready(function() {
                                                                                                                                        var table = $('#teste').DataTable({
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
                                                                                                                                                        return '<a class="btn btn-primary" href="altera-form-produto.php?id=' + data + '"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>'
                                                                                                                                                    }
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'data_criacao'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'status_equipamento'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'localidade'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'ativo'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'numero_serie'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'nome_colaborador'
                                                                                                                                                },
                                                                                                                                                {
                                                                                                                                                    data: 'departamento'
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
                                                                                                                        };
                                                                                                                    };
                                                                                                                    function verificaSoftwareApagar()
                                                                                                                    {
                                                                                                                        if ($_SESSION['nick'] === 'Usuario_ADM_AD') { ?>
                                                                                                                                <div class="card text-center">
                                                                                                                                    <div class="card-header text-muted" style="background: #818896">
                                                                                                                                        Portal Software
                                                                                                                                    </div>
                                                                                                                                    <div class="card-body">
                                                                                                                                        <table id="teste" class="display nowrap" style="width:100%">
                                                                                                                                            <thead>
                                                                                                                                                <tr>
                                                                                                                                                    <th class="span12 text-center">Ações</th>
                                                                                                                                                    <th>Ampliar</th>
                                                                                                                                                    <th class="span12 text-center">Software</th>
                                                                                                                                                    <th>Tipo de Licenciamento</th>
                                                                                                                                                    <th>Quantidade em Uso</th>
                                                                                                                                                    <th>Quantidade Pedida</th>
                                                                                                                                                    <th>Quantidade Orçamentada</th>
                                                                                                                                                    <th>Calculo</th>
                                                                                                                                                    <th>Key User</th>
                                                                                                                                                    <th>Gerente</th>
                                                                                                                                                    <th>VP da Licença</th>
                                                                                                                                                    <th>Valor da Licença</th>
                                                                                                                                                </tr>
                                                                                                                                            </thead>
                                                                                                                                        </table>
                                                                                                                                        <br></br>
                                                                                                                                        <div class="card-footer text-muted" style="background: #818896">
                                                                                                                                            SSU Online
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <?php include __DIR__ . "/../footer.php"; ?>
                                                                                                                                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                                                                                                                    <script type="text/javascript">
                                                                                                                                        function format(d) {
                                                                                                                                            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                                                                                                                                                '<tr>' +
                                                                                                                                                '<td>Descrição:</td>' +
                                                                                                                                                '<td>' + d.descricao + '</td>' +
                                                                                                                                                '</tr>'
                                                                                                                                            '</table>';
                                                                                                                                        }
                                                                                                                                        $(document).ready(function() {
                                                                                                                                            var table = $('#teste').DataTable({
                                                                                                                                                'responsive': true,
                                                                                                                                                'scrollY': 430,
                                                                                                                                                'scrollX': true,
                                                                                                                                                'processing': true,
                                                                                                                                                'serverSide': true,
                                                                                                                                                'ajax': {
                                                                                                                                                    "url": "objects-software.php"
                                                                                                                                                },
                                                                                                                                                'columns': [{
                                                                                                                                                        data: 'id',
                                                                                                                                                        render: function(data) {
                                                                                                                                                            return '<a class="btn btn-primary" href="/configuracoes/altera-form-software.php?id='+data+'"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>'
                                                                                                                                                        }
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        className: 'dt-control',
                                                                                                                                                        data: null,
                                                                                                                                                        defaultContent: ''
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'escopo'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'tipo_de_licenciamento'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'qtd_usada'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'qtd_pedida'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'qtd_fornecida'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'calculo'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'key_user'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'gerente'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'vp'
                                                                                                                                                    },
                                                                                                                                                    {
                                                                                                                                                        data: 'valor'
                                                                                                                                                    },

                                                                                                                                                ],
                                                                                                                                            });
                                                                                                                                            $('#teste').on('click', 'td.dt-control', function() {
                                                                                                                                                var tr = $(this).closest('tr');
                                                                                                                                                var row = table.row(tr);

                                                                                                                                                if (row.child.isShown()) {
                                                                                                                                                    // This row is already open - close it
                                                                                                                                                    row.child.hide();
                                                                                                                                                    tr.removeClass('shown');
                                                                                                                                                } else {
                                                                                                                                                    // Open this row
                                                                                                                                                    row.child(format(row.data())).show();
                                                                                                                                                    tr.addClass('shown');
                                                                                                                                                }
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
                                                                                                                            } else { ?>
                                                                                                                                    <div class="card text-center">
                                                                                                                                        <div class="card-header text-muted" style="background: #818896">
                                                                                                                                            Portal Software
                                                                                                                                        </div>
                                                                                                                                        <div class="card-body">
                                                                                                                                            <table id="teste" class="display nowrap" style="width:100%">
                                                                                                                                                <thead>
                                                                                                                                                    <tr>
                                                                                                                                                        <th class="span12 text-center">Ações</th>
                                                                                                                                                        <th>Ampliar</th>
                                                                                                                                                        <th class="span12 text-center">Software</th>
                                                                                                                                                        <th>Tipo de Licenciamento</th>
                                                                                                                                                        <th>Quantidade em Uso</th>
                                                                                                                                                        <th>Quantidade Pedida</th>
                                                                                                                                                        <th>Quantidade Orçamentada</th>
                                                                                                                                                        <th>Calculo</th>
                                                                                                                                                        <th>Key User</th>
                                                                                                                                                        <th>Gerente</th>
                                                                                                                                                        <th>VP da Licença</th>
                                                                                                                                                        <th>Valor da Licença</th>
                                                                                                                                                    </tr>
                                                                                                                                                </thead>
                                                                                                                                            </table>
                                                                                                                                            <br></br>
                                                                                                                                            <div class="card-footer text-muted" style="background: #818896">
                                                                                                                                                SSU Online
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <?php include __DIR__ . "/../footer.php"; ?>
                                                                                                                                        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                                                                                                                                        <script type="text/javascript">
                                                                                                                                            function format(d) {
                                                                                                                                                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                                                                                                                                                    '<tr>' +
                                                                                                                                                    '<td>Descrição:</td>' +
                                                                                                                                                    '<td>' + d.descricao + '</td>' +
                                                                                                                                                    '</tr>'
                                                                                                                                                '</table>';
                                                                                                                                            }
                                                                                                                                            $(document).ready(function() {
                                                                                                                                                var table = $('#teste').DataTable({
                                                                                                                                                    'responsive': true,
                                                                                                                                                    'scrollY': 430,
                                                                                                                                                    'scrollX': true,
                                                                                                                                                    'processing': true,
                                                                                                                                                    'serverSide': true,
                                                                                                                                                    'ajax': {
                                                                                                                                                        "url": "objects-software.php"
                                                                                                                                                    },
                                                                                                                                                    'columns': [{
                                                                                                                                                            data: 'id',
                                                                                                                                                            render: function(data) {
                                                                                                                                                                return '<a class="btn btn-primary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></a>'
                                                                                                                                                            }
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            className: 'dt-control',
                                                                                                                                                            data: null,
                                                                                                                                                            defaultContent: ''
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'escopo'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'tipo_de_licenciamento'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'qtd_usada'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'qtd_pedida'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'qtd_fornecida'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'calculo'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'key_user'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'gerente'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'vp'
                                                                                                                                                        },
                                                                                                                                                        {
                                                                                                                                                            data: 'valor'
                                                                                                                                                        },
                                                                                                                                                    ],
                                                                                                                                                });
                                                                                                                                                $('#teste').on('click', 'td.dt-control', function() {
                                                                                                                                                    var tr = $(this).closest('tr');
                                                                                                                                                    var row = table.row(tr);

                                                                                                                                                    if (row.child.isShown()) {
                                                                                                                                                        // This row is already open - close it
                                                                                                                                                        row.child.hide();
                                                                                                                                                        tr.removeClass('shown');
                                                                                                                                                    } else {
                                                                                                                                                        // Open this row
                                                                                                                                                        row.child(format(row.data())).show();
                                                                                                                                                        tr.addClass('shown');
                                                                                                                                                    }
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

                                                                                                                                };
                                                                                                                            };

                                                                                                                            function verificarelatorio()
                                                                                                                            {
                                                                                                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD' or $_SESSION['nick'] === 'Sub_Usuario_ADM_AD') { ?>
                                                                                                                                    <?php
                                                                                                                                } else {
                                                                                                                                    header('Location: home.php');
                                                                                                                                };
                                                                                                                            };
                                                                                                                            function verificaDownloads()
                                                                                                                            {
                                                                                                                                if ($_SESSION['nick'] === 'Usuario_ADM_AD') { ?>
                                                                                                                                        <?php header("Content-type: text/html; charset=utf-8", true);
                                                                                                                                        setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
                                                                                                                                        <?php
                                                                                                                                        include("banco-view.php");
                                                                                                                                        include("conecta.php");
                                                                                                                                        $acess = $_SESSION['user'];
                                                                                                                                        $acesso = "'" . $acess . "'";
                                                                                                                                        ?>
                                                                                                                                <?php
                                                                                                                                } else {
                                                                                                                                    header('Location: home.php');
                                                                                                                                };
                                                                                                                            };
