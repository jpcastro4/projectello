<?php 

  //check_adm_session();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TrackSeg - <?php echo $titulo; ?></title>
<!--     <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url()?>assets/index/img/favicon/manifest.json">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico"> -->
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <!-- Only needed Bootstrap bits + custom CSS in one file -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/7cbf6b3d85.js"></script>

    <script type="text/javascript">var ajaxUrl = '<?php echo base_url('ajax_functions/'); ?>'; </script>

    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/bootbox/sweet-alert.min.css" /> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css">  
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/rede.css"> -->


  </head>

  <body class="bg-faded bg-grey-md1">
  <div class="loading ">
        <div class="sk-fading-circle">
        <div class="sk-circle1 sk-circle"></div>
        <div class="sk-circle2 sk-circle"></div>
        <div class="sk-circle3 sk-circle"></div>
        <div class="sk-circle4 sk-circle"></div>
        <div class="sk-circle5 sk-circle"></div>
        <div class="sk-circle6 sk-circle"></div>
        <div class="sk-circle7 sk-circle"></div>
        <div class="sk-circle8 sk-circle"></div>
        <div class="sk-circle9 sk-circle"></div>
        <div class="sk-circle10 sk-circle"></div>
        <div class="sk-circle11 sk-circle"></div>
        <div class="sk-circle12 sk-circle"></div>
</div>
  </div>
   <!--  <div class="container-fluid hidden-md-up">
       <div class="row">
            <div class="col-12 col-sm-12 col-md-2 bg-black-md ">
              <div class="row head header-princ-menu pd-10 text-center">
                    <div class="title title-1 col-12 ">Dashboard</div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars font-branco"></span></button>
                </div>
            </div>
            <div class="col-4 bg-grey-md1">
                <div class="row head header-sec-menu pd-10">
                    <div class="title title-2 w-100 text-center mb-1"> <?php //echo $pg_icone ?>  <span class="pull-right"> <?php echo $titulo_1 ?>  </span></div>
                </div>
            </div>
            <div class="col-8 bg-grey-md1 ">
                <a href=""  data-toggle="collapse" data-target="#menu-secundario" >
                <div class="row head header-contain pd-10">
                    <div class="col-12">
                        <h1 class="title title-2 text-center"> Menu </h1>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div> -->

  <!-- INICIO TEMPLATE  -->
  <div class="container-fluid sticky-top">
    <div class="row">

    <!-- MENU PRINCIPAL -->
        <div class="col-12 col-md-3 col-lg-2 bg-black-md " >
            <div class="row head header-princ-menu pd-20 text-center ">
                <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-expanded="false" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars font-branco"></span></button>
                <div class="title title-1 col-12">Dashboard</div>
                
            </div>
            <div class="row hidden-md-up <?php if($this->agent->is_mobile() ): echo ''; endif;?> collapse navbar-collapse" id="menuprincipal">
                <hr class="separador-preto w-100 clearfix">
                <div class="col-12 py-1 px-4 ">
                    <ul class="menu-vert menu-prim">
                        <li><a class="<?php if( !empty($pg_inicio) ){ echo 'ativo '; } ?>"  href="<?php echo base_url()?>administrativo"><i class="fa fa-home"></i> Início </a></li>
                        <li><a class="<?php if( !empty($pg_administrativo) ){ echo 'ativo '; } ?>"  href="<?php echo base_url()?>administrativo/corretores"><i class="fa fa-building"></i> Corretores </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas) ){ echo 'ativo '; } ?>"  href="<?php echo base_url()?>administrativo/sair"><i class="fa fa-line-chart"></i> Sair </a></li>
                    </ul>
                </div>
                
                <!--<hr class="separador-preto w-100 clearfix">
             
                 <div class="col-12 py-1 px-4">
                    <ul class="menu-vert menu-prim">
                        <li><a href="<?php echo base_url() ?>dashboard/configuracoes"><i class="fa fa-cogs"></i> Configurações</a></li>
                    </ul>
                </div> -->
            </div>
        </div>


        <div class="col-12 col-md-3 col-lg-2 bg-grey-md2 <?php if($this->agent->is_mobile() ): echo 'collapse'; endif;?>" id="menu-secundario">
            <div class="row align-items-center head header-sec-menu pd-20 hidden-sm-down">
                <div class="title title-2 col-12 "><i class="fa fa-line-chart fa-align-right"></i> <span class="pull-right"> <?php echo $pg_titulo_1 ?>  </span></div>
            </div>
        </div>
        <?php if(!$this->agent->is_mobile() ): ?>
        <div class="col-12 col-md-8  bg-grey-md1 ">
            <div class="row align-items-center head text-right header-contain pd-20">
                <div class="col-12">
                <nav class=" ">
                    <ul class="navbar-menu-screen text-right clearfix">
                        <li class=""><a href="<?php echo base_url()?>admin" class="font-branco ">  Início  </a></li>
                        <!-- <li class=""><a href="<?php echo base_url()?>admin" class="font-branco "> Empreendimentos  </a> </li> -->
                        <li class=""><a href="<?php echo base_url()?>admin/corretores" class="font-branco "> Corretores  </a> </li>
                        <li class=""><a href="<?php echo base_url()?>admin/sair" class="font-branco "> Sair  </a> </li>
                    </ul>
                </nav>
                    
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>


<div class="container-fluid ">
    <div class="row ">
