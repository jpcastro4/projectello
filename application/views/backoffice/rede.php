
	<hr class="invisible">

	<div class="container">
	  	<div class="row">     
		  	<div class="clearfix hidden-md-up"></div>
			<div class="col-md-8 col-xl-6 col-xl-offset-3">

			  <!-- User Card
			  ================================================== -->

				<div class="card card-inverse card-social text-xs-center">
					<div class="card-block has-gradient">
					  	<img src="<?php echo base_url()?>assets/default_avatar.png" height="90" width="90" alt="Avatar" class="img-circle">
					  	<h5 class="card-title"><?php echo $conta->nome ?></h5>
					  	<h6 class="card-subtitle"><?php echo $conta->email ?></h6>
					  	<!-- <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button> -->
					</div>
					<div class="card-block ">
					  	<div class="row">
							<div class="col-xs-4 col-md-4 card-stat">
						  		<h4><?php echo $conta->totalRecebido ?> <small class="text-uppercase">Recebido</small></h4>
							</div>
							<div class="col-xs-4 col-md-4 card-stat">
						  		<h4><?php //echo $conta->total_afiliados ?> 0 <small class="text-uppercase">Indicados</small></h4>
							</div>
							<div class="col-xs-4 col-md-4 card-stat">
						  		<h4><?php //if( $conta->total_afiliados < 300 ){
							  		//echo 1; 
									//}else{ 
									//echo floor($conta->total_afiliados / $conta->contas);

									//} ?> 0 <small class="text-uppercase" >Reentradas</small></h4>
							</div>
					  	</div>
					</div>
				</div>

			  	<?php if( isset($mensagem) ) echo $mensagem; ?>
			  	<?php if( isset($mensagem_erro) ) echo $mensagem_erro; ?>

		  	</div>
	  	</div>
	</div>

	<div class="rede container">
		<div class="row">
			<hr class="invisible">
		<div class="col-sm-12 col-md-12 tree-responsive clearfix">
          
              <div class="zoomViewport">
                 
              <?php $indicados = $this->backoffice_model->RedeFilhos($this->native_session->get('user_id')); ?>

<!-- <pre>
              <?php //var_dump($indicados)?>
