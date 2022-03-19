<?php
ini_set('default_charset', 'UTF-8');
?>
<?php
function verificaAcessoScripts()
{
    if ($_SESSION['nick'] === 'GFOliveira') { ?>
        <li>
            <a href="#">
                <i class="fa fa-bookmark"></i>
                <span>Scripts</span>
            </a>
        </li>
    <?php
    } elseif (in_array("CN=GRP_ASSET,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos']) or in_array("CN=SSU,OU=SSU_ACESSO,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos']) or in_array("Suporte Cds - CN=Suporte CDs,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos']) or in_array("CN=Lideranças Service Desk N2,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li>
            <a href="#">
                <i class="fa fa-bookmark"></i>
                <span>Scripts</span>
            </a>
        </li>
    <?php
    }
}
function verificaAcessoImagens()
{
    if ($_SESSION['nick'] === 'GFOliveira') { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-download"></i>
                <span>Imagens</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/imagens/matriz/listar-matriz.php">Matriz</a>
                    </li>
                    <li>
                        <a href="/imagens/loja/listar-loja.php">Farmácias</a>
                    </li>
                    <li>
                        <a href="#">CDs<span class="badge badge-pill badge-primary">Beta</span></a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("CN=GRP_ASSET,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-download"></i>
                <span>Imagens</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/imagens/matriz/listar-matriz.php">Matriz</a>
                    </li>
                    <li>
                        <a href="/imagens/loja/listar-loja.php">Farmácias</a>
                    </li>
                    <li>
                        <a href="#">CDs<span class="badge badge-pill badge-primary">Beta</span></a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("CN=SSU,OU=SSU_ACESSO,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-download"></i>
                <span>Imagens</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/imagens/matriz/listar-matriz.php">Matriz</a>
                    </li>
                    <li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("Suporte Cds - CN=Suporte CDs,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-download"></i>
                <span>Imagens</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="#">CDs<span class="badge badge-pill badge-primary">Beta</span></a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("CN=Lideranças Service Desk N2,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-download"></i>
                <span>Imagens</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/imagens/loja/listar-loja.php">Farmácias</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    }
};
function verificaAcessoEstoque()
{

    if ($_SESSION['nick'] === 'GFOliveira' or $_SESSION['nick'] === 'LAMalaquias') { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-archive"></i>
                <span>Estoque</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/estoque/entrada-estoque-form.php">Entrada de Equipamento</a>
                    </li>
                    <li>
                        <a href="/estoque/entrada-estoque-xml.php">Entrada de Equipamentos</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    };
};
function verificaAcessoRat()
{
    if ($_SESSION['nick'] === 'GFOliveira') { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Sistemas</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/rat/produto-lista.php">Rat</a>
                    </li>
                    <li>
                        <a href="/portal/software-lista.php">Portal Software</a>
                    </li>
                    <li>
                        <a href="#">Phpmyadmin</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("CN=SSU,OU=SSU_ACESSO,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Sistemas</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/rat/produto-lista.php">Rat</a>
                    </li>
                    <li>
                        <a href="/portal/software-lista.php">Portal Software</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    };
};
function verificaAcessoAdmissao()
{

    if (in_array("CN=GRP_RECRUTAMENTO_SELECAO,OU=_Grupos,OU=_Matriz,OU=Rh,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Admissão</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/admissao/admissao-form.php">Formulário</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif ($_SESSION['nick'] === 'GFOliveira') { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Admissão</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/admissao/admissao-form.php">Formulário</a>
                    </li>
                    <li>
                        <a href="/admissao/emissao.php">Emissão de Nota</a>
                    </li>
                    <li>
                        <a href="/admissao/admissao-lista.php">Lista Admissão</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    } elseif (in_array("CN=AdmissaoTI,OU=GruposdeEmail,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Admissão</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/admissao/emissao.php">Emissão de Nota</a>
                    </li>
                    <li>
                        <a href="/admissao/admissao-lista.php">Lista Admissão</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php
    };
};
function verificaAcessoAdm()
{

    if (in_array("CN=SSU,OU=SSU_ACESSO,OU=_Grupos,OU=_Matriz,DC=raiadrogasil,DC=com", $_SESSION['grupos'])) { ?>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong><?php echo $_SESSION['user']; ?></strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="sair.php">| SAIR</a>
                </li>
            </ul>
        </li>
<?php
    };
};
