

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
                  <h6 class="card-title">ID<?php echo $conta->id ?></h6>
                  <h5 class="card-title"> <?php echo $conta->nome ?></h5>
                  <h6 class="card-subtitle"><?php echo $conta->email ?></h6>
                  <form action="#" method="post">
                    <!-- <button type="submit" name="novologin" value="novologin" class="btn btn-secondary-outline btn-sm">Adquirir login</button> -->
                  </form>
                  
                </div>
                <div class="card-block ">
                  <div class="row">
                    <div class="col-md-4 card-stat">
                      <h4><?php echo $conta->totalRecebido ?> <small class="text-uppercase">Recebido</small></h4>
                    </div>
                    <div class="col-md-4 card-stat">
                      <h4><?php //echo $conta->total_afiliados ?> 0 <small class="text-uppercase">Indicados</small></h4>
                    </div>
                    <div class="col-md-4 card-stat">
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
              <div class="card card-social text-xs-center">
                <div class="card-block">
                <?php if( $this->backoffice_model->usuariosContas() != false):
                    foreach($this->backoffice_model->usuariosContas() as $usuario ): ?>
                    <div class="col col-xs-12 col-sm-6">
                        <img src="<?php echo base_url()?>assets/default_avatar.png" height="90" width="90" alt="Avatar" class="img-circle">
                        <h5 class="card-title "><?php echo $usuario->idUsuario; ?> - <?php echo $usuario->login; ?></h5>
                        <h6 class="card-title"><small><?php echo date('d/m/Y H:i:s',strtotime($usuario->dataCadastro) ) ?></small></h6>
                        <button  data-idUser="<?php echo $usuario->idUsuario; ?>" class="btn btn-success <?php if($usuario->block == 1){ echo 'btn-danger';}?> accessUser" > <?php if($usuario->block == 1){ echo 'Bloqueado';}else{ echo 'Acessar';}?> </button>
                    </div>
                <?php endforeach; else: ?>

                    <p class="bg-info text-white col-xs-12 text-center"> Você não tem nenhum login cadastrado.</p>

                <?php endif;?>
                
                </div>
              </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
        
        </div>

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

        <div class="row">     

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-8 col-xl-6 col-xl-offset-3">
                <div class="card card-social text-xs-center">
                    <div class="card-block">
                    <h2 class="card-title text-center" style="display:block!important">Reentradas</h2>
                    <hr class="invisible">
                    <?php if( $this->backoffice_model->doacoesReentradas() != false):  ?>
                        <!-- <pre> -->
                        <?php //echo var_dump( $this->backoffice_model->doacoesReentradas() ); ?>
                        <!-- </pre> -->

                    <?php    foreach($this->backoffice_model->doacoesReentradas() as $doacao ):
                        
                        $doador = $this->backoffice_model->infoUser($doacao->idRecebedor);
                        ?>
                          <div class="col-xs-12 col-sm-12">
                            <div class="row clearfix" >
                              <div class="col-xs-5 col-sm-3 text-center">
                                <img src="<?php echo base_url()?>assets/default_avatar.png" height="50" width="50" alt="Avatar" class="img-circle" iddoacao="<?php echo $doacao->id ?>">
                                <h5 class="card-title label label-success <?php echo $doacao->id ?>">R$ <?php echo $doacao->valor ; ?> </h5>
                              </div>

                              <div class="col-xs-7 col-sm-4">
                                <h5 class="card-title "><?php echo $doador->id; ?> <?php echo limitarTexto($doador->nome,10) ?></h5>

                                <h5 class="card-title"> <?php echo $doador->telefone; ?> </h5>
                              </div>

                              <div class="col-xs-12 col-sm-5">
                                <button data-toggle="modal" data-target="#modalDetalhes" style="position:relative;right:inherit;top:0" class="btn btn-info" > Detalhes </button>
                                <button data-toggle="modal" <?php if($doacao->status == 1 OR $doacao->status == 3){ echo 'data-target="#modalDoacao"  data-iddoacao="'. $doacao->id .'" ';} ?>  style="position:relative;right:inherit;top:0" class="btn <?php if($doacao->status == 1){ echo 'btn-warning';}elseif($doacao->status == 2){ echo 'btn-info';}elseif($doacao->status == 3){ echo 'btn-danger';}elseif($doacao->status == 0){ echo 'btn-success';}else{}?>" >

                                 <?php if($doacao->status == 1){ echo 'Faça sua doação';}elseif($doacao->status == 2){ echo '<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Processando';}elseif($doacao->status == 3){ echo 'Recusada';}elseif($doacao->status == 0){ echo 'Recebida';}else{}?> </button>
                                 
                              </div>
                              
                            </div>
                            
                          </div>

                          
                          <div class="col-xs-12">
                            <hr class="  ">
                          </div>

                        <?php endforeach; else: ?>

                          <p class="bg-info text-white col-xs-12 text-center"> Aguarde sua próxima doação... </p>

                        <?php endif;?>

                    
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
        
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
        <?php if( $this->backoffice_model->doacoesReentradas()  != false):  ?>

        <?php foreach($this->backoffice_model->doacoesReentradas()  as $doacao ):
          $doador = $this->backoffice_model->infoUser( $doacao->idRecebedor );
        ?>
        <div class="card-block">
          
          <hr class="invisible">
          <div class="col col-xs-12 col-sm-12">
            <img src="<?php echo base_url()?>assets/default_avatar.png" height="90" width="90" alt="Avatar" class="img-circle"  />
            <h5 class="card-title "><?php echo $doador->id; ?> - <?php echo $doador->nome; ?></h5>
            <h6 class="card-title"><?php echo $doador->telefone; ?></h6>
          </div>

          <div class="clearfix hidden-md-up"></div>
        </div>

        <div class="card card-social text-xs-center">
          <div class="card-block">

          <h5 class="card-title text-center">Contas Bancárias</h5>
                  
              
            <?php  
              if( !empty( $this->backoffice_model->contaBancos($doador->id) )  ): 
                $bancos = $this->backoffice_model->contaBancos($doador->id);
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
                <div class="" style="color:#fff"><?php echo $doador->id ?> --- <?php echo $bank->idContaUsuario ?> --- <?php echo $doacao->idRecebedor ?></div>
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