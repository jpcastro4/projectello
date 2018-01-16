<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
	<head>
		<title>Ello - <?php echo $titulo; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!--meta info-->
		<meta name="author" content="">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/loja/images/fav.ico">
		<!--stylesheet include-->

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/loja/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/loja/css/jquery.custom-scrollbar.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/loja/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/loja/css/style.css">

		

		<!--font include-->
		<link href="<?php echo base_url() ?>assets/loja/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
<!-- 	<div class="spinner-rot">
	<div class="spinner">
	  <div class="bounce1"></div>
	  <div class="bounce2"></div>
	  <div class="bounce3"></div>
	  
	</div>
	</div>  -->

 	<div class="cs-loader">
	  <div class="cs-loader-inner">
	    <label>	●</label>
	    <label>	●</label>
	    <label>	●</label>
	    <label>	●</label>
	    <label>	●</label>
	    <label>	●</label>
	  </div>
	</div>

		<!--wide layout-->
		<div class="wide_layout relative">
			<!--[if (lt IE 9) | IE 9]>
				<div style="background:#fff;padding:8px 0 10px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
			<![endif]-->
			<!--markup header type 2-->
			<header role="banner">
				<section class="h_bot_part container">
					<div class="clearfix row">
						<div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">
							<a href="index.html" class="logo m_xs_bottom_15 d_xs_inline_b">
								<img width="150" src="<?php echo base_url() ?>assets/loja/images/logo-loja.png" alt="">
							</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-8">
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15">
									<dl class="l_height_medium">
										<dt class="f_size_small">Atendimento Whatsapp:</dt>
										<dd class="f_size_ex_large color_dark"><b>(21) 98259-7994</b></dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--main menu container-->
				
				<section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20"></section>
				
			</header>

			<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						
						<!--left content column-->
						<section class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-3 m_xs_bottom_30">


							<?php 				
								
								$id = $this->uri->segment(4);
								$token = $this->uri->segment(5);
								$total = $this->secure->pedidoPagamento( $this->uri->segment(4), 'total' );
								$email = $this->secure->userPagamento( $this->uri->segment(4), 'email' );

													
							?>


							<!-- PAGAMENTO -->
							<h2 class="tt_uppercase color_dark m_bottom_30">Forma de pagamento</h2>
							<section class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">

							<div id="resp"></div>

							<div class="accordion">

								
								<div class="accordion_item">
									<h3 class="active color_light a_title relative tr_all_hover m_bottom_15">
											Cartão de Crédito
											<span class="minus_icon tr_all_hover">-</span>
											<span class="plus_icon tr_all_hover">+</span>
									</h3>
									<figure class="clearfix relative  m_bottom_15">
										
										<!--<img width="105" src="<?php echo base_url() ?>assets/loja/images/credit-card.png" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
										 <figcaption class="m_bottom_20">
											<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Cartão de crédito</h5>
											<p> Pague com segurança usando seu cartão de crédito. Lembre-se de acompanhar a aprovação do pagamento. Sua operadora de cartão pode solicitar alguma confirmação de compra.</p>
										</figcaption> -->

										<div id="pagamento-cartao" class="clearfix bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
										<!--<hr class="m_bottom_20">
										 	<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script> -->

											<div class="card-wrapper m_bottom_15"></div>
											<div id="pay" class=" form-horizontal">
											    <fieldset>
											        <ul>
											        	<li class="clearfix m_bottom_15">
											            
											               	<label class="d_inline_b m_bottom_5" for="txn_type">Escolha como quer pagar</label>
											               	<select class="full_width r_corners" id="txn_type">
													            <option value="sale">Cartão de Crédito</option>
													            <option value="auth">Parcial - captura</option>
													            <option value="debit">Débito online</option>
													            <option value="sale">Cartão Pré-pago</option>
													        </select>
											            </li>

											            <li class="clearfix m_bottom_15" >
											            	
											               	<label class="d_inline_b m_bottom_5" for="cardNumber">Número do cartão de crédito</label>
											               	<input class="full_width r_corners" id="txt_cardNumber" maxlength="20" name="number" type="text" value="5162 3051 0323 766"/>
											            	
											            </li>

											            <li class="clearfix m_bottom_15">
											            
											               	<label class="d_inline_b m_bottom_5" for="cardholderName">Titular do cartão</label>
											               	<input class="full_width r_corners" id="txt_cardHolder" type="text" name="name" placeholder="" value="joao p c pereira"/>
											            </li>

											            <li class="clearfix m_bottom_15">
											            
											               	<label class="d_inline_b m_bottom_5" for="cardExpirationMonth">Expira (mm/aa)</label>
											               	<input class="full_width r_corners" name="expiry" id="txt_cardExp" type="text" placeholder="MM/YY" value="10/18"/>
											            </li>
											            
											            <li class="clearfix m_bottom_15">
											            
											               	<label class="d_inline_b m_bottom_5" for="securityCode">Código de Segurança</label>
											               	<input class="full_width r_corners" name="cvc" type="text" id="txt_cardCvv" placeholder="XXX" value="706"/>
											            </li>

											            <input type="hidden" style="width:150px;" name="txt_reference" id="txt_reference" value="ello_<?php echo $id; ?>">
											            <!-- <input type="text" style="width:80px;" name="txt_amount" id="txt_amount" value="<?php echo $total; ?>"> -->
											            <input type="hidden" style="width:80px;" name="txn_interest" id="txn_interest" value="1">
											            <input type="hidden" style="width:80px;" name="txn_installments" id="txn_installments" value="1">
											            
											            <li class="clearfix m_bottom_15">
											            	<input class="t_xs_align_r button_type_15 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20" type="submit" onclick="createPayment()" value="Pagar com cartão" />
											            </li>
											        </ul>
											        
											    </fieldset>
											</div>

										</div>
									</figure>
								</div>

								<div class=" accordion_item">
									<h3 class="bg_light_color_1 color_dark a_title relative tr_all_hover  m_bottom_15">
											Boleto Bancário
											<span class="minus_icon tr_all_hover">-</span>
											<span class="plus_icon tr_all_hover">+</span>
									</h3>
									<figure class="clearfix relative ">
										
										<img width="105" src="<?php echo base_url() ?>assets/loja/images/boleto.png" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
										<figcaption class="m_bottom_20">
											<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Boleto</h5>
											<p>Pague com boleto. Você tem até dois dias para efetuar o pagamento. Lembre-se que você não conseguirá reemetir a compra caso se esqueça e terá que efetuar a compra novamente.</p>
										</figcaption>
										<div id="pagamento-cartao" class="clearfix bs_inner_offsets bg_light_color_3 r_corners ">
										<form method="post">
										<input class="t_xs_align_r button_type_15 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20" type="submit" name="submitBoleto" value="Pagar com boleto" />
										</form>
										</div>
									</figure>
								</div>
								

								<?php if( $this->loja->infoUser() == 1  ) : 

								if(  $total  <=  $this->loja->user('saldo_disponivel')  ) : ?>

								<div class="accordion_item">
									<h3 class="bg_light_color_1 color_dark a_title relative tr_all_hover  m_bottom_15">
											Saldo Ello
											<span class="minus_icon tr_all_hover">-</span>
											<span class="plus_icon tr_all_hover">+</span>
									</h3>
									<figure class="clearfix relative  m_bottom_15">
									<h3 class="tt_uppercase color_dark m_bottom_30">Saldo Ello</h3>
									<input type="radio" name="pagamento" class="d_none">
									<img width="105" src="<?php echo base_url() ?>assets/loja/images/saldo-ello.png"  alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
									<figcaption class="d_table d_sm_block">
										<div class="d_table_cell d_sm_block p_sm_right_0 p_right_45 m_mxs_bottom_5">
											<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Saldo Ello Invest</h5>
											<p>Você pode realizar o pagamento usando seu saldo da Ello Invest.</p>
										</div>
										<div class="d_table_cell d_sm_block discount">
											<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_0">Saldo disponível</h5>
											<p class="color_dark"><?php echo  $total.' - '.$this->cart->format_number( $this->loja->user('saldo_disponivel') ); ?></p>
										</div>
									</figcaption>
								</figure>
								</div>
								<?php endif;
								endif;?>

								
							</div>
								
							</section>
							
						</section>
						
					</div>
				</div>
			</div>

			<div id="debitResp">
				<div class="popup_wrap d_none" id="debit_popup">
				 	<section class="popup r_corners shadow">
				 	<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
				 	<h3 class="m_bottom_20 color_dark">Log In</h3>
				 	<div id="iframe"></div>
				 	</section>
				 </div>
			</div>


		<!--markup footer-->
			<footer id="footer">
				<!--copyright part-->
				<div class="footer_bottom_part">
					<div class="container clearfix t_mxs_align_c">
						<p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2016 <span class="color_light">azês pagamentos</span>. All Rights Reserved.</p>
						<ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
							<li><img src="<?php echo base_url() ?>assets/loja/images/payment_img_1.png" alt=""></li>
							<li class="m_left_5"><img src="<?php echo base_url() ?>assets/loja/images/payment_img_2.png" alt=""></li>
							<li class="m_left_5"><img src="<?php echo base_url() ?>assets/loja/images/payment_img_3.png" alt=""></li>
							<li class="m_left_5"><img src="<?php echo base_url() ?>assets/loja/images/payment_img_4.png" alt=""></li>
							<li class="m_left_5"><img src="<?php echo base_url() ?>assets/loja/images/payment_img_5.png" alt=""></li>
						</ul>
					</div>
				</div>
			</footer>
		</div>

		<!--scripts include-->
		<!--<script src="<?php echo base_url() ?>assets/loja/js/jquery-2.1.0.min.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

		 <!-- only for example -->
		<script src="https://api.bit.one/bitOneSupportTools/lib/jquery-2.1.1.min.js"></script>

		<!-- Required if use Jquery -->
		<script src="https://api.bit.one/bitOneSupportTools/lib/bitOneIntegrationLib.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery_imput_mask.js"></script>

		<script src="<?php echo base_url(); ?>assets/loja/card/lib/js/card.js"></script>
		<script>

		// $(document).ready(function(){

		// 	$('.a_title.active').css('background-color','#E53D3D');
		// });
		        new Card({
		            form: document.querySelector('#pay'),
		            container: '.card-wrapper'
		        });


			// window.onload = getReferenceNumber;

		 //    //Only for example
		 //    function getReferenceNumber(){

		 //        //Generate an reference number
		 //        var dt = new Date();
		 //        var reference = 'kitB1_'+ (dt.getMonth() + 1) + dt.getFullYear() + getRandomInt(1,500);
		 //        var reference_tag = document.getElementById("txt_reference");
		 //        reference_tag.value = reference;

		 //        function getRandomInt(min, max) {
		 //            return Math.floor(Math.random() * (max - min + 1)) + min;
		 //        }
		 //    }
		    //

		    //$("#txt_amount").mask("###.###.##0,00", {reverse: true});
		    //$("#txt_iataFee").mask("###.###.##0,00", {reverse: true});
		    //$("#txt_shippingFee").mask("###.###.##0,00", {reverse: true});

		    
		    //Only for example
		    var clearFields = function(){

		        //document.getElementById("txn_interest").value = '';
		        //document.getElementById("txt_cardExpMonth").value = '';
		        //document.getElementById("txt_cardExpYear").value = '';
		        document.getElementById("txt_cardExp").value = '';
		        document.getElementById("txt_cardCvv").value = '';
		        document.getElementById("txt_cardHolder").value = '';
		        document.getElementById("txt_cardNumber").value = '';

		    }
		    //

		    //Only for example
		    function trim(x) {
		        return x.replace(/^\s+|\s+$/g,'');
		    }

		    function space(y){
		    	return y.replace(" ",'');
		    }

		    //Only for example
		    function isEmailAddress(str) {
		        var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		        return pattern.test(str);  // returns a boolean
		    }

		    	function createPayment(){

			        var txnAmount = '<?php echo $total; ?>';
			        var txnCreditHolder = document.getElementById("txt_cardHolder").value;
			        var txnType = document.getElementById("txn_type").value;
			        var txnReference = document.getElementById("txt_reference").value;
			        var txnCreditNumberInput = document.getElementById("txt_cardNumber").value.split(" ");
			        var txnCreditNumber = txnCreditNumberInput[0]+txnCreditNumberInput[1]+txnCreditNumberInput[2]+txnCreditNumberInput[3];
			        var txnInterest = document.getElementById("txn_interest").value;
			        // var txnCreditMonth = document.getElementById("txt_cardExpMonth").value;
			        // var txnCreditYear = document.getElementById("txt_cardExpYear").value;

			        var txnCreditDate = document.getElementById("txt_cardExp").value;
			        var splitDate = txnCreditDate.split("/");
			        var txnCreditMonth = space(splitDate[0]);
			        var txnCreditYear = space('20'+splitDate[1]);

			        var txnCreditCvv = document.getElementById("txt_cardCvv").value;
			        var txnCreditInstallments = document.getElementById("txn_installments").value;
			        //Taxa de embarque
			        //var txnIataFee = document.getElementById("txt_iataFee").value;
			        //Taxa de entrega
			        //var txnShippingFee = document.getElementById("txt_shippingFee").value;

			        // if(!trim(txnAmount)){
			        //     alert('Valor é obrigatório');
			        //     return;
			        // }

			        if(!trim(txnCreditMonth)){
			            alert('Mês expiração obrigatório');
			            return;
			        }

			        if(!trim(txnCreditYear)){
			            alert('Ano expiração  obrigatório');
			            return;
			        }

			        if(!trim(txnCreditDate)){
			            alert('Data da expiração obrigatório');
			            return;
			        }

			        if(!trim(txnCreditNumber)){
			            alert('Cartão  obrigatório');
			            return;
			        }

			        if(!trim(txnReference)){
			            alert('Referência obrigatória');
			            return;
			        }

			        // if(txnCreditYear < 2015){
			        // 	alert('Ano inválido');
			        // 	return;
			        // }

			        var payment = {
			            b1_mid:'19',
			            b1_key:'LLz/c00AOLaFGCXGQ0tnHnV2Bv5Mbolq+EHDvxjqWMo=',
			            b1_referenceTag:txnReference,
			            b1_chargeInterest:txnInterest,
			            b1_transactionType:txnType,
			            b1_processor:'3',
			            b1_orign:'KIT',
			            b1_totalAmount:txnAmount.replace(/,/g, '.'),
			            b1_currency:'BRL',
			            b1_shippingAmount:'',//txnShippingFee.replace(/,/g, '.'),
			            b1_iataFee:'',//txnIataFee.replace(/,/g, '.'),
			            b1_creditClientName:txnCreditHolder,
			            b1_creditNumber:txnCreditNumber,
			            b1_creditExpirationMonth:txnCreditMonth,
			            b1_creditExpirationYear:txnCreditYear,
			            b1_creditCvv:txnCreditCvv,
			            b1_creditInstallments:txnCreditInstallments,
			        }
					
			        if(txnType == 'debit'){
			        	$('.cs-loader').show().fadeIn(5000);
			            doDebitPayment(payment);
			        }else{
			        	$('.cs-loader').show().fadeIn(5000);
			            doCreditPayment(payment);
			        }
				
			    }

			    function doDebitPayment(request){

			        debitTransaction(request,function(response){

			            if(response.success){

			            	$('#resp').html('<div class="alert_box r_corners color_green success m_bottom_10"><i class="fa fa-smile-o"></i><p>'+response.responseMessage+'.<a href="#" data-popup="#debit_popup" >Clique aqui para ir ao banco</a></p></div>');

			                clearFields();

			                console.log(response);

			            }else{

			                var respMessage = '';

			                if(!response.errorMessage){
			                    respMessage = response.responseMessage;
			                }else{
			                    respMessage = response.errorMessage;
			                }

			                $('#resp').html('<div class="alert_box r_corners error m_bottom_10"><i class="fa fa-exclamation-triangle"></i><p>'+respMessage+'. Você pode tentar novamente com outro cartão ou outra forma de pagamento.</p></div>');

			                clearFields();

			            }

			           	console.log(response);
			            saveTransaction(response,'Débito em conta');

			        });

			    }


			    function doCreditPayment(request){

			        creditTransaction(request, function(response){

			            if(response.success){

			                $('.cs-loader').addClass('bg-success', {duration:400,effect:'blind'});
			                $('#resp').html('<div class="alert_box r_corners color_green success m_bottom_10"><i class="fa fa-smile-o"></i><p>'+response.responseMessage+'. Você está sendo redirecionado.</p></div>');
			                
			            }else{

			            	$('.cs-loader').addClass('bg-fail',{duration:400,effect:'blind'});
			                if(response.authCode){

			                    $('#resp').html('<div class="alert_box r_corners error m_bottom_10"><i class="fa fa-exclamation-triangle"></i><p>'+response.responseMessage+'. Você pode tentar novamente com outro cartão ou outra forma de pagamento.</p></div>');

			                }else{

			                    if(!response.errorMessage){
			                        respMessage = response.responseMessage;
			                    }else{
			                        respMessage = response.errorMessage;
			                    }

			                    $('#resp').html('<div class="alert_box r_corners error m_bottom_10"><i class="fa fa-exclamation-triangle"></i><p>'+respMessage+'. Você pode tentar novamente com outro cartão ou outra forma de pagamento.</p></div>');
			                }

			            }
			            console.log(response);
			            saveTransaction(response,'Cartão de Crédito');
			        });
			    }

			function saveTransaction(responseTxn,paymentMode){

				var base_url = '<?php echo base_url() ?>index.php/secure/secure/ajaxTransaction',
					dataPedido = {idPedido: <?php echo $id ;?>, token: '<?php echo $token ;?>', payMode: paymentMode },
					responseTxnTotal = $.extend(responseTxn,dataPedido);

		    	$.ajax({

					type 	: "POST",
					url 	: base_url,
					dataType: "json",
					data 	: responseTxnTotal,
					
					success: function(response){

						console.log(response);

						if(response = true){
							
						}else{
							$('.cs-loader').removeClass('bg-fail').fadeOut().hide();
				 			$('.cs-loader').removeClass('bg-success').fadeOut().hide();
							alert('Erro ao salvar a transação');
						}

					},
					error: function(textStatus){
						$('.cs-loader').removeClass('bg-fail').fadeOut().hide().delay(5000);
				 		$('.cs-loader').removeClass('bg-success').fadeOut().hide().delay(5000);
						$('#resp').html(textStatus.responseText);
						console.log(textStatus);
					}

				});

				if(responseTxn.success){
					if(paymentMode == 'Cartão de Crédito'){
						window.location = '<?php echo base_url() ?>loja/pedidos/detalhes/<?php echo $id ;?>';
					}

					if(paymentMode == 'Débito em conta'){
						$('.cs-loader').removeClass('bg-fail').fadeOut().hide().delay(5000);
				 		$('.cs-loader').removeClass('bg-success').fadeOut().hide().delay(5000);
				 		
				 		var popUpDebit = '';

				 		popUpDebit += '<iframe class="embed-responsive-item" src="'+ responseTxn.urlDebitResponse +'" width="640" height="480"></iframe>';

				 		$('#iframe').html(popUpDebit);

					}
					
				}else{
					$('.cs-loader').removeClass('bg-fail').delay(5000).fadeOut(5000).hide();
				 	$('.cs-loader').removeClass('bg-success').delay(5000).fadeOut(5000).hide();
				}
		    }


		</script>

		<script src="<?php echo base_url() ?>assets/loja/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/retina.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/camera.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery.easing.1.3.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/waypoints.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery.isotope.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery.tweet.min.js"></script>
		<script src="<?php echo base_url() ?>assets/loja/js/jquery.custom-scrollbar.js"></script>


		<script >    	

								
					// doSubmit = false;
					
					
					
					// function doPay(event){
					// 	event.preventDefault();
							
					// 	if(!doSubmit){
								
					// 		var $form = document.querySelector('#pay');
								
					// 		Mercadopago.setPublishableKey("TEST-1e690a8a-b4e1-4464-bd54-21053f3a3a6c");
					// 		Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

					// 		return false;
					// 	}
					// };

					// function sdkResponseHandler(status, response) {
						
					// 	if (status != 200 && status != 201) {
					// 		alert("Erro. Verifique os dados podem estar incorretos.");
					// 	}else{
										       
					// 		var form = document.querySelector('#pay');

					// 		var card = document.createElement('input');
					// 			card.setAttribute('name',"token");
					// 			card.setAttribute('type',"hidden");
					// 			card.setAttribute('value',response.id);
					// 			form.appendChild(card);
								
					// 			doSubmit=true;
								
					// 			form.submit();
					// 	}
					// };

					// addEvent(document.querySelector('#pay'),'submit',doPay);


					// function addEvent(el, eventName, handler){
						
					// 	if (el.addEventListener) {
					// 		el.addEventListener(eventName, handler);
					// 	} else {
					// 		el.attachEvent('on' + eventName, function(){
					// 			handler.call(el);
					// 		});
					// 	}
					// };

					// function getBin() {
					// 	var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
					// 	return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
					// };

					// function guessingPaymentMethod(event) {
					// 	var bin = getBin();

					// 	Mercadopago.setPublishableKey("TEST-1e690a8a-b4e1-4464-bd54-21053f3a3a6c");



					// 	if (event.type == "keyup") {
					// 		if (bin.length >= 6) {
					// 			Mercadopago.getPaymentMethod({
					// 				"bin": bin
					// 			}, setPaymentMethodInfo);
					// 		}
					// 	} else {
					// 		setTimeout(function() {
					// 			if (bin.length >= 6) {
					// 				Mercadopago.getPaymentMethod({
					// 				    "bin": bin
					// 				}, setPaymentMethodInfo);
					// 			}
					// 		}, 100);
					// 	}
					// };

					// function setPaymentMethodInfo(status, response) {
					// 	if (status == 200) {
					// 			// do somethings ex: show logo of the payment method
					// 			var form = document.querySelector('#pay');

					// 		if (document.querySelector("input[name=paymentMethodId]") == null) {

					// 			var paymentMethod = document.createElement('input');
					// 				paymentMethod.setAttribute('name', "paymentMethodId");
					// 				paymentMethod.setAttribute('type', "hidden");
					// 				paymentMethod.setAttribute('value', response[0].id);
					// 				document.getElementById("slaveFlagCard").setAttribute('class', response[0].id);
							
					// 				form.appendChild(paymentMethod);

					// 				//Avisa a identificação necessaria para o pais de origem do cliente.
					// 				//padorinzamos com o CPF pois as vendas serão realizadas somente no Brasil
					// 				//Mercadopago.getIdentificationTypes();

					// 		} else {

					// 			Mercadopago.getIdentificationTypes();
					// 			document.querySelector("input[name=paymentMethodId]").value = response[0].id;
					// 			document.getElementById("slaveFlagCard").setAttribute('class', response[0].id);

					// 		}
					// 	}else{

					// 		document.getElementById("slaveFlagCard").removeAttribute('class');
					// 	}
					// };

					// addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
					// //addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);
									
			</script>


		<script src="<?php echo base_url() ?>assets/loja/js/scripts.js"></script>
	</body>
</html>
		