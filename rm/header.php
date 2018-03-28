<?php 

  check_session();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pg_nivel_1 ?> - CENSUS - Sistema para Gestão de Pesquisas</title>
    <meta name="description" content="Sistema de Administração de Pesquisas - Census Pesquisas" />
    <meta name="author" content="João Paulo de Castro" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/img/res/icon-48-mdpi.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/img/res/icon-72-hdpi.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/img/res/icon-72-hdpi.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/res/icon-72-hdpi.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/img/res/icon-144-xxhdpi.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/img/res/icon-144-xxhdpi.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/img/res/icon-192-xxxhdpi.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/img/res/icon-192-xxxhdpi.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/img/res/icon-192-xxxhdpi.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/res/icon-36-ldpi.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/res/icon-192-xxxhdpi.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/res/icon-96-xhdpi.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/res/icon-36-ldpi.png" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url()?>assets/index/img/favicon/manifest.json">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/res/favicon.png">
    <meta name="msapplication-TileColor" content="#4ACC99">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#4ACC99">
    <!-- Only needed Bootstrap bits + custom CSS in one file -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/7cbf6b3d85.js"></script>

    <script type="text/javascript">var ajaxUrl = '<?php echo base_url('ajax_functions/'); ?>'; </script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dashboard/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dashboard/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/dashboard/js/trumbowyg/dist/ui/trumbowyg.min.css">
  </head>

  <body class="bg-faded">

    <div class="container-fluid hidden-md-up">
       <div class="row ">
            <div class="col-12 col-sm-12 col-md-2 bg-black-md ">
              <div class="row align-items-center text-center head header-princ-menu ">
                    <div class="title title-1 col-12 "><img width="20" class="mr-3" src="<?php echo base_url('assets/img/res/icon-192-xxxhdpi.png') ?>" /> Dashboard</div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars font-branco"></span></button>
                </div>
            </div>
            <div class="col-4 bg-grey-md1">
                <div class="row align-items-center head header-sec-menu ">
                    <div class="col-12">
                        <div class="title title-2 w-100 text-center mb-1"> <?php //echo $pg_icone ?>  <span class="pull-right"> <?php echo $pg_nivel_1 ?>  </span></div>
                    </div>
                </div>
            </div>
            <div class="col-8 bg-grey-md1 ">
                <a href=""  data-toggle="collapse" data-target="#menu-secundario" >
                <div class="row align-items-center head header-contain ">
                    <div class="col-12">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> <span class="fa fa-chevron-down pr-3 pull-right"></span></h1> 
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

  <!-- INICIO TEMPLATE  -->
  <div class="container-fluid height-100">
    <div class="row h-100">

        <!-- MENU PRINCIPAL -->
        <div class="col-12 col-md-3 col-lg-2 bg-black-md height-100 hidden-sm-up <?php if($this->agent->is_mobile() ): echo 'collapse'; endif;?>" id="menuprincipal">
            <div class="row align-items-center head header-princ-menu pd-20 text-center hidden-sm-down ">
                <div class="title title-1 col-12"><img width="25" class="mr-3" src="<?php echo base_url('assets/img/res/icon-192-xxxhdpi.png') ?>" /> Dashboard</div>
            </div>
            <div class="row">
                <hr class="separador-preto w-100 clearfix">
            </div>
            <div class="row">
                <div class="col-12 py-1 px-3 ">
                    <ul class="menu-vert menu-prim">
                        <li><a class="<?php if( !empty($pg_inicio) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard"><i class="fa fa-home"></i> Início </a></li>
                        <li><a class="<?php if( !empty($pg_administrativo) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard/administrativo"><i class="fa fa-building"></i> Administrativo </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard/pesquisas"><i class="fa fa-line-chart"></i> Pesquisas </a></li>
                    </ul>
                </div>
            <hr class="separador-preto w-100 clearfix">
            </div>
            <div class="row">
                <div class="col-12 py-1 px-3">
                    <ul class="menu-vert menu-prim">
                        <li><a class="<?php if( !empty($pg_configuracoes) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/configuracoes"><i class="fa fa-cogs"></i> Configurações</a></li>
                        <li><a  href="<?php echo base_url() ?>sair"><i class="fa fa-sign-out"></i> Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-menu col-menu-prim bg-black-md height-100 hidden-sm-down" id="menuprincipal">
            <div class="row align-items-center head header-princ-menu pd-20 text-center hidden-sm-down ">
                <div class="title title-1 col-12"><img width="28"  src="<?php echo base_url('assets/img/res/icon-192-xxxhdpi.png') ?>" /></div>
            </div>
            <div class="row">
                <hr class="separador-preto w-100 clearfix">
            </div>
            <div class="row">
                <div class="col-12 py-1 px-3 ">
                    <ul class="menu-vert menu-prim menu-screen">
                        <li data-toggle="tooltip" data-placement="right" title="Início" ><a class="<?php if( !empty($pg_inicio) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard" ><i class="fa fa-home"></i> </a></li>
                        <li data-toggle="tooltip" data-placement="right" title="Administrativo"><a class="<?php if( !empty($pg_administrativo) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard/administrativo" ><i class="fa fa-building"></i> </a></li>
                        <li data-toggle="tooltip" data-placement="right" title="Pesquisas"><a class="<?php if( !empty($pg_pesquisas) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard/pesquisas" ><i class="fa fa-line-chart"></i> </a></li>
                    </ul>
                </div>
            <hr class="separador-preto w-100 clearfix">
            </div>
            <div class="row">
                <div class="col-12 py-1 px-3">
                    <ul class="menu-vert menu-prim menu-screen">
                        <li data-toggle="tooltip" data-placement="right" title="Configurações"><a class="<?php if( !empty($pg_configuracoes) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/configuracoes" ><i class="fa fa-cogs"></i></a></li>
                        <li data-toggle="tooltip" data-placement="right" title="Sair"><a  href="<?php echo base_url() ?>sair" ><i class="fa fa-sign-out"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    
    
