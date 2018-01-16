<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php echo config_site('nome_site');?> - Login na Conta Master</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    
    

    <link href="<?php echo base_url();?>/assets/ajuda/images/favicon.ico" rel="icon" type="image/ico" />

  <?php if( $_SERVER['HTTP_HOST'] != 'localhost'): ?>
    <!-- Start of Smartsupp Live Chat script -->
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
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-86823466-1', 'auto');
      ga('send', 'pageview');
     
    </script>

  <?php endif; ?>
  </head>
  <body class='login'>
  <div class="rot-wrapper">
    <div class="adsense" style="max-width:900px; margin-left:auto;margin-right:auto;">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- REDE ADS 50 -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-3215674587886121"
           data-ad-slot="2424863893"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script></div>
    <div class='wrapper container' style="max-width:400px">
      
      <div class="col-xs-12 ">
        <div class='row'>
          <div class='col-lg-12'>
            <div class='brand text-center'>
              <h1>
                <!-- <div class='logo-icon'> -->
                  <img width="200" src="<?php echo base_url();?>/assets/ads-logo-vertical.png">
                <!-- </div> -->
              </h1>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-12'>
            <form class="form-login" action="" method="post">
              <?php
                if(isset($message)) echo $message;

                if(isset($mensagem)) echo $mensagem;
              ?>
              <fieldset class='text-center'>
                <legend>Acesse a Conta Master</legend>
                <p class="alert alert-warning">Lembrando que aqui o acesso é feito com o EMAIL cadastrado para Conta Master.</p>
                <div class='form-group'>
                  <input class='form-control' type='text' placeholder="Email" name="email" autofocus required>
                </div>
                <div class='form-group'>
                  <input class='form-control' placeholder='Senha' type='password' name="senha" required>
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" type="submit" name="submit"  value="Entrar">
                </div>
                <hr>
                <div class='text-center'>
                  <p>Login com facebook temporariamente indisponivel.</p>
                  <!--<p>Se você integrou sua conta master do Facebook</p>
                   <div class="login-facebook">
                    <a id="sign_in" class="waves-effect waves-light z-depth-0" href="<?php //echo $this->facebook->login_url(); ?>">
                      <span class="icon-container"><i class="fa fa-facebook"  aria-hidden="true"></i></span>
                      <span>Entre usando o Facebook</span>
                    </a>
                  </div> -->
                  <!-- <a class="btn btn-default " href="<?php echo base_url('cadastrar');?>">Faça seu cadastro</a> -->
                  <br><br>
                  <a  class="btn " href="<?php echo base_url();?>painel/conta/esqueci">Perdeu a senha?</a>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript">
      
    </script><script src="<?php echo base_url();?>/assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
