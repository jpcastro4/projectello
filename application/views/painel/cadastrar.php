<?php 
  if( $_SERVER['HTTP_HOST'] != 'localhost'):
    check_manutencao();
  endif;
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title><?php echo config_site('nome_site');?> - Cadastrar</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/assets/ajuda/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/ajuda/images/favicon.ico" rel="icon" type="image/ico" />
     <?php  if( $_SERVER['HTTP_HOST'] != 'localhost'): ?>
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
    <div class='wrapper col-xs-12 col-sm-7 col-md-6 col-lg-5'>
      <h1 style="position:absolute; left:-999999px;"> Cadastre-se na Rede ADS e receba até 800 mil reais</h1>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            
            <h2>
              <!-- <div class='logo-icon'> -->
               <img width="250" src="<?php echo base_url();?>/assets/ads-logo-vertical.png">
              <!-- </div> -->
             
            </h2>
          </div>
        </div>
      </div>
      <div class="row" style="margin:20px 0">
        <div class="col-xs-12">
        <div  class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/videoseries?list=PLaydmPdbupQcw7vJP4nkYQc8zg6OiNDt1" frameborder="0" allowfullscreen></iframe>
        </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'> 
          <?php
                    $snc = $this->native_session->get('nome_completo');
                    
                    if(isset($snc) && !empty($snc)){
                        echo '<div class="alert alert-info text-center"> Próximo lugar na fila abaixo de:  <strong> '.$snc.'</strong></div> ';
                        $this->native_session->unset_userdata('nome_completo');
                    }

                    if(isset($message)) echo $message;

                    if(isset($mensagem)) echo $mensagem;
              ?>

          <?php if(!$aguardando): ?>
          <form  class="form-login" action="" method="post">
            
            <fieldset class='text-center'>
              <legend>Faça seu cadastro</legend>
                  <div class="col-xs-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                        <input class="form-control " type="email" placeholder="Email" name="email" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Senha</label>
                        <input class="form-control placeholder-no-fix" type="password" placeholder="Senha" name="senha" required="required" />
                    </div>

                    <p class="alert alert-info">
                         Abaixo crie um login de usuario. Use até<strong> 10 caracteres </strong>somente com letras e números. Lembre-se que seu login fará parte do seu link de divulgação.
                    </p>
                    
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Login</label>
                        <input class="form-control placeholder-no-fix nickname" type="text" id="nickname" placeholder="Login" name="login"  required="required" />
                    </div>
                                       
                  </div>

                  <div class="col-xs-12 col-md-6 col-lg-6">
                    
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Nome</label>
                        <input class="form-control " type="text" placeholder="Nome" name="nome" required="required" />
                    </div>
                     <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Sobrenome</label>
                        <input class="form-control " type="text" placeholder="Sobrenome" name="sobrenome" required="required"  />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Cpf</label>
                        <input class="form-control " type="tel" placeholder="CPF" id="cpf" name="cpf" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Nascimento</label>
                        <input class="form-control " type="tel" placeholder="Data de nascimento" name="nascimento" id="data" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Celular DDD + NÚMERO (whatsapp)</label>
                        <input class="form-control" type="tel" placeholder="DDD + NÚMERO" name="celular" id="celular" required="required" />
                    </div>
                    <div class="form-group clearfix">
                    <label class="checkbox pull-right">
                      <input type="checkbox" required ><small> Aceito os <a target="_blank" href="<?php echo base_url()?>politicas"> termos</a> e <a target="_blank" href="<?php echo base_url('/uploads')?>/termos-e-condicoes-rede-ads-50.pdf"> condições </a></small>
                    </label>
                    </div>
                  </div>
                  
            </fieldset>
              <div class="form-group">
                      <div class="form-actions clearfix ">
                        <input type="submit" id="register-submit-btn" name="submit" class="btn btn-success uppercase pull-right" value="Cadastrar">
                      </div>
              </div>
          </form>
        <?php else: ?>
          <p class="alert alert-warning text-center"> Aguardando abertura da vaga </p>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/vendor/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script type="text/javascript">

      jQuery(function($){
         $(document).ready(function(){

            // $('input#nickname').keypress(function(e){
            //     console.log( e.which );
            //     if($('#nickname').val().length == 0){
            //         var k = e.which;
            //         var ok = // A-Z   k >= 65 && k <= 90 || 
            //             k >= 97 && k <= 122 || // a-z
            //             k >= 48 && k <= 57; // 0-9
                    
            //         if (!ok){
            //             e.preventDefault();
            //         }
            //     }
            // }); 

            $('input#nickname').bind('input', function() {
              $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
            });

            $('input#nickname').bind("cut copy paste",function(e) {
                e.preventDefault();
            });

             $("#data").mask("99/99/9999");
             // $("#celular").mask("(99)99999-999?9");
             $("#cpf").mask("999.999.999-99");

            

          });
        });

      

    </script>

  <!--    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url();?>/assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>-->
  </body>
</html>
