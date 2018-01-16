<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php echo config_site('nome_site');?> - Login</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.css">


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
    
    <div class='wrapper container text-center' style="max-width:400px">
      <h1>CONTA MASTER</h1>
      <p>ANTEÇÃO. MUITA ATENÇÃO. VAMOS CRIAR SUA CONTA MASTER. A PARTIR DE AGORA VOCÊ FARÁ O ACESSO USANDO APENAS SEU EMAIL E ESSA SENHA QUE VOCÊ ESTÁ CRIANDO AQUI. <br/> <br/> Com ela você poderá controlar todos os seus logins.</p>      
      <div class="col-xs-12 mtb60">
        <div class='row'>
          <div class='col-lg-12'>
            <form class="form-login" action="<?php echo base_url('ajax_functions/migracao') ?>" method="post">

              <fieldset class='text-center'>
                
                <div class='form-group'>
                  <input class='form-control' id="email" type='email' readonly placeholder="Seu email" name="email" value="<?php echo $email ?>" autofocus required>
                </div>
                <div class='form-group'>
                  <input class='form-control' id="senha" type='password' placeholder='Senha' name="senha" required>
                </div>
                  <input type="hidden" name="funcao" value="passo1" >
                <div class="form-group">
                  <button class="btn btn-success btn-block" type="submit" id="submit" name="submit"  value="Proximo passo"´>Próximo passo</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="adsense mtb60" style="max-width:900px; margin-left:auto;margin-right:auto;">
     
    </div>

  </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ajuda/main.js" type="text/javascript"></script>
    <script type="text/javascript">
      
      $(document).ready(function(){

        $('button[name="submit"]').on('click',function(e){

          e.preventDefault();

          var form = $('form').serialize(),
              linkAction = $('form').attr('action');
            
            //console.log(form);

            swal({
                    title: "Confirma?",
                    text: $('form input#email').val(),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim!",
                    closeOnConfirm: false,
            }, function(){

                migracao(linkAction,form);
                    
            });


        });

      });
    </script>
      
    </script><script src="<?php echo base_url();?>/assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
