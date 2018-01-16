<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="bootstrap material admin template">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<title>Register | Porish Material Admin Template</title>
		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/bo/assets/favicon/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/bo/assets/favicon/apple-touch-icon-180x180.png" />
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300%7CRaleway:400,300%7CRoboto:400,700,300%7CLato' rel='stylesheet' type='text/css' />
		<!--  Icon CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/global/iconstyle.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/fonts/material-design/material-design.min.css" />
		<!-- Global plugin CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/global/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/switchery/switchery.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/global/waves.min.css" />
		<!--  Global Template CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/global/style.css" />
		<link id="site-color" rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/colors/default.css" />
		 <link id="site-color" rel="stylesheet" href="<?php base_url()?>assets/bo/assets/css/colors/gray.css " />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/global/site.min.css" />
		<!-- Page CSS -->
		<link href="<?php echo base_url() ?>assets/bo/assets/css/login-page/form.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/validation/validation.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/bootbox/sweet-alert.min.css" />
	</head>
	<body class="login-form ">
		<div class="main-login-form register-page">
			<div class="content-login">
				<div class="login-page">
					<div class="logo-title">
						<!-- Template Logo -->
						<img alt="logo" src="<?php echo base_url()?>assets/bo/assets/images/logo.png">
					</div>
					<p class="sign-login">Faça seu pré cadastro</p>
					<!-- Start Register Form -->
					<form action="registroPreCadastro"  class="form-login" id="precadastro" method="post">
						<div class="input-box">
							<div class="left-icon-login btn-info"><i class="icon icon_profile"></i></div>
							<div class="textbox-login"><input type="text" class="form-control" id='nome' name='nome' required placeholder="Seu nome"/></div>
						</div>
                        <div class="input-box">
                            <div class="left-icon-login btn-info"><i class="icon icon_profile"></i></div>
                            <div class="textbox-login"><input type="text" class="form-control" id='sobrenome' name='sobrenome' required placeholder="Sobrenome"/></div>
                        </div>
						<div class="input-box">
							<div class="left-icon-login btn-info"><i class="icon icon_mail"></i></div>
							<div class="textbox-login"><input type="text" class="form-control" id='email' name='email' required placeholder="Email"/></div>
						</div>
                        <div class="input-box">
                            <div class="left-icon-login btn-info"><i class="icon icon_document"></i></div>
                            <div class="textbox-login"><input type="text" class="form-control" id='cpf' minlength="11" name='cpf' required placeholder="CPF"/></div>
                        </div>
                        <div class="input-box">
                            <div class="left-icon-login btn-info"><i class="icon icon_mail"></i></div>
                            <div class="textbox-login"><input type="tel" class="form-control" id='telefone' name='telefone' required placeholder="Whatsapp com DDD"/></div>
                        </div>
						<div class="input-box">
							<div class="left-icon-login btn-info"><i class="icon icon_lock"></i></div>
							<div class="textbox-login"><input type="password" class="form-control" id='senha' name='senha' required placeholder="Senha"/></div>
						</div>
						<div class="input-box">
							<div class="left-icon-login btn-info"><i class="icon icon_lock"></i></div>
							<div class="textbox-login"><input type="password" class="form-control" id='senha_confirma' name='senha_confirma' required placeholder="Confirme a senha"/></div>
						</div>
						<div class="bottom-login">
							<div class="remember-text-login">
								<span class="checkbox-custom checkbox-primary">
								<input id="requiredCheckbox" name="terms" type="checkbox" required>
								<label for="requiredCheckbox">Eu entendo as condições de participação </label>
								</span>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-info mobile-btn-login btn-sign waves-effect waves-dark" type="submit">Cadastrar</button>
						</div>
					</form>
					<!-- End Register Form -->
					<!-- <div class="sign-up-text">Have An Account? Go to <a class="underline" href="login.html"> Sign in</a>.</div> -->
				</div>
			</div>
		</div>
		<!-- Global Plugin JavaScript -->
		<script src="<?php echo base_url()?>assets/bo/assets/js/global/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/bo/assets/js/global/bootstrap.min.js"></script>
		<!-- <script src="<?php echo base_url()?>assets/bo/assets/plugin/bootstrap-tour/js/bootstrap-tour.js"></script> -->
		<script src="<?php echo base_url()?>assets/bo/assets/js/global/waves.min.js"></script>
		<!-- Global Template JavaScript -->
		<script src="<?php echo base_url()?>assets/bo/assets/js/global/site.min.js"></script>
		<!-- Page Template JavaScript -->
		<script src='<?php echo base_url()?>assets/bo/assets/js/validation/jquery.validate.min.js'></script>
		<script src='<?php echo base_url()?>assets/bo/assets/js/validation/validation.js'></script>

        <script src="<?php echo base_url()?>assets/bo/assets/js/bootbox-page/bootbox-sweetalert.min.js"></script>
        <script src="<?php echo base_url()?>assets/bo/assets/js/bootbox-page/sweet-alert.min.js"></script>

    <script type="text/javascript">

    var nowx = '<?php echo base_url() ?>ajax_functions/'
      
    $(document).ready(function(){

        $('#precadastro').on('submit', function(event){
            event.preventDefault();

            $(this).find('[required]').each(function(e){
                if ( $(this).val() == '' )
                {
                    $(this).focus();
                    return;
                } 
            });

            var form = $(this);

            $.post(nowx+$(this).attr('action'), $(this).serialize(), function(data){

                if(data.result == 'error'){
                    swal('Erro', data.message, 'error');

                     $('#precadastro input').val('');
                }

                if(data.result == 'success'){
                    swal('Sucesso', data.message, 'success');

                    $('#precadastro input').val('');
                }

                console.log(data);

            }, 'json')
            .fail( function(data){

                swal('Erro', '', 'error');

                console.log(data);
            });

        });

    });
    </script>
	</body>
</html>
