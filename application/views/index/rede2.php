<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>REDE</title>
    <meta name="description" content="REDE" />
    <meta name="keywords" content="Veja a rede" />
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
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <!-- Only needed Bootstrap bits + custom CSS in one file -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/index/css/landio.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/rede.css">
    
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
  </head>

  <body class="bg-faded">
    
    <!-- DARK navigation
    ================================================== -->

    <nav class="navbar navbar-dark bg-inverse">
      <div class="container">
        <a class="navbar-brand text-center" href="index.html">
          <img width="120" src="<?php echo base_url()?>assets/index/img/logo.png">
          <span class="sr-only">Lista</span>
        </a>
        <!-- <a class="navbar-toggler hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingNavbarInverse" aria-expanded="false" aria-controls="collapsingNavbarInverse">
        &#9776;
      </a>
        <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingMobileUserInverse" aria-expanded="false" aria-controls="collapsingMobileUserInverse">
          <span class="icon-user"></span>
        </a>
        <div id="collapsingNavbarInverse" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbarInverse">
          <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="http://tympanus.net/codrops/?p=25217" target="_blank">Codrops</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="./index.html">Land.io</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="./index-carousel.html">Slides</a>
            </li>
            <li class="nav-item nav-item-toggable active">
              <a class="nav-link" href="ui-elements.html">UI Kit <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a>
            </li>
            <li class="nav-item nav-item-toggable hidden-sm-up">
              <form class="navbar-form">
                <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </li>
            <li class="navbar-divider hidden-sm-down"></li>
            <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">
              <a class="nav-link dropdown-toggle" id="dropdownMenuInverse1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-search"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenuInverse1">
                <form class="navbar-form">
                  <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
                </form>
              </div>
            </li> 
            <li class="nav-item dropdown hidden-sm-down">
              <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenuInverse2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php //echo base_url()?>assets/index/img/face5.jpg" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenuInverse2">
                <div class="media">
                  <div class="media-left">
                    <img src="<?php //echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
                  </div>
                  <div class="media-body media-middle">
                    <h5 class="media-heading"><?php //echo $afiliado->afiliado->nome ?></h5>
                    <h6><?php //echo $afiliado->afiliado->email ?></h6>
                  </div>
                </div>
              <!--   <a href="#" class="dropdown-item text-uppercase">View posts</a>
                <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
                <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a> 
                <a href="<?php //echo base_url()?>afiliado/sair" class="dropdown-item text-uppercase text-muted">Log out</a>-->
                <!-- <a href="#" class="btn-circle has-gradient pull-xs-right">
                  <span class="sr-only">Edit</span>
                  <span class="icon-edit"></span>
                </a> 
              </div>
            </li>
          </ul>
        </div>
        <div id="collapsingMobileUserInverse" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUserInverse">
          <div class="media m-t-1">
            <div class="media-left">
              <img src="<?php //echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
            </div>
            <div class="media-body media-middle">
              <h5 class="media-heading"><?php //echo $afiliado->afiliado->nome ?></h5>
              <h6><?php //echo $afiliado->afiliado->email ?></h6>
            </div>
          </div>-->
         <!--  <a href="#" class="dropdown-item text-uppercase">View posts</a>
          <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
          <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a> 
          <a href="<?php //echo base_url()?>" class="dropdown-item text-uppercase text-muted">Log out</a>
           <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">
            <span class="sr-only">Edit</span>
            <span class="icon-edit"></span>
          </a> -->
        </div>
      </div>
    </nav>

    <hr class="invisible">

    <div class="rede container-fluid">
    <div class="row">
      <hr class="invisible">
    <div class="col-sm-12 col-md-12 tree-responsive clearfix">
    <?php if( isset($mensagem) ) echo $mensagem; ?>
          
              <div class="zoomViewport">
                 
              <?php $indicados = $this->backoffice_model->RedeFilhos(1147); ?>

<!-- <pre>
              <?php //var_dump($indicados)?>
