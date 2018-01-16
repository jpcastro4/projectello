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

          <div class="col-12">
            <?php if($this->native_session->get_flashdata('nome_completo') ) echo $this->native_session->get('nome_completo');  ?>
          </div>

          <!-- <div class="col-lg-6">
            
            <div class="register-info-wraper">
              <div id="register-info">
                <div class="cont2">
                  <div class="thumbnail">
                <img src="<?php echo site_url('assets/backoffice/')?>images/face.jpg" alt="Marcel Newman" class="img-circle">
              </div> 
              <h2>Marcel Newman</h2>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="cont3">
                      <p><ok>Username:</ok> BASICOH</p>
                      <p><ok>Mail:</ok> hola@basicoh.com</p>
                      <p><ok>Location:</ok> Madrid, Spain</p>
                      <p><ok>Address:</ok> Blahblah Ave. 879</p>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="cont3">
                    <p><ok>Registered:</ok> April 9, 2010</p>
                    <p><ok>Last Login:</ok> January 29, 2013</p>
                    <p><ok>Phone:</ok> +34 619 663553</p>
                    <p><ok>Mobile</ok> +34 603 093384</p>
                    </div>
                  </div>
                </div> 
            <hr>
            <div class="cont2">
              <h2>Choose Your Option</h2>
            </div>
            <br>
              <div class="info-user2">
                <span aria-hidden="true" class="li_user fs1"></span>
                <span aria-hidden="true" class="li_settings fs1"></span>
                <span aria-hidden="true" class="li_mail fs1"></span>
                <span aria-hidden="true" class="li_key fs1"></span>
                <span aria-hidden="true" class="li_lock fs1"></span>
                <span aria-hidden="true" class="li_pen fs1"></span>
              </div>

                
              </div>
            </div>

          </div>
 -->
          <div class="col-sm-6 col-lg-6 mx-auto">
            <div id="register-wraper">
                <form id="register-form" action="<?php echo site_url() ?>form/cadastrar" class="form" method="post" >
                    <legend>User Register</legend>
                
                    <div class="body">
                      <!-- first name -->
                    <label for="name">First name</label>
                    <input name="usuarioNome" class="form-control" type="text">
                      <!-- last name -->
                    <label for="surname">Last name</label>
                    <input name="usuarioSobrenome" class="form-control" type="text">

                    <label for="surname">CPF</label>
                    <input name="usuarioCpf" class="form-control" type="number">

                    <!-- email -->
                    <label>E-mail</label>
                    <input name="usuarioEmail"  class="form-control" type="text">

                    <label for="surname">Telefone</label>
                    <input name="usuarioTelefone" class="form-control" type="number">

                    <!-- username -->
                    <label>Username</label>
                    <input name="usuarioLogin"  class="form-control" type="text">
                    <!-- password -->
                    <label>Password</label>
                    <input name="usuarioSenha" class="form-control" type="password">

                    </div>
                
                    <div class="footer">
                        <label class="checkbox inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1"> I agree with the terms &amp; conditions
                        </label>
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
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
</body></html>