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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/font-awesome/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>/assets/ajuda/main.css" rel="stylesheet" type="text/css" />

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
  <body >
  <?php $superuser = $this->native_session->get('conta_id');
    if($superuser == 1 OR $superuser == 2):?>
    <!-- SUPER USER -->
    <div class="container super-user">
        <div class="card relative">
            <label class="labelsuperuser" id="labelsuperuser">Super User </label>

            <div class="text-center">
                <h3>Super User</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="idUser">ID do Usuário</label>
                            <input type="text" class="form-control" id="idUser" name="id_user" >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn" name="superadm" value="Acessar">
                        </div>
                    </form>

                    <div class="row">
                      <?php //echo $this->painel_model->LinkUniversal(); ?> - <?php //echo $this->painel_model->infoUser($this->painel_model->LinkUniversal())->nome; ?>
                    </div>
            </div>
        </div>
    </div>
<?php endif;?>
    <nav class="navbar navbar-ads">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img width="140" src="<?php echo base_url('assets/ads-logo-painel.png') ?>" /></a>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('painel/conta')?>"><i class="fa fa-home"></i> Conta Master</a></li>
                    <li><a href="<?php echo base_url('painel/conta_configuracoes')?>"><i class="fa fa-wrench"></i> Configurações</a></li>
                    <li><a href="<?php echo base_url('painel/migracao_passo2')?>"><i class="fa fa-plus-circle"></i> Adicionar logins</a></li>
                    <li><a  href="<?php echo base_url('painel/sair'); ?>"><i class="fa fa-sign-out"></i> Sair</a></li> 
                </ul>
            </div>

        </div>
    </nav>
    <ol class="breadcrumb">
         <div class="container">
            <li class="">Você está na Conta Master <strong><?php echo $this->painel_model->conta('email'); ?></strong></li>
        </div>
    </ol>

    <div class="adsense" style="max-width:900px; margin:30px auto;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- REDE ADS 50 -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-3215674587886121"
           data-ad-slot="2424863893"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script></div>