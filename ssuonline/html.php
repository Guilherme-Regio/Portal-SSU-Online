<?php
header("Content-type: text/html; charset=utf-8", true);
setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); ?>
<?php
include __DIR__ . "/configuracoes/banco-view.php";
include __DIR__ . "/configuracoes/conecta.php";
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
                    <a href="home.php">SSU Online</a>
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