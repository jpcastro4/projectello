<?php if( $_SERVER['HTTP_HOST'] != 'localhost'):
    check_manutencao();
  endif;
?>

<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title><?php echo config_site('nome_site');?> - Perdeu a senha</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="<?php echo base_url();?>/assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/ajuda/images/favicon.ico" rel="icon" type="image/ico" />
    <?php if( $_SERVER['HTTP_HOST'] != 'localhost'): ?>
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
<?php endif; ?>
  </head>
  <body class='login'>
  <div class="rot-wrapper">
    <div class="adsense" style="max-width:900px; margin-left:auto;margin-right:auto;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- REDE ADS 50 -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-3215674587886121"
           data-ad-slot="2424863893"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script></div>
    <div class='wrapper col-xs-9 col-sm-7 col-md-4 col-lg-2 '>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              <!-- <div class='logo-icon'> -->
                <img width="250" src="<?php echo base_url();?>/assets/ads-logo-vertical.png">
              <!-- </div> -->
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
          <form class="form-login" action="" method="post">
            <?php if(isset($message)) echo $message; ?>
            <fieldset class='text-center'>
              <legend>Esqueceu a senha do seu login</legend>
                  <div class="form-group">
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Seu Login" name="login" required/>
                  </div>
                  <div class="form-actions">
                            <button type="button" id="back-btn" class="btn btn-default" onclick="window.location.href='<?php echo base_url();?>painel/login'">Voltar</button>
                            <input type="submit" class="btn btn-success uppercase pull-right" name="submit" value="Resetar">
                  </div>
                  <div class='form-actions text-center'>
                    <p>Precisa de suporte. Envie um e-mail para suporte@redeads50.com</p>
                    <p>Se você esquece a senha da sua conta master<a href="<?php echo base_url('painel/conta/esqueci');?>"> clique aqui </a>para recuperar</p>
                  </div>
            </fieldset>
          </form>
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
