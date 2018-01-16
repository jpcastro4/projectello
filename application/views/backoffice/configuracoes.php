

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
                  <h6 class="card-subtitle"><?php echo $conta->telefone ?></h6>
                  <!-- <button type="submit" class="btn btn-secondary-outline btn-sm">Follow</button> -->
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

              </div>
          </div>
  </div>


  <div class="container">

        <div class="row">     
           <div class="clearfix hidden-md-up"></div>
            <div class="col-md-8 col-xl-6 col-xl-offset-3">
                <div class="col-sm-12">
                    <a href="<?php echo base_url() ?>backoffice"><i class="fa fa-arrow-left"></i> Voltar ao painel</a>
                </div>
                <hr class="invisible">
                <div class="clearfix hidden-md-up"></div>
                <div class="card card-social text-xs-center">
                    <div class="card-block">
                    <h2 class="card-title text-center">Telefone</h2>
                    
                    <div class="clearfix hidden-md-up"></div>
                    <button class="btn btn-primary" style="position:relative;right:inherit"  data-toggle="modal" data-target="#modalTelefone" data-id="<?php echo $this->native_session->get('conta_id')?>" > Mude seu telefone </button>
                   
                    </div>
                </div>

            </div>

            <div class="clearfix hidden-md-up"></div>
            <hr class="invisible">
        
        </div>

        <div class="row">     
           <div class="clearfix hidden-md-up"></div>
            <div class="col-md-8 col-xl-6 col-xl-offset-3">
                <div class="col-sm-12">
                    <a href="<?php echo base_url() ?>backoffice"><i class="fa fa-arrow-left"></i> Voltar ao painel</a>
                </div>
                <hr class="invisible">
                <div class="card card-social text-xs-center">
                    <div class="card-block">
                    <h2 class="card-title text-center">Senha</h2>
                    
                    <div class="clearfix hidden-md-up"></div>
                    <button class="btn btn-primary" style="position:relative;right:inherit"  data-toggle="modal" data-target="#modalSenha" data-id="<?php echo $this->native_session->get('conta_id')?>" > Mude sua senha </button>
                   
                    </div>
                </div>

            </div>

            <div class="clearfix hidden-md-up"></div>
            <hr class="invisible">
        
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
                

                <hr class="invisible">
                <div class="card card-social text-xs-center">
                    <div class="card-block">
                    <h2 class="card-title text-center">Contas Bancárias</h2>
                     <div id="accordion" role="tablist" aria-multiselectable="true">                   
                    <?php  
                      if( !empty( $this->backoffice_model->contaBancos() )  ): 
                        $bancos = $this->backoffice_model->contaBancos();
                        $o = 0; 
                    ?>

                      <?php   foreach( $bancos as $bank ): 
                          $banco = unserialize($bank->banco);  ?>

                        <div class="card">
                          <div class="card-header" role="tab" id="heading<?php echo $o++ ?>">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o++ ?>" aria-expanded="true" aria-controls="collapse<?php echo $o++ ?>">
                                <?php echo $banco->banco; ?>
                              </a>
                            </h5>
                          </div>

                          <div id="collapse<?php echo $o++ ?>" class="collapse in" role="tabpanel" aria-labelledby="heading<?php echo $o++ ?>">
                            <div class="card-block">
                              <?php echo $banco->titular ?><br/> Agencia <?php echo $banco->agencia ?> <?php if(!empty($banco->op)){ echo 'Op '.$banco->op; }?> Conta <?php echo $banco->conta ?><br/> <?php echo $banco->tipo_conta ?> <br/>CPF do Titular <?php echo $banco->cpfTitular ?>
                              <div class="col-xs-12">
                                <button class="btn btn-primary" style="position:relative; right:inherit"  data-toggle="modal" data-target="#modalConta" data-idbanco="<?php echo $bank->id ?>"> Editar </button>
                              </div>

                            </div>
                            
                          </div>
                          
                        </div>                       

                      <?php endforeach;?>
                    </div>
                    <div class="clearfix hidden-md-up"></div>
                    <?php else: ?>
                            <p class="bg-info text-white  col-xs-12 text-center"> Cadastre seu banco </p>
                    <?php endif;?>

                    <div class="clearfix hidden-md-up"></div>
                    
                    <?php if( empty( $this->backoffice_model->contaBancos() ) OR  count( $this->backoffice_model->contaBancos() ) < 3 ):  ?>

                        <button class="btn btn-primary" style="position:relative;right:inherit"  data-toggle="modal" data-target="#modalConta" > Novo banco </button>

                    <?php endif;?>
                    <hr class="invisible">
                        <div class="modal fade" id="modalConta">
                          <div class="modal-dialog card card-social text-xs-center">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title text-center">Conta bancária</h4>
                                </div>
                                <div class="card-block">          
                                    <form action="" method="post">
                          
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label class="sr-only" for="banco">Banco</label>
                                        <input type="text" name="banco" minlength="3" class="form-control " id="banco"  requried placeholder="Banco">
                                      </div>
                                    </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label class="sr-only" for="agencia">Agencia</label>
                                      <input type="text" name="agencia" minlength="3" class="form-control " id="agencia"  requried placeholder="Agencia">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label class="sr-only" for="agencia">Op</label>
                                      <input type="text" name="op" minlength="3" class="form-control " id="op"  requried placeholder="Op">
                                      <small>para Caixa </small>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label class="sr-only" for="conta">Conta</label>
                                      <input type="text" name="conta" minlength="3" class="form-control " id="conta"  requried placeholder="Conta">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label class="sr-only" for="titular">Titular</label>
                                      <input type="text" name="titular" minlength="3" class="form-control " id="titular"  requried placeholder="Titular">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label class="sr-only" for="titular">Tipo da conta</label>
                                      <input type="text" name="tipo_conta" minlength="3" class="form-control " id="tipo_conta"  requried placeholder="Corrente, Poupança ou digital">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label class="sr-only" for="cpfTitular">CPF do Titular</label>
                                      <input type="tel" name="cpfTitular" minlength="3" class="form-control " id="cpfTitular"  requried placeholder="CPF do titular">
                                    </div>
                                  </div>
                                  
                                  <div class="col-sm-12">
                                    <div class="form-group text-center" >
                                      <button type="submit" name="submitBanco" value="submitBanco" class="btn btn-primary">Salvar banco</button>
                                    </div>
                                  </div>

                                </form>

                                  <hr class="invisible">
                                  </div>
                            </div>
                        
                        </div>
                    
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
        
        </div>        

    <div class="modal fade" id="modalSenha">
        <div class="modal-dialog card card-social text-xs-center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Muda Senha</h4>
           </div>
          <div class="card-block">          
            <div class="col col-xs-12 col-sm-12">
              <form method="post" action="#" >
                <div id="idUser"></div>
                <hr class="invisible" >
                <div class="col-xs-12">
                  <input type="text" name="novaSenha" value="" class="form-control" placeholder="Digite a nova senha">
                </div>
                <div class="col-xs-12">
                  <button type="submit" style="position:inherit;" name="mudarSenha" value="mudarSenha" class="btn btn-primary btn-left">Confirmar</button>
                </div>
                <hr class="invisible">
              </form>
            </div>

            <div class="clearfix hidden-md-up"></div>
           </div>
        </div>
      
    </div>

     <div class="modal fade" id="modalTelefone">
        <div class="modal-dialog card card-social text-xs-center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Muda Telefone</h4>
           </div>
          <div class="card-block">          
            <div class="col col-xs-12 col-sm-12">
              <form method="post" action="#" >
                <div id="idUser"></div>
                <hr class="invisible" >
                <div class="col-xs-12">
                  <input type="text" name="novaTelefone" value="<?php echo $conta->telefone ?>" id="telefone" class="form-control" placeholder="Novo telefone">
                </div>
                <div class="col-xs-12">
                  <button type="submit" style="position:inherit;" name="mudarTelefone" value="mudarTelefone" class="btn btn-primary btn-left">Confirmar</button>
                </div>
                <hr class="invisible">
              </form>
            </div>

            <div class="clearfix hidden-md-up"></div>
           </div>
        </div>
      
    </div>   


    </div>  
</div>
    
