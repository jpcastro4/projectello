<?php

  check_session();
 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8"/>
<title><?php echo config_site("nome_site");?> | <?php echo $titulo;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
   <!--  <link href="<?php echo base_url();?>assets/ajuda/stylesheets/bootstrap.css" rel="stylesheet" type="text/css" /> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url();?>assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/ajuda/stylesheets/bootstrap-tour.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.css">
    
    <link href="<?php echo base_url();?>assets/ajuda/images/favicon.ico" rel="icon" type="image/ico" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Smartsupp Live Chat script -->
    <!-- Start of Smartsupp Live Chat script -->
    <link rel="shortcut icon" href="<?php echo base_url("uploads/".config_site('favicon'));?>"/>
    <?php if( !$this->native_session->get('superuser') ): ?>
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '4bda0b6f2e1bbbb42073c716892e42dca2b2f079';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
    <script>
          smartsupp('email', '<?php echo $this->painel_model->user('email'); ?>');
          smartsupp('name', '<?php echo $this->painel_model->user('nome'); ?>');
        </script>
        <script>
        smartsupp('variables', {
          userId: {
            label: 'ID ',
            value: '<?php echo $this->painel_model->user('id'); ?>'
          },
          login: {
            label: 'Login',
            value: '<?php echo $this->painel_model->user('login'); ?>'
          },
          ciclo: {
            label: 'Ciclo',
            value: '<?php echo $this->painel_model->user('ciclo'); ?>'
          }
        });
      </script>
    
    <?php endif; ?>

    <?php  if(! $_SERVER['HTTP_HOST'] == 'localhost'): ?>
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-86823466-1', 'auto');
      ga('send', 'pageview');
      ga('set', '<?php echo $this->painel_model->user('id'); ?>', {{USER_ID}}); // Defina o ID de usuário usando o user_id conectado.

    </script>

    <?php endif;?>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3215674587886121",
        enable_page_level_ads: true
      });
    </script>
</head>
<!-- END HEAD -->

<body class="main page">

<div class="loading">
  <div class="spinner">
    <div class="sk-cube-grid">
      <div class="sk-cube sk-cube1"></div>
      <div class="sk-cube sk-cube2"></div>
      <div class="sk-cube sk-cube3"></div>
      <div class="sk-cube sk-cube4"></div>
      <div class="sk-cube sk-cube5"></div>
      <div class="sk-cube sk-cube6"></div>
      <div class="sk-cube sk-cube7"></div>
      <div class="sk-cube sk-cube8"></div>
      <div class="sk-cube sk-cube9"></div>
    </div>
  </div>
</div>
    <!-- Navbar -->
    <div class="navbar" id="navbar">
      <a class="navbar-brand" href="<?php echo base_url();?>painel">
        <img width="230" src="<?php echo base_url();?>assets/ads-logo-painel.png" />
      </a>
    </div>

    <div id="wrapper"> 
      <!-- Sidebar -->
      <section id="sidebar">

         <i class="fa fa-align-justify fa fa-large pd-menu-icon  hidden-xs hidden-sm" ></i>

         <i class="fa fa-close fa fa-1x pd-menu-icon menu-icon-mob-close hidden-md hidden-lg" style="color:#fff"></i>

        <ul class="" id="dock">
          <li class="<?php echo (isset($pg_conta)) ? 'active' : '';?> launcher">
            <i class="fa fa-home"></i>
            <a href="<?php echo base_url('painel/conta');?>">Contas</a>
          </li>
          <li class="<?php echo (isset($pg_painel)) ? 'active' : '';?> launcher">
            <i class="fa fa-dashboard"></i>
            <a href="<?php echo base_url('painel');?>">Painel</a>
          </li>
          <li class="launcher <?php echo (isset($pg_perfil)) ? 'active' : '';?> ">
            <i class="fa fa-user"></i>
            <a href="<?php echo base_url('painel/perfil');?>">Perfil</a>
          </li>
          <li class="launcher dropdown hover <?php echo (isset($pg_indicados)) ? 'active' : '';?>">
            <i class="fa fa-group"></i>
            <a href="#">Rede</a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Sua rede</li>
              <li>
                <a href="<?php echo base_url('painel/indicados');?>">Por Tabela</a>
              </li>
              <li>
                <a href="<?php echo base_url('painel/organograma');?>">Organograma</a>
              </li>
            </ul>
          </li>
         <!--  <li class="launcher <?php echo (isset($pg_publicador)) ? 'active' : '';?> ">
            <i class="fa fa-user"></i>
            <a href="<?php echo base_url('painel/publicador');?>">Divulgador</a>
          </li> -->
          <li class="launcher ">
            <i class="fa fa-power-off"></i>
            <a href="<?php echo base_url('painel/sair');?>">Sair</a>
          </li>
        <!--  <li class="launcher">
            <i class="fa fa-bookmark"></i>
            <a href="#">Bookmarks</a>
          </li>
           <li class="launcher">
            <i class="fa fa-cloud"></i>
            <a href="#">Backup</a>
          </li> 
          <li class="launcher">
            <i class="fa fa-bug"></i>
            <a href="#">Feedback</a>
          </li>-->
        </ul>
        <a href="#" id="startTour"><div id="beaker" title="Made by lab2023"></div></a>
      </section>
      <!-- Tools -->
      <section id="tools">

        

        <!-- <div id="toolbar">
          <div class="btn-group">
            <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Building">
              <i class="fa fa-building"></i>
            </a>
            <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Laptop">
              <i class="fa fa-laptop"></i>
            </a>
            <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Calendar">
              <i class="fa fa-calendar"></i>
              <span class="badge">3</span>
            </a>
            <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Lemon">
              <i class="fa fa-lemon"></i>
            </a>
          </div>
          <div class="label label-danger">
            Danger
          </div>
          <div class="label label-info">
            Info
          </div>
        </div> -->
        <div class="navbar navbar-default" id="navbar">
          <span class="pd-menu-icon menu-icon-mob-open col-xs-1 hidden-md hidden-lg"><i class="fa fa-align-justify fa fa-large" ></i></span>
          <ul class="nav navbar-nav pull-right">
            
            <li><a href="#"><strong><?php echo $this->painel_model->user('nome'); ?><span style="color:#bdc3c7 !important"> - <?php echo $this->painel_model->user('id'); ?></span></strong></a> </li> <li><a href="#">por <?php echo $this->painel_model->infoUser($this->painel_model->indicador() )->nome; ?><span style="color:#bdc3c7 !important"> - <?php echo $this->painel_model->indicador(); ?></span></a></li>
          </ul>
        </div>
      </section>

