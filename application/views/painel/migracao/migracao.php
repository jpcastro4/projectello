<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title><?php echo config_site('nome_site');?> - Login</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
    
    <div class='wrapper container text-center'>
      <h1>Assistente de migração</h1>
      <div class="row">
        <div  class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/eAZFVnHSAQw?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="row mtb60 clearfix">
        <a class="btn btn-large btn-success" href="<?php echo base_url('painel/migracao_passo1') ?>">PRÓXIMO PASSO</a>
      </div>
    </div>

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
      </script>
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
