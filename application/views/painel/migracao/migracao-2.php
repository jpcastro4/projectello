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
      <h1>CONTA MASTER <br/> Inclusão de logins</h1>
      <p>Nessa tela você você vai conectar cada login que você possui e que deseja controlar com sua conta master.<br/><br/>
      Repita para cada um dos logins. Se antes você tinha vários emails para varios logins, NÃO SE PREOCUPE. Basta reunir todos os logins aqui AGORA.<br/><br/>Se você esqueceu a senha, basta escrever o login no campo login e clicar em "esqueci a senha", e o sistema enviará dentro de 5 minutos uma nova senha para o email do login.</p>      
      <div class="col-xs-12 mtb60">
        <div class='row'>
          <div class='col-lg-12'>
            <form class="form-login" action="<?php echo base_url('ajax_functions/migracao') ?>" method="post">

              <fieldset class='text-center'>
                
                <div class='form-group'>
                  <input class='form-control' id="login" type='text' placeholder="LOGIN" name="login" autocapitalize="none" autofocus required>
                </div>
                <div class='form-group'>
                  <input class='form-control' type='password' placeholder='SENHA DO LOGIN' name="senha" autocapitalize="none" required>
                </div>
                  <input type="hidden" name="funcao" value="passo2" >
                <div class="form-group">
                  <button class="btn btn-warning btn-block" type="submit" id="submit" name="submit"  value="Proximo passo">Atribuir login</button>
                </div>
              </fieldset>
            </form>
            <button class="btn btn-link btn-block" type="submit" id="submit" name="esqueci"  value="Proximo passo">Esqueci a senha</button>
            <hr>
            <a class="btn btn-success btn-block" href="<?php echo base_url('painel/conta')?>">Finalizar</a>
          </div>
          
        </div>
      </div>
    </div>

    <div class="adsense mtb60" style="max-width:900px; margin-left:auto;margin-right:auto;">
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
                    title: "Você confirma a atribuicao?",
                    text: $('form input#login').val(),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim!",
                    closeOnConfirm: false,
            }, function(){

                migracao(linkAction,form);
                    
            });


        });

        $('button[name="esqueci"]').on('click',function(e){

          e.preventDefault();

          var login = $('form input#login').val();
            
            //console.log(form);

            swal({
                    title: "Podemos enviar uma nova senha?",
                    text: 'Login: '+$('form input#login').val(),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim!",
                    closeOnConfirm: false,
            }, function(){

                //migracao(linkAction,form);
                    
            });


        });

      });
    </script>
      
    </script><script src="<?php echo base_url();?>/assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
