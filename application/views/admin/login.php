<?php //check_manutencao() ?>
<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <!-- <meta name="robots" content="noindex">
	    <meta name="googlebot" content="noindex"> -->
	    <title>Área do Corretor - Entrar </title>
	    <meta name="author" content="João Paulo de Castro Pereira - Difference Publicidade" />
<!-- 	    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-57x57.png">
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
	    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico"> -->
	    <meta name="msapplication-TileColor" content="#A80B0B">
	    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
	    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
	    <meta name="theme-color" content="#A80B0B">
	   
	    <!-- Only needed Bootstrap bits + custom CSS in one file -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	    <script src="https://use.fontawesome.com/7cbf6b3d85.js"></script>

	    <script type="text/javascript">var ajaxUrl = '<?php echo base_url('ajax_functions/'); ?>'; </script>

	    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/bootbox/sweet-alert.min.css" /> -->
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/theme.css">
	    
  	</head>

  	<body class="bg-black-t" style="background-image: url('<?php echo base_url()?>assets/img/administrativo-santa-tereza-construtora.jpg');background-position: center;background-size: cover;">

  	<div class="pt-5">
	    <div class="contain-card p-4 mx-auto" style="max-width:350px">
	      	<div class="">
	         
	        	<div class="col-12 logo text-center">
	        		<img width="130" src="http://www.construtorast.com.br/templates/santateresa/images/construtora-santa-teresa.png" >
	        	</div>

	        	<form action="" method="post" class="row" >
	          	 
	          		<div class="w-100 text-center my-2">
	        			<h1 class="title-1 py-3">Acesso administrativo</h1>
	        		</div>
			        <div class="form-group col-12 has-icon-left form-control-email">
			            <label class="sr-only" for="email">Email</label>
			            <input type="email" name="usuarioEmail" class="form-control" id="email" placeholder="E-mail" autocomplete="off" >
			        </div>

		            <div class="form-group col-12 has-icon-left form-control-password">
		                <label class="sr-only" for="senha">Senha</label>
		                <input type="password" name="usuarioSenha" class="form-control" id="senha" placeholder="Senha" autocomplete="off">
		            </div>

		            <div class="col-12">
	          			<button type="submit" value="submit" name="submit" class="btn btn-theme btn-block">Entrar</button>
	          		</div>
		          	<!-- <div class="col-12 text-center mt-3">
		              	<a href="<?php echo base_url()?>backoffice/esqueci">Recuperar senha</a>
		          	</div> -->
	          </form>

	          <hr class="invisible">
	          	        
	      	</div>
	       
	    </div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/lib/noty.css" />
    <script src="<?php echo base_url()?>assets/lib/noty.js"></script>

    <script type="text/javascript">

        var app = {

            news: function(message,typeNews){

                new Noty({                        
                            text: message,
                            layout: 'topRight',
                            type: typeNews,
                            timeout : '2000',
                            theme: 'metroui',
                            modal: true,
                            progressBar: false,
                        }).show();
            }
        }
      
 

        $(document).ready(function(){

            <?php if(isset($mensagem) ):  ?>
            	app.news('<?php echo $mensagem;?>','success')
            <?php endif;?>

            <?php if(isset($mensagem_erro)):  ?>
            	app.news('<?php echo $mensagem_erro;?>','error')
            <?php endif;?>
        })

    </script>

    </body>
</html>
