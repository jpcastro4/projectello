<?php 
  check_manutencao();
  check_session_afiliado();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Afiliado</title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
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
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <!-- Only needed Bootstrap bits + custom CSS in one file -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/index/css/landio.css">

  </head>

  <body class="bg-faded">
    <?php $afiliado = $this->backoffice_model->lista_desatualizados(); ?>

    <!-- DARK navigation
    ================================================== -->

    <nav class="navbar navbar-dark bg-inverse">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img width="120" src="<?php echo base_url()?>assets/index/img/logo.png">
          <span class="sr-only">Afiliados now x</span>
        </a>
        <a class="navbar-toggler hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingNavbarInverse" aria-expanded="false" aria-controls="collapsingNavbarInverse">
        &#9776;
      </a>
        <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingMobileUserInverse" aria-expanded="false" aria-controls="collapsingMobileUserInverse">
          <span class="icon-user"></span>
        </a>
        <div id="collapsingNavbarInverse" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbarInverse">
          <ul class="nav navbar-nav pull-xs-right">
            <!-- <li class="nav-item nav-item-toggable">
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
            </li> -->
            <li class="nav-item dropdown hidden-sm-down">
              <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenuInverse2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenuInverse2">
                <div class="media">
                  <div class="media-left">
                    <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
                  </div>
                  <div class="media-body media-middle">
                    <h5 class="media-heading"><?php //echo $afiliado->afiliado->nome ?></h5>
                    <h6><?php //echo $afiliado->afiliado->email ?></h6>
                  </div>
                </div>
              <!--   <a href="#" class="dropdown-item text-uppercase">View posts</a>
                <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
                <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a> -->
                <a href="<?php //echo base_url()?>afiliado/sair" class="dropdown-item text-uppercase text-muted">Log out</a>
                <!-- <a href="#" class="btn-circle has-gradient pull-xs-right">
                  <span class="sr-only">Edit</span>
                  <span class="icon-edit"></span>
                </a> -->
              </div>
            </li>
          </ul>
        </div>
        <div id="collapsingMobileUserInverse" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUserInverse">
          <div class="media m-t-1">
            <div class="media-left">
              <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
            </div>
            <div class="media-body media-middle">
              <h5 class="media-heading"><?php //echo $afiliado->afiliado->nome ?></h5>
              <h6><?php //echo $afiliado->afiliado->email ?></h6>
            </div>
          </div>
         <!--  <a href="#" class="dropdown-item text-uppercase">View posts</a>
          <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
          <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a> -->
          <a href="<?php echo base_url()?>" class="dropdown-item text-uppercase text-muted">Log out</a>
          <!-- <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">
            <span class="sr-only">Edit</span>
            <span class="icon-edit"></span>
          </a> -->
        </div>
      </div>
    </nav>

    <hr class="invisible">

    <div class="container">
      <div class="row">     

     <!--  <pre>
        <?php// echo var_dump($this->painel_model->afiliadoUsers() ) ?>
      </pre>
 -->
      

        <div class="clearfix hidden-md-up"></div>

        <div class="col-md-8 col-xl-8 col-xl-offset-2">

          <!-- User Card
          ================================================== -->

          <div class="card card-inverse card-social text-xs-center">
            <div class="card-block has-gradient">
              <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="90" width="90" alt="Avatar" class="img-circle">
              <h5 class="card-title"><?php //echo $afiliado->afiliado->nome ?></h5>
              <h6 class="card-subtitle"><?php //echo $afiliado->afiliado->email ?></h6>
              <!-- <h6 ><small class="card-subtitle"><?php //echo base_url() ?>?af=<?php //echo $afiliado->afiliado->rastreamento ?></small></h6> -->
              <h6 ><small class="card-subtitle"><?php //echo $afiliado->afiliado->encurtado ?></small></h6>
              <!-- <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button> -->
            </div>
            <div class="card-block ">
              <div class="row">
                <div class="col-md-4 card-stat">
                  <h4><?php //echo $afiliado->total ?> <small class="text-uppercase">Total</small></h4>
                </div>
                <div class="col-md-4 card-stat">
                  <h4><?php //echo $afiliado->total_afiliados ?> <small class="text-uppercase">Indicados</small></h4>
                </div>
                <div class="col-md-4 card-stat">
                  <h4><?php //if( $afiliado->total_afiliados < 300 ){
                      //echo 1; 
                    //}else{ 
                    //echo floor($afiliado->total_afiliados / $afiliado->afiliado->contas);

                    //} ?><small class="text-uppercase" >Contas</small></h4>
                </div>
              </div>
            </div>
          </div>

          <?php if( isset($mensagem) ) echo $mensagem; ?>

          <hr class="invisible">
          <div class="card card-inverse card-social text-xs-center">
            <div class="card-block">
            <table class="table">
              <thead>
                <tr>  
                  <th>Posição</th>
                  <th>Nome</th>
                  <!-- <th>Data Cadastro</th> -->
                  <!-- <th>CPF</th> -->
                  <!-- <th>Email</th> -->
                </tr>
              </thead>
              <tbody>
              <?php foreach($afiliado->indicados as $indicado ): ?>
                <tr data-toggle="modal" data-target="#modalEdita" data-id="<?php echo $indicado->id ?>" style="cursor:pointer">
                  <td ><?php echo $indicado->id ?></td>
                  <td><?php echo $indicado->nome.' '.$indicado->sobrenome ?></td>
                  <!-- <td><?php //echo $indicado->cpf ?></td> -->
                  <!-- <td><?php //echo $indicado->email ?></td> -->

                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>

            </div>
          </div>
          </div>

        <div class="clearfix hidden-md-up"></div>
        
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
              <!--<li class="nav-item">
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

    <!-- video modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
      <div class="modal-dialog modal-video" role="document">
        <div class="modal-content">
          <!-- 16:9 aspect ratio -->
          <div class="embed-responsive embed-responsive-16by9">
            <iframe id="vimeo-play" src="https://player.vimeo.com/video/98330466?color=6c59b4&byline=0&portrait=0&badge=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <!-- video modal -->
    <div class="modal fade" id="youtubeModal" tabindex="-1" role="dialog" aria-labelledby="youtubeModal" aria-hidden="true">
      <div class="modal-dialog modal-video" role="document">
        <div class="modal-content">
          <!-- 16:9 aspect ratio -->
          <div class="embed-responsive embed-responsive-16by9">
            <iframe id="youtube-play" class="embed-responsive-item" src="" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalEdita">
      <div class="modal-dialog card card-social text-xs-center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Muda Senha</h4>
           </div>
          <div class="card-block">          
            <div class="col col-xs-12 col-sm-12">
              <form method="post" action="#" >
                <div id="idUser"></div>
                <hr class="invisible" >
                <div class="col-xs-12">
                  <input type="text" name="novaSenha" value="" class="form-control" placeholder="Digite a nova senha">
                </div>
                <div class="col-xs-12">
                  <button type="submit" style="position:inherit;" name="mudarSenha" value="mudarSenha" class="btn btn-primary btn-left">Confirmar</button>
                </div>
                <hr class="invisible">
              </form>
            </div>

            <div class="clearfix hidden-md-up"></div>
           </div>
        </div>
      
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){

        $('#modalEdita').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('#idUser').text('Mudando senha do posicionamento '+recipient)
            modal.find('form').append('<input type="hidden" name="idUser" id="id" />')
            modal.find('input#id').val(recipient)
            
         })

        $('#modalEdita').on('hide.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('input#id').remove()
            modal.find('input#senha').val('')

         })

        setTimeout(function() {
            $(".alert").fadeOut();
        }, 2000);


      })
    </script>
  </body>
</html>