</pre> -->
              <?php if(!empty($indicados) ):  ?>

                <div class="tree row zoomContainer" id="draggable">
                  <ul>
                  <?php foreach($indicados as $indicador => $filho): ?>
                      <li class="indicador" ><div class="avatar-frame">
                      	<img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"></div><a href="#"><?php //echo $indicador; ?><?php echo $this->backoffice_model->infoUser($indicador)->nome ?></a>
                      <?php if(!empty($filho) ):  ?>
                          <ul class="ciclo1">
                          <?php foreach($filho as $filhoId): ?>
                              
                                <li>
                                    <div class="avatar-frame">
                                        <img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png">
                                    </div>
                                    <a class="" href="#"><?php echo $filhoId; ?><?php echo $this->backoffice_model->infoUser($filhoId)->nome; ?></a>
                              
                              		<?php $indicadosNetos = $this->backoffice_model->RedeNetos( $filhoId ); ?>
								                                  
	                                <?php  if($indicadosNetos == null) :  ?>

	                                <?php else:?>

	                                  	<ul class="ciclo2">
	                                  	<?php foreach($indicadosNetos as $neto): ?>
	                                      
	                                        <li  ><div class="avatar-frame"><img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"></div>
	                                        <a class="" href="#">C:<?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> L: <?php echo $neto; ?> <?php echo $this->backoffice_model->infoUser($neto)->nome; ?></a>


	                                        		<?php $indicadosNetos = $this->backoffice_model->RedeNetos( $neto ); ?>
								                                  
					                                <?php  if($indicadosNetos == null) :  ?>

					                                <?php else:?>

					                                  	<ul class="ciclo2">
					                                  	<?php foreach($indicadosNetos as $neto): ?>
					                                      
					                                        <li  ><div class="avatar-frame"><img class="user-pic" width=80" src="<?php echo base_url(); ?>/assets/default_avatar.png"></div>
					                                        <a class="" href="#">C:<?php echo $this->backoffice_model->infoUser($neto)->conta_id; ?> L:<?php echo $neto; ?> <?php echo $this->backoffice_model->infoUser($neto)->nome; ?></a>


					                                      	</li>
					                                  	<?php endforeach;?> 
					                                  	</ul>
					                                  
					                                <?php endif;?>

	                                      	</li>
	                                  	<?php endforeach;?> 
	                                  	</ul>
	                                  
	                                <?php endif;?>
                              
                              </li>

                          <?php endforeach; ?>
                          </ul>
                        </li>
                      <?php endif;?>

                  <?php endforeach;?>
                    </ul>
                  
                </div> 
                <?php else: ?>

                    <div class="alert alert-info text-center">Você não tem downlines.</div>

                <?php endif;?>
                     
              </div>
            </div>

            <hr class="invisible">
            <hr class="invisible">
            <hr class="invisible">

		</div>

	</div>
	
	<hr class="invisible">
	<div class="container">
		<div class="row ads">     

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-8 col-xl-6 col-xl-offset-3">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- NOWX -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3215674587886121"
                       data-ad-slot="7539926294"
                       data-ad-format="auto"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
            </div>
        </div>
	</div>

		

		<div class="modal fade" id="modalDoacao">
			<div class="modal-dialog card card-social text-xs-center">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Apresente seu comprovante</h4>
                    </div>
				  <div class="card-block">					
						<div class="col col-xs-12 col-sm-12">
							<form method="post" action="#" enctype="multipart/form-data" >
								<div class="col-xs-12">
									<input type="file" name="userfile" required class=" " >
								</div>
								<hr class="invisible" >
								<div class="col-xs-12">
									<button type="submit" style="position:inherit" name="comprovante" value=comprovante"" class="btn btn-primary has-gradient">Finalizar</button>
								</div>
								<hr class="invisible">
							</form>
						</div>

						<div class="clearfix hidden-md-up"></div>
				   </div>
			  </div>
		  
		</div>

		
		<div class="modal fade" id="modalDetalhes">
		  	<div class="modal-dialog card card-social text-xs-center">    
		  		                              
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Doações</h4>
                </div>
				<?php if( $this->backoffice_model->doacoes() != false):  ?>

				<?php foreach($this->backoffice_model->doacoes() as $doacao ):
					$doador = $this->backoffice_model->infoUser($doacao->idRecebedor);
				?>
				<div class="card-block">
					<hr class="invisible">
					<div class="col col-xs-12 col-sm-12">
						<img src="<?php echo base_url()?>assets/default_avatar.png" height="90" width="90" alt="Avatar" class="img-circle" />
						<h5 class="card-title "><?php echo $doador->nome; ?></h5>
						<h6 class="card-title"><?php echo $doador->telefone; ?></h6>
					</div>

					<div class="clearfix hidden-md-up"></div>
				</div>

				<div class="card card-social text-xs-center">
					<div class="card-block">
					<h5 class="card-title text-center">Contas Bancárias</h5>
						      
						  
						<?php  
							if( !empty( $this->backoffice_model->contaBancos() )  ): 
							  $bancos = $this->backoffice_model->contaBancos();
							  $o = 0; 
							
							foreach( $bancos as $bank ): 
								$banco = unserialize($bank->banco);
						?>

							<div class="card">
								<div class="card-header" role="tab" id="heading<?php echo $o++ ?>" >
									<h5 class="mb-0">
									  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o++ ?>" aria-expanded="true" aria-controls="collapse<?php echo $o++ ?>">
										<?php echo $banco->banco; ?>
									  </a>
									</h5>
								</div>

							  <div id="collapse<?php echo $o++ ?>" class="collapse in" role="tabpanel" aria-labelledby="heading<?php echo $o++ ?>">
								<div class="card-block">
								  <?php echo $banco->titular ?><br/> Agencia <?php echo $banco->agencia ?> <?php if(!empty($banco->op)){ echo 'Op '.$banco->op; }?> Conta <?php echo $banco->conta ?><br/> <?php echo $banco->tipo_conta ?> <br/>CPF do Titular <?php echo $banco->cpfTitular ?>
								</div>
							  </div>
							  
							</div>                       

						  <?php endforeach;?>
						
						
						<div class="clearfix hidden-md-up"></div>
						<?php else: ?>
							 <p class="alert alert-info text col-xs-12 text-center"> Recebedor não cadastrou banco. </p>
						<?php endif;?>				   
				  	</div>
				</div>

				  <?php endforeach; 

				  else: ?>

					<p class="alert alert-info text col-xs-12 text-center"> Aguarde sua próxima doação... </p>

				<?php endif;?>
				 

		  	</div>
		</div>

		<div class="modal fade" id="modalConfirma">
			<div class="modal-dialog card card-social text-xs-center">
					<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Doação Recebida</h4>
                    </div>
				  <div class="card-block">					
						<div class="col col-xs-12 col-sm-12">
							<form method="post" action="#" >
								<div id="comprovante"></div>
								<hr class="invisible" >
								<div class="col-xs-12">
									<button type="submit" style="position:inherit;" name="confirmarDoacao" value="recusarDoacao" class="btn btn-primary btn-left">Confirmar</button>
									<button type="submit" style="position:inherit;" name="recusarDoacao" value="recusarDoacao" class="btn btn-danger btn-right">Recusar</button>
								</div>
								<hr class="invisible">
							</form>
						</div>

						<div class="clearfix hidden-md-up"></div>
				   </div>
			  </div>
		  
		</div>

		