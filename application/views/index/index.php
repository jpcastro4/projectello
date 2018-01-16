<?php check_manutencao() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NOW X - Rede de Ajuda Mútua - Doações Espontâneas</title>
    <meta name="description" content="Ajuda Mútua Espontânea de ciclos curtos e ganhos mensais. Projeção financeira para desesperados." />
    <meta name="keywords" content="ajuda mutua, financiero, doação espontanea" />
   
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
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/index/css/landio.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/bootbox/sweet-alert.min.css" />
    <meta name="google-site-verification" content="KLoZ7bMLuWNffhMugZ8HS0ykBTVplLHX9a6zePlQ5QE" />
    <?php if( $_SERVER['HTTP_HOST'] != 'localhost'): ?>
       
      <script type="text/javascript">
        window.smartlook||(function(d) {
        var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
        var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
        c.charset='utf-8';c.src='//rec.smartlook.com/recorder.js';h.appendChild(c);
        })(document);
        smartlook('init', '70f078b4641d72e1a1cf1333b01ea8fa660293d3');
    </script>
       
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-88739511-1', 'auto');
      ga('send', 'pageview');

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

  <body>

    <!-- Navigation
    ================================================== -->

    <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"> <img width="120" src="<?php echo base_url()?>assets/index/img/logo.png">
          <span class="sr-only">now x - ajuda mútua</span>
        </a>
        <a class="navbar-toggler hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
        &#9776;
      </a>
        <!-- <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingMobileUser" aria-expanded="false" aria-controls="collapsingMobileUser">
          <span class="icon-user"></span>
        </a> -->
        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">
          <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item nav-item-toggable">
              <a class="nav-link scroll" href="#cadastro">Cadastre-se</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link " href="<?php echo base_url()?>backoffice/login">Backoffice</a>
            </li>
           <!-- <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="ui-elements.html">UI Kit</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a>
            </li>
             <li class="nav-item nav-item-toggable hidden-md-up">
              <form class="navbar-form">
                <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </li>
            <li class="navbar-divider hidden-sm-down"></li>
            <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">
              <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-search"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">
                <form class="navbar-form">
                  <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
                </form>
              </div>
            </li>
            <li class="nav-item dropdown hidden-sm-down textselect-off">
              <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenu2">
                <div class="media">
                  <div class="media-left">
                    <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
                  </div>
                  <div class="media-body media-middle">
                    <h5 class="media-heading">Joel Fisher</h5>
                    <h6>hey@joelfisher.com</h6>
                  </div>
                </div>
                <a href="#" class="dropdown-item text-uppercase">View posts</a>
                <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
                <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>
                <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
                <a href="#" class="btn-circle has-gradient pull-xs-right">
                  <span class="sr-only">Edit</span>
                  <span class="icon-edit"></span>
                </a>
              </div>
            </li> -->
          </ul>
        </div>
    <!--     <div id="collapsingMobileUser" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUser">
          <div class="media m-t-1">
            <div class="media-left">
              <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
            </div>
            <div class="media-body media-middle">
              <h5 class="media-heading">Joel Fisher</h5>
              <h6>hey@joelfisher.com</h6>
            </div>
          </div>
          <a href="#" class="dropdown-item text-uppercase">View posts</a>
          <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
          <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>
          <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
          <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">
            <span class="sr-only">Edit</span>
            <span class="icon-edit"></span>
          </a>
        </div> -->
      </div>
    </nav>

    <!-- Hero Section
    ================================================== -->

    <header class="jumbotron bg-inverse text-xs-center center-vertically" role="banner">
      <div class="container">
        <h1 class="display-3">Você nunca viu algo igual.</h1>
        <h2 class="m-b-3">Rentabilize <em>sem perdas</em>. Faça seu pré-cadastro hoje.</h2>
        <a class="btn btn-secondary-outline m-b-1 scroll" href="#cadastro" role="button"><span class="icon-sketch"></span>Faça seu pré-cadastro</a>
        <!-- <ul class="nav nav-inline social-share">
          <li class="nav-item"><a class="nav-link" href="#"><span class="icon-twitter"></span> 1024</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><span class="icon-facebook"></span> 562</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><span class="icon-linkedin"></span> 356</a></li>
        </ul> -->
      </div>
    </header>

    <!-- Intro
    ================================================== -->
    

    <section class="section-intro bg-faded text-xs-center">
      <div class="container">
        <h3 class="wp wp-1">Construa seu futuro financeiro. Seja parte da revolução</h3>
        <p class="lead wp wp-2">Garanta o bem estar da sua família e ainda ajude seus amigos.</p>
        <img src="<?php echo base_url()?>assets/index/img/mock.png" alt="ajuda mutua" class="img-fluid wp wp-3">
      </div>
    </section>

    <!-- Features
    ================================================== -->

    <section class="section-features text-xs-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-block">
                <span class="icon-pen display-1"></span>
                <h4 class="card-title">CICLOS CURTOS</h4>
                <h6 class="card-subtitle text-muted">Menos de 24h</h6>
                <p class="card-text">Com apenas duas linhas de downlines você já recebe o bastante para evoluir e ir para o final da jornada de recebimentos.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-block">
                <span class="icon-thunderbolt display-1"></span>
                <h4 class="card-title">ULTRA RÁPIDO</h4>
                <h6 class="card-subtitle text-muted">Modern design</h6>
                <p class="card-text">Garanta sua evolução em menos de 80 horas de participação. Fila de doações auto-alimentada por pré-cadastro.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card m-b-0">
              <div class="card-block">
                <span class="icon-heart display-1"></span>
                <h4 class="card-title">AUTOMATIZADO</h4>
                <h6 class="card-subtitle text-muted">Não é planilha</h6>
                <p class="card-text">Um sistema automatizado de bloqueios e evoluções. Gerencie suas doações com apenas um clique.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Video
    ================================================== -->

    <!-- <section class="section-video bg-inverse text-xs-center wp wp-4">
      <h3 class="sr-only">Video</h3>
      <video id="demo_video" class="video-js vjs-default-skin vjs-big-play-centered" controls poster="img/video-poster.jpg" data-setup='{}'>
        <source src="https://www.youtube.com/watch?v=N5J1VRjjTI4" type='video/mp4'>
      </video>
    </section> -->
    <div class="container">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/N5J1VRjjTI4" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>


    <section class="text-center container">
      <div class="row p-y-3" >
        <div class="col-xs-6 col-md-3 p-y-2"><a href="https://chat.whatsapp.com/42i6e8p2Nsf1QNaxPAG5E4" target="_blank"><img width="20%" src="<?php echo base_url() ?>assets/index/img/grupo.png"></a><br/><h5>Grupo Oficial</h5></div>
        <div class="col-xs-6 col-md-3 p-y-2"><a href="#" target="_blank"><img width="20%" src="<?php echo base_url() ?>assets/index/img/youtube.png"></a><br/><h5>Canal Oficial</h5></div>
        <div class="col-xs-6 col-md-3 p-y-2"><a href="#" target="_blank"><img width="20%" src="<?php echo base_url() ?>assets/index/img/facebook.png"></a><br/><h5>Página Oficial</h5></div>
        <div class="col-xs-6 col-md-3 p-y-2"><a href="#" target="_blank"><img width="20%" src="<?php echo base_url() ?>assets/index/img/instagram.png"></a><br/><h5>Perfil Oficial</h5></div>
      </div>
    </section>

    <div class="container ads ">     

            <div class="clearfix hidden-md-up"></div>
          <div class="row">
            <div class="col-xl-12 ">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- NOWX -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3215674587886121"
                       data-ad-slot="7539926294"
                       data-ad-format="auto"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
            </div>
            </div>
    </div>

    <!-- Pricing
    ================================================== -->

    <section class="section-pricing bg-faded text-xs-center">
      <div class="container">
        <h3>Faça seu pré-cadastro na fila de espera</h3>
        <div class="row p-y-3" id="10">
          <div class="col-md-4 p-t-md wp wp-5">
            <div class="card pricing-box">
              <div class="card-header text-uppercase">
                NOW X 10
              </div>
              <div class="card-block">
                <p class="card-title">Entrada com R$10,00</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price" style="font-size:50px">600</span>
                  <small class="text-muted text-uppercase">/mês</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">2 SUPER CICLOS</li>
                <li class="list-group-item">Entrada apenas com convite</li>
              </ul>
              <a href="#10" class="btn btn-primary-outline scroll">EM BREVE</a>
            </div>
          </div>
          <div class="col-md-4 stacking-top">
            <div class="card pricing-box pricing-best p-x-0">
              <div class="card-header text-uppercase">
                NOW X 40
              </div>
              <div class="card-block">
                <p class="card-title">Entrada com R$40,00</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price">3.640</span>
                  <small class="text-muted text-uppercase">/mês</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">3 SUPER CICLOS</li>
                <li class="list-group-item">Lançamento em 01 de janeiro</li>
                <li class="list-group-item">Grupo Fechado</li>
                <li class="list-group-item">Pré-cadastro</li>
                <li class="list-group-item">Após lançamento entrada apenas com convite</li>
              </ul>
              <a href="#cadastro" class="btn btn-primary scroll">Cadastre-se na fila</a>
            </div>
          </div>
          <div class="col-md-4 p-t-md wp wp-6" id="200">
            <div class="card pricing-box">
              <div class="card-header text-uppercase">
                NOW X 200
              </div>
              <div class="card-block">
                <p class="card-title">Entrada com R$200,00</p>
                <h4 class="card-text">
                  <sup class="pricing-box-currency">$</sup>
                  <span class="pricing-box-price" style="font-size:50px">4.800</span>
                  <small class="text-muted text-uppercase">/mês</small>
                </h4>
              </div>
              <ul class="list-group list-group-flush p-x">
                <li class="list-group-item">2 SUPER CICLOS</li>
                <li class="list-group-item">Entrada apenas com convite</li>
                <!-- <li class="list-group-item">Sed risus feugiat fusce</li> -->
              </ul>
              <a href="#200" class="btn btn-primary-outline scroll">EM BREVE</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials
    ================================================== 

    <section class="section-testimonials text-xs-center bg-inverse">
      <div class="container">
        <h3 class="sr-only">Testimonials</h3>
        <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <blockquote class="blockquote">
                <img src="<?php echo base_url()?>assets/index/img/face1.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3">Good design at the front-end suggests that everything is in order at the back-end, whether or not that is the case.</p>
                <footer>Dmitry Fadeyev</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="<?php echo base_url()?>assets/index/img/face2.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3">It’s not about knowing all the gimmicks and photo tricks. If you haven’t got the eye, no program will give it to you.</p>
                <footer>David Carson</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="<?php echo base_url()?>assets/index/img/face3.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3">There’s a point when you’re done simplifying. Otherwise, things get really complicated.</p>
                <footer>Frank Chimero</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="<?php echo base_url()?>assets/index/img/face4.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3">Designing for clients that don’t appreciate the value of design is like buying new tires for a rental car.</p>
                <footer>Joel Fisher</footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote class="blockquote">
                <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                <p class="h3">Every picture owes more to other pictures painted before than it owes to nature.</p>
                <footer>E.H. Gombrich</footer>
              </blockquote>
            </div>
          </div>
          <ol class="carousel-indicators">
            <li class="active"><img src="<?php echo base_url()?>assets/index/img/face1.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0" class="img-fluid img-circle"></li>
            <li><img src="<?php echo base_url()?>assets/index/img/face2.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="1" class="img-fluid img-circle"></li>
            <li><img src="<?php echo base_url()?>assets/index/img/face3.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="2" class="img-fluid img-circle"></li>
            <li><img src="<?php echo base_url()?>assets/index/img/face4.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="3" class="img-fluid img-circle"></li>
            <li><img src="<?php echo base_url()?>assets/index/img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="4" class="img-fluid img-circle"></li>
          </ol>
        </div>
      </div>
    </section>-->

    <!-- Text Content
    ================================================== -->

    <section class="section-text">
      <div class="container">
        <h3 class="text-xs-center">Capitalização através da ajuda mútua.</h3>
        <div class="row p-y-3">
          <div class="col-md-5">
            <p class="wp wp-7">Regulamentada pela lei brasileira a ajuda mútua é um processo de inteira confiança pois você exerce um ato de confiança e recebe multiplicado.</p>
          </div>
          <div class="col-md-5 col-md-offset-2 separator-x">
            <p class="wp wp-8">Ciclos mais curtos, recebimentos mais rápidos, evolução por níveis de ganho, reentradas e doações diretadas e automáticas, sem acúmulo de valores. </p>
          </div>
        </div>
      </div>
    </section>

    <!-- News
    ================================================== 

    <section class="section-news">
      <div class="container">
        <h3 class="sr-only">News</h3>
        <div class="bg-inverse">
          <div class="row">
            <div class="col-md-6 p-r-0">
              <figure class="has-light-mask m-b-0 image-effect">
                <img src="https://images.unsplash.com/photo-1442328166075-47fe7153c128?q=80&fm=jpg&w=1080&fit=max" alt="Article thumbnail" class="img-fluid">
              </figure>
            </div>
            <div class="col-md-6 p-l-0">
              <article class="center-block">
                <span class="label label-info">Featured article</span>
                <br>
                <h5><a href="#">Design studio with product designer Peter Finlan <span class="icon-arrow-right"></span></a></h5>
                <p class="m-b-0">
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                </p>
              </article>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-push-6 p-l-0">
              <figure class="has-light-mask m-b-0 image-effect">
                <img src="https://images.unsplash.com/photo-1434394673726-e8232a5903b4?q=80&fm=jpg&w=1080&fit=max" alt="Article thumbnail" class="img-fluid">
              </figure>
            </div>
            <div class="col-md-6 col-md-pull-6 p-r-0">
              <article class="center-block">
                <span class="label label-info">Featured article</span>
                <br>
                <h5><a href="#">How bold, emotive imagery can connect with your audience <span class="icon-arrow-right"></span></a></h5>
                <p class="m-b-0">
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-tag"></span> Design Studio</span></a>
                  <a href="#"><span class="label label-default text-uppercase"><span class="icon-time"></span> 1 Hour Ago</span></a>
                </p>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Sign Up
    ================================================== -->

    <div class="container ads ">     

            <div class="clearfix hidden-md-up"></div>
          <div class="row">
            <div class="col-xl-12 ">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- NOWX -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3215674587886121"
                       data-ad-slot="7539926294"
                       data-ad-format="auto"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
            </div>
            </div>
    </div>

    <section class="section-signup bg-faded" id="cadastro">
      <div class="container" style="max-width:600px;">

      	<div class="alert alert-danger text-center"> Grupo Fechado </div>
        <!-- <h3 class="text-xs-center m-b-3">Cadastro aberto para NOW X 40</h3>
        <form id="precadastro" method="post" action="registroPreCadastro" >
          <div class="row">

                <?php if(isset($_GET['af'])) :?>
                <input type="hidden" name="af" class="form-control form-control-lg" id="af" value="<?php echo $_GET['af'] ?>" >
                <?php endif;?>

            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-name">
                <label class="sr-only" for="nome">Seu nome</label>
                <input type="text" name="nome" class="form-control form-control-lg" id="nome" placeholder="Seu nome">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-name">
                <label class="sr-only" for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control form-control-lg" id="sobrenome" placeholder="Sobrenome">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-email">
                <label class="sr-only" for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email" autocomplete="off" >
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-cpf">
                <label class="sr-only" for="cpf">CPF</label>
                <input type="tel" name="cpf" maxlength="11" minlength="11" class="form-control form-control-lg" id="cpf" placeholder="CPF">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-whatsapp">
                <label class="sr-only" for="telefone">Telefone (WHATSAPP)</label>
                <input type="tel" name="telefone" minlength="9" class="form-control form-control-lg" id="telefone" placeholder="Telefone (Whatsapp)" >
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-password">
                <label class="sr-only" for="senha">Crie uma senha</label>
                <input type="password" name="senha" class="form-control form-control-lg" id="senha" placeholder="Crie uma senha" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-password">
                <label class="sr-only" for="senha_confirma">Confirme sua senha</label>
                <input type="password" name="senha_confirma" class="form-control form-control-lg" id="senha_confirma" placeholder="Confirme a senha" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <label class="c-input c-checkbox">
                <input type="checkbox" required >
                <span class="c-indicator"></span> Aceito os termos e condições.
              </label>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Confirmar pré-cadastro</button>
              </div>
            </div>
          </div>
          
        </form> -->
      </div>
    </section>

    <!-- Footer
    ================================================== -->

    <footer class="section-footer bg-inverse" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="media">
              <div class="media-left"><img width="90" src="<?php echo base_url()?>assets/index/img/logo.png">
                <!-- <span class="media-object icon-logo display-1"></span> -->
              </div>
              <small class="media-body media-bottom">
                &copy; now x - Ajuda Mútua. <br>
                Doações espontâneas.
              </small>
            </div>
          </div>
         <!--  <div class="col-md-6 col-lg-7">
            <ul class="nav nav-inline">
              <li class="nav-item">
                <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
              <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a></li>
              <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>

    <script src="<?php echo base_url()?>assets/bo/assets/js/bootbox-page/sweet-alert.min.js"></script>

    <script type="text/javascript">

    var nowx = '<?php echo base_url() ?>ajax_functions/';
      
    $(document).ready(function(){

      $('a.scroll').on('click',function(e){
        e.preventDefault();
        $('html,body').animate({ scrollTop:$(this.hash).offset().top }, 800);
      })

        $('#precadastro').on('submit', function(event){
            event.preventDefault();

            $(this).find('[required]').each(function(e){
                if ( $(this).val() == '' )
                {
                    $(this).focus();

                    swal('Erro', 'Campo vazio', 'error');

                    return;
                } 
            });

            var form = $(this);

            $.post(nowx+$(this).attr('action'), $(this).serialize(), function(data){

                if(data.result == 'error'){
                    swal('Erro', data.message, 'error');                 
                }

                if(data.result == 'success'){
                    swal('Sucesso', data.message, 'success');

                    $('#precadastro input').val('');
                }

                if(data.clear == true ){

                  $('#precadastro input').val('');
                }

            }, 'json')
            .fail( function(data){

                swal('Erro', 'Volte mais tarde', 'error');

            });

        });

    });
    </script>
  </body>
</html>
