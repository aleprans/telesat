<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/inicial.css">

    <link rel="shortcut icon" href="<?php echo $icon ?>" type="image/x-icon">
    <title><?php echo $title ?></title>

    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md " >
    
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-wifi"></i> <span><?php echo $title ?></span></a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="imagens/rosto.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bem vindo!,</span>
                            <h2><?php echo $_SESSION['usuario']['usu'] ?></h2><br>
                            <h6>Nivel: <?php
                                        if ($_SESSION['usuario']['niv'] == 0) {
                                            echo "Usuário";
                                        } else {
                                            echo "Administrador";
                                        } ?></h6>
                        </div>
                    </div>

                    <br />

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu do Sistema</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo $pginicial ?>">Pagina Inicial</a></li>
                                <li><a href="<?php echo $clientes ?>">Clientes</a></li>
                                <li><a href="<?php echo $produtos ?>">Produtos</a></li>
                                <li><a><i class="fa fa-edit"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo $caixa ?>">Caixa</a></li>
                                        <li><a href="<?php echo $ent ?>">Entrada Manual</a></li>
                                        <li><a href="<?php echo $sai ?>">Saida manual</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo $usuarios ?>">Usuarios</a></li>
                            </ul>
                        </div>
                        
                    </div>


                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            