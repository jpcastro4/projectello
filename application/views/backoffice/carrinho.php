<?php 

    $this->native_session->set('usuario_id', 1);
 ?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles 
    <link href="<?php echo site_url('assets/backoffice/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    <link href="<?php echo site_url('assets/backoffice/')?>css/main.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/backoffice/')?>css/font-style.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/backoffice/')?>css/register.css" rel="stylesheet">

<!--     <script type="text/javascript" src="<?php echo site_url('assets/backoffice/')?>js/jquery.js"></script>    
    <script type="text/javascript" src="<?php echo site_url('assets/backoffice/')?>bootstrap/js/bootstrap.min.js"></script> -->

    <script type="text/javascript"> var ajaxurl = '<?php echo site_url("ajax_functions/") ?>'</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Google Fonts call. Font Used Open Sans & Raleway -->
  <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  </head>
  <body>

    <!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="<?php echo site_url('assets/backoffice/')?>images/logo30.png" alt=""> BitPrime </a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.html"><i class="icon-home icon-white"></i> Home</a></li>                            
              <li><a href="tables.html"><i class="icon-th icon-white"></i> Tables</a></li>
              <li><a href="login.html"><i class="icon-lock icon-white"></i> Login</a></li>
              <li class="active"><a href="user.html"><i class="icon-user icon-white"></i> User</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <div class="row">

          <div class="col-12"></div>
           
          <div class="col-sm-6 col-lg-6 mx-auto">
            <div id="register-wraper">
                <form id="register-form" class="form" method="post" >
                    <legend>Buy your package</legend>

                    <h2><strong><?php echo $pacote->pacoteNome; ?></strong></h2>
 
                    <span class="price">U$ <?php echo $pacote->pacoteValor; ?><br/></span>

                    <span class="price">BTP <?php echo $pacote->pacoteValor; ?><br/></span>

                    <span class="price">BTC <?php $valor = file_get_contents('http://blockchain.info/tobtc?currency=USD&value='.$pacote->pacoteValor);
                                echo $valor; ?><br/><br/></span>

                    <input type="hidden" name="pacoteID" value="<?php echo $pacote->pacoteID; ?>">
                    <input type="hidden" name="usuarioID" value="<?php echo $this->native_session->get('usuario_id') ?>">
                    
                    <button type="submit" class="btn btn-success">Process ticket</button>


                </form>
            </div>
          </div>

        </div>
    </div>

  <div id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-12">
            <p><img src="<?php echo site_url('assets/backoffice/')?>images/logo.png" alt=""></p>
            <p>Blocks Dashboard Theme - Crafted With Love - Copyright 2013</p>
            </div>

          </div><!-- /row -->
        </div><!-- /container -->   
  </div><!-- /footerwrap --> 

  <script type="text/javascript">
      
      $(document).ready(function(){

            $('form').submit(function(e){

                e.preventDefault();

                $.post(ajaxurl+'processaPagamento', $(this).serialize() ,function(data){

                    console.log(data)
                })
            })
      })
  </script>
</body>
</html>