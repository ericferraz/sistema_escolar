<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Sistema escolar</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- 888888888888888888888 ESTILOS 88888888888888888888888888888888888888888888-->
        <!-- estilos básicos -->
        <link href="<?php echo base_url() . DIR_ASSETS_CSS ?>bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>font-awesome.min.css" />
        <!-- FONTAWESOME NOVO -->
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>font-awesome.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- estilos básicos FIM -->

        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>ace-fonts.css" />
        <!-- fonts FIM -->

        <!-- estilos do template ACE -->
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>ace.css" />
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>ace-rtl.css" />
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>main.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url() . DIR_ASSETS_CSS ?>ace-ie.min.css" />
        <![endif]-->
        <!-- estilos do template ACE FIM -->

        <!-- suporte do html5 no ie8 -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>html5shiv.js"></script>
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>respond.min.js"></script>
        <![endif]-->
        <!-- suporte do html5 no ie8 FIM -->
        <!-- 888888888888888888888 ESTILOS FIM 8888888888888888888888888888888888888888-->


        <!-- ##################### SCRIPTS ############################################-->
        <!-- Scripts básicos -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url() . DIR_ASSETS_JS ?>jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>
        <!-- <![endif]-->
        <!--[if IE]>
        <script type="text/javascript">
         window.jQuery || document.write("<script src='<?php echo base_url() . DIR_ASSETS_JS ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo base_url() . DIR_ASSETS_JS ?>jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>bootstrap.min.js"></script>
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>typeahead-bs2.min.js"></script>
        <!-- Scripts básicos FIM -->
        <script type="text/javascript" src="<?php echo base_url().DIR_ASSETS_JS.'jquery.maskedinput.min.js'; ?>">
        </script>

        <!-- Bibliotecas de plugins específicos desta página -->
        <!--[if lte IE 8]>
          <script src="<?php echo base_url() . DIR_ASSETS_JS ?>excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>jquery-ui-1.10.3.custom.min.js"></script>
        
        <!-- Bibliotecas de plugins específicos desta página FIM -->


        <!-- scripts do template ACE -->
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>ace-elements.min.js"></script>
        <script src="<?php echo base_url() . DIR_ASSETS_JS ?>ace.min.js"></script>
        <!-- scripts do template ACE FIM -->
        <script type="text/javascript">
        </script>

        <!-- ##################### SCRIPTS FIM ########################################-->

    </head>

<body>
    <div class="navbar navbar-default" id="navbar">
        <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="<?php echo base_url() ?>index" class="navbar-brand">
                    <i class="logo-menor"></i>
                </a><!-- /.brand -->
            </div><!-- /.navbar-header -->
            <div class="navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li style="border:none;">
                        <a class="no-bg" style="border:none;">								
                            <span class="user-info" style="border:none;">
                                <small>Muito bem vindo</small>
                                Administrador!
                            </span>
                        </a>
                    </li>
                    <li style="border:none;">
                        <a class="no-bg" title="Sair do sistema" href="#">
                            <div class="btn btn-xs btn-danger"><i class="fa fa-sign-out"></i></div>
                        </a>
                    </li>
                </ul><!-- /.ace-nav -->
            </div><!-- /.navbar-header -->
        </div><!-- /.container -->
    </div>

    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <!-- %%%%%%%%%%%%%%%%%%%%%%% MENU %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
            <div class="sidebar" id="sidebar">

                <ul class="nav nav-list">
                    <!-- CATEGORIA -->
                    <li>
                        <!-- TITULO -->
                        <a href="<?php echo base_url() ?>index" class="dropdown-toggle">
                            <i class="icon-home"></i>
                            <span class="menu-text"> Página Inicial </span>
                        </a>
                        <!-- FIM TITULO -->
                    </li>
                    <!-- FIM CATEGORIA -->
                    <!-- MUNICIPIOS -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-globe"></i>
                            <span class="menu-text"> Países </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>pais/">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar país
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>pais/listar">
                                    <i class="icon-double-angle-right"></i>
                                    Listar países
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->
                    
                    <!-- MUNICIPIOS -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-globe"></i>
                            <span class="menu-text"> Estados </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>estado/">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar estado
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>estado/listar">
                                    <i class="icon-double-angle-right"></i>
                                    Listar estados
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->

                    <!-- MUNICIPIOS -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-globe"></i>
                            <span class="menu-text"> Municípios </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>municipio/">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar município
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>municipio/listar">
                                    <i class="icon-double-angle-right"></i>
                                    Listar municípios
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->
                    
                    <!-- CURSOS -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-pencil"></i>
                            <span class="menu-text"> Cursos </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>curso/">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar curso
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>curso/listar">
                                    <i class="icon-double-angle-right"></i>
                                    Listar cursos
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->
                    
                    <!-- TURMAS -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-ticket"></i>
                            <span class="menu-text"> Turmas </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>turma/">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar turma
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url() ?>turma/listar">
                                    <i class="icon-double-angle-right"></i>
                                    Listar turmas
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->


                    <!-- ALUNO -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-user"></i>
                            <span class="menu-text"> Alunos </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url().'aluno/' ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Cadastrar aluno
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url().'aluno/listar' ?>">
                                    <i class="icon-double-angle-right"></i>
                                     Listar alunos
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->
                    
                     <!-- ALUNO -->
                    <li>
                        <!-- TITULO -->
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-paperclip"></i>
                            <span class="menu-text"> Matriculas </span>
                        </a>
                        <!-- FIM TITULO -->

                        <!-- SUBCATEGORIAS -->
                        <ul class="submenu">
                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url().'matricula/' ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Matricular aluno
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                            <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url().'matricula/listar' ?>">
                                    <i class="icon-double-angle-right"></i>
                                     Listar matriculas
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->
                            
                             <!-- REPETE SUBCATEBORIA -->
                            <li>
                                <a href="<?php echo base_url().'matricula/relatorio' ?>">
                                    <i class="icon-double-angle-right"></i>
                                     Relatório de matriculas
                                </a>
                            </li>
                            <!-- FIM REPETE CATEGORIA -->

                        </ul>
                        <!-- FIM SUBCATEGORIAS -->
                    </li>
                    <!-- FIM CATEGORIA -->
                   
                    
                </ul><!-- /.nav-list -->

            </div>
            <!-- %%%%%%%%%%%%%%%%%%%%%%% MENU FIM %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

            <!-- localização do usuário no painel -->
            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">						

                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="<?php echo base_url(); ?>index">Inicial</a>
                        </li>
                        ﻿							
                    </ul><!-- .breadcrumb -->

                    <div class="data-atual">
                        <div id="relogio">
                            <script language=javascript type="text/javascript">
                                document.write(dayName[now.getDay() ] + ", " + now.getDate() + " de " + monName [now.getMonth() ] + " de " + now.getFullYear() + "<div id='txt' style='clear:both'></div>")
                            </script>
                        </div>
                    </div>
                </div>
                <!-- localização do usuário no painel FIM -->
                <?php echo $contents; ?>
   </div><!-- /.main-content -->
            </div><!-- /.main-container-inner -->
        </div><!-- /.main-container -->

    </body>
</html>