</pre> -->
              <?php if(!empty($indicados) ):  ?>

                <div class="tree row zoomContainer" id="draggable">
                  <ul>
                  <?php foreach($indicados as $indicador => $filho): ?>
                      <li class="indicador" ><!--<div class="avatar-frame">
                      <img class="user-pic" width=80" src="<?php echo base_url(); ?>/ass/default_avatar.png"></div>-->
                      <a href="#"><?php //echo $indicador; ?></br> <?php echo $this->backoffice_model->infoUser($indicador)->nome ?></a>
                      <?php if(!empty($filho) ):  ?>
                          <ul class="ciclo1">
                          <?php foreach($filho as $filhoId): ?>
                              
                                <li>
                                    <!--<div class="avatar-frame">
                                    <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> 
                                    </div>-->
                                    <a class="" href="#">L: <?php echo $filhoId; ?> - C: <?php echo $this->backoffice_model->infoUser($filhoId)->conta_id; ?></br> <?php echo $this->backoffice_model->infoUser($filhoId)->nome; ?></a>
                              
                                  <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $filhoId ); ?>
                                                  
                                  <?php  if($indicadosNetos == null) :  ?>

                                  <?php else:?>

                                      <ul class="ciclo2">
                                      <?php foreach($indicadosNetos as $neto): ?>
                                        
                                          <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                          <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br> <?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>


                                              <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                          <?php  if($indicadosNetos == null) :  ?>

                                          <?php else:?>

                                              <ul class="ciclo2">
                                              <?php foreach($indicadosNetos as $neto): ?>
                                                
                                                  <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                  <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>



                                                      <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                  <?php  if($indicadosNetos == null) :  ?>

                                                  <?php else:?>

                                                      <ul class="ciclo2">
                                                      <?php foreach($indicadosNetos as $neto): ?>
                                                        
                                                          <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> 
                                                        </div>-->  <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>




                                                                <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                            <?php  if($indicadosNetos == null) :  ?>

                                                            <?php else:?>

                                                                <ul class="ciclo2">
                                                                <?php foreach($indicadosNetos as $neto): ?>
                                                                  
                                                                    <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                    <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>



                                                                        <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                    <?php  if($indicadosNetos == null) :  ?>

                                                                    <?php else:?>

                                                                        <ul class="ciclo2">
                                                                        <?php foreach($indicadosNetos as $neto): ?>
                                                                          
                                                                            <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                            <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>


                                                                                <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                            <?php  if($indicadosNetos == null) :  ?>

                                                                            <?php else:?>

                                                                                <ul class="ciclo2">
                                                                                <?php foreach($indicadosNetos as $neto): ?>
                                                                                  
                                                                                    <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                    <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>



                                                                                    <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                                    <?php  if($indicadosNetos == null) :  ?>

                                                                                    <?php else:?>

                                                                                        <ul class="ciclo2">
                                                                                        <?php foreach($indicadosNetos as $neto): ?>
                                                                                          
                                                                                            <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                            <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>


                                                                                            <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                                          <?php  if($indicadosNetos == null) :  ?>

                                                                                          <?php else:?>

                                                                                              <ul class="ciclo2">
                                                                                              <?php foreach($indicadosNetos as $neto): ?>
                                                                                                
                                                                                                  <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                                  <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>




                                                                                                  <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                                              <?php  if($indicadosNetos == null) :  ?>

                                                                                              <?php else:?>

                                                                                                  <ul class="ciclo2">
                                                                                                  <?php foreach($indicadosNetos as $neto): ?>
                                                                                                    
                                                                                                      <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                                      <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>



                                                                                                      <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                                              <?php  if($indicadosNetos == null) :  ?>

                                                                                              <?php else:?>

                                                                                                  <ul class="ciclo2">
                                                                                                  <?php foreach($indicadosNetos as $neto): ?>
                                                                                                    
                                                                                                      <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                                      <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>




                                                                                                      <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                            <?php  if($indicadosNetos == null) :  ?>

                                                                            <?php else:?>

                                                                                <ul class="ciclo2">
                                                                                <?php foreach($indicadosNetos as $neto): ?>
                                                                                  
                                                                                    <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                    <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>




                                                                                    <?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
                                                  
                                                                            <?php  if($indicadosNetos == null) :  ?>

                                                                            <?php else:?>

                                                                                <ul class="ciclo2">
                                                                                <?php foreach($indicadosNetos as $neto): ?>
                                                                                  
                                                                                    <li  ><!--<div class="avatar-frame"> <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"> </div>-->
                                                                                    <a class="" href="#">L: <?php echo $neto; ?> - C: <?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> </br><?php echo limitarTexto($this->backoffice_model->infoUser($neto)->nome, 9); ?></a>

                                                                                    </li>
                                                                                <?php endforeach;?> 
                                                                                </ul>
                                                                              
                                                                            <?php endif;?>







                                                                                    
                                                                                    </li>
                                                                                <?php endforeach;?> 
                                                                                </ul>
                                                                              
                                                                            <?php endif;?>






                                                                                                      </li>
                                                                                                  <?php endforeach;?> 
                                                                                                  </ul>
                                                                                                
                                                                                              <?php endif;?>










                                                                                                      </li>
                                                                                                  <?php endforeach;?> 
                                                                                                  </ul>
                                                                                                
                                                                                              <?php endif;?>







                                                                                                  </li>
                                                                                              <?php endforeach;?> 
                                                                                              </ul>
                                                                                            
                                                                                          <?php endif;?>





                                                                                            </li>
                                                                                        <?php endforeach;?> 
                                                                                        </ul>
                                                                                      
                                                                                    <?php endif;?>





                                                                                    </li>
                                                                                <?php endforeach;?> 
                                                                                </ul>
                                                                              
                                                                            <?php endif;?>



                                                                            </li>
                                                                        <?php endforeach;?> 
                                                                        </ul>
                                                                      
                                                                    <?php endif;?>



                                                                    </li>
                                                                <?php endforeach;?> 
                                                                </ul>
                                                              
                                                            <?php endif;?>



                                                          </li>
                                                      <?php endforeach;?> 
                                                      </ul>
                                                    
                                                  <?php endif;?>






                                                  </li>
                                              <?php endforeach;?> 
                                              </ul>
                                            
                                          <?php endif;?>

                                          </li>
                                      <?php endforeach;?> 
                                      </ul>
                                    
                                  <?php endif;?>
                              
                              </li>

                          <?php endforeach; ?>
                          </ul>
                        </li>
                      <?php endif;?>

                  <?php endforeach;?>
                    </ul>
                  
                </div> 
                <?php else: ?>

                    <div class="alert alert-info text-center">Você não tem downlines.</div>

                <?php endif;?>
                     
              </div>
            </div>

            <hr class="invisible">
            <hr class="invisible">
            <hr class="invisible">

    </div>

  </div>

    <!-- DARK footer
    ================================================== -->

    <footer class="section-footer bg-inverse" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="media">
              <div class="media-left">
                <img width="90" src="<?php echo base_url()?>assets/index/img/logo.png">
              </div>
              <small class="media-body media-bottom">
                &copy; now x - Ajuda Mútua. <br>
                Doações espontâneas.
              </small>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <ul class="nav nav-inline">
              <!-- <li class="nav-item">
                <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
              <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a></li>
              <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/ajuda/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript">
      
      $(document).ready(function(){

        $( "#draggable" ).draggable();

      });           

    </script>
  </body>
</html>
