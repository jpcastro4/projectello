
      <!-- Content -->
      
  <div id="content" class="clearfix">


    <div class="col-md-12">

    <div class="clearfix"><?php  if(isset($message)) echo $message;  ?></div>

    <a href="<?php echo $this->facebook->login_url(); ?>" class="btn btn-success" >Logar com facebook</a>

            <div class="col-xs-12 col-md-12 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading ">
                     Aviso
                  </div>
                  <div class="panel-body">
                    <p>Greve dos bancários a partir de terça-feira (06/09). Não deixe de doar. Providencie seu internet banking. Fora do internet banking clientes Caixa Econômica podem usar as Loterias e os clientes Banco do Brasil podem usar os Correios. Recomendamos os clientes dos outros bancos que procurem alternativas para realizar as transações necessárias. Rede ADS 50 não para. #vamospracima</p>
                 </div>
              </div>
                
              </div>

      <!-- ESSENCIAIS -->
      <div class="row mb60">
        <div class="col-xs-12 col-md-6">
          
          <?php  $nivel = $this->painel_model->nivelUser(); ?>
          <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6 ">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Nível</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-bolt fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->nivel; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Ciclo</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-puzzle-piece fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $this->painel_model->ciclo(); ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total recebido</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-institution fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->total_recebido; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total doado</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-thumbs-o-up fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->total_doado; ?></div>
              </div>
            </div>         
          </div>

        </div><!-- fimd a primeira coluna -->
        
        <div class="col-xs-12 col-md-6">
          
          <!-- LINK DIRETO  -->
            <div class="col-xs-12 col-md-12 " id="link-direto">
              <div class="panel panel-default">
                  <div class="panel-heading ">
                    <i class="fa fa-link fa fa-large"></i>
                      Link Direto <a href="#" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="O link direto cadastra apenas em você."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                  </div>
                  <div class="panel-body">
                    <pre><?php echo base_url('amigo/'.$this->painel_model->user('login')) ?></pre>
                 </div>
              </div>
                
              </div>
          <!-- END LINK DIRETO -->

          <!-- LINK DIRETO  -->
            <div class="col-xs-12 col-md-12 " id="link-unico">
              <div class="panel panel-default">
                  <div class="panel-heading ">
                    <i class="fa fa-link fa fa-large"></i>
                      Link Único <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="O Link único descobre pessoas ativas na sua rede com vaga abaixo."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                  </div>
                  <div class="panel-body">
                    <pre><?php echo base_url('linkunico/amigo/'.$this->painel_model->user('login')) ?></pre>
                 </div>
              </div>
                
              </div>
          <!-- END LINK DIRETO -->


        </div><!-- fimd a primeira coluna -->
      </div>

      <!-- INFORMATIVOS -->
      <div class="row mb60">
        <div class="col-xs-12 col-md-6">
          
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-money fa fa-large"></i> Sua próxima doação <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Fique atento no aceite da sua doação. Ela sobe você de ciclo e te dá a possibilidade de acessar as doações que você ainda irá receber."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
              </div>
              <div class="panel-body">
              <?php 
                //var_dump($this->painel_model->Uplines() );

              if($this->painel_model->lider() == false ): 
                $id_recebedor = $this->painel_model->Recebedor(); 
                $recebedor = $this->painel_model->infoUser($id_recebedor);
                $doador = $this->painel_model->infoUser($this->native_session->get('user_id'));
                ?>
              <div class="clearfix">
                <div class="recebedor col-sm-12 col-md-12 col-lg-6 text-center">

                <i class="fa fa-user"></i>
                
                <h3><?php echo $recebedor->nome ;?></h3><span style="color:#fff !important"><?php echo $id_recebedor; ?></span>
                
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 text-center">
                
                 <span class="vlrrecebedor"> <?php echo $this->painel_model->valorDoacao(); ?></span><br>
                </div>
              </div>
              <hr>
              <div class="clearfix text-center">
                <?php if($recebedor->ciclo >= $doador->ciclo+1): // DOE SOMENTE SE O SEU UPLINE DOAR ACIMA ?>
                
                <?php $StatusDoacao = $this->painel_model->StatusDoacao();?>

                <?php if($StatusDoacao != false):

                if( $StatusDoacao->status == 0): ?>
                    <p class="alert alert-info">Aguarde seu upline aprovar a doação.</p>
                <?php elseif($StatusDoacao->status == 2):?>
                  <p class="alert alert-danger">Sua doação foi rejeita.</p>
                  <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning">Reapresentar</button>
                <?php elseif($StatusDoacao->status == 1):?>
                  <p class="alert alert-success"><small>Sua doação foi aceita. Ao subir de ciclo você verá seu próximo recebedor.</small></p>
                <?php else:?>
                    <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning">Doar</button>
                <?php endif; ?>
                <?php else:?>
                    <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning">Doar</button>
                <?php endif; ?>

                <?php else:?>
                 <p class="alert alert-info">Seu upline ainda não doou acima. <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Esse upline precisa doar acima para estar em um ciclo compatível. Só assim ele conseguirá aceitar sua doação. O sistema está automatizando esses bloqueios para que você não deposite antes que o upline esteja apto. Cobre dele para prosseguir. Do contrário todos serão bloqueados."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a></p>
                <?php endif;?>
                <hr>
                <pre><?php echo $recebedor->login ;?></pre>
                <p><strong><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></strong></p>
              </div>
              
              

              <?php else:?>
              <p class="alert alert-info">Você não precisa doar. Você é líder </p>
              <?php endif;?>

              
              </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " id="downline-aberto">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-beer fa fa-large"></i> Downline aberto <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Esse é o seu downline que está com lugar livre abaixo dele na sua fila de link único."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
              </div>
                  <div class="panel-body">
                    <div class="recebedor col-md-12 text-center">

                    <i class="fa fa-user"></i>
                    
                    <?php $aberto = $this->painel_model->LinkUnico( $this->native_session->get('user_id') );

                      $user_aberto = $this->painel_model->infoUser($aberto);

                     ?>

                     <?php if($user_aberto->ciclo > 0 ){ echo "<span class='label label-success'>Ativo</span>";}else{ echo "<span class='label label-danger'>Inativo</span>";}?>

                    <h3><?php echo $user_aberto->nome ;?> <span style="color:#fff"> -<?php echo $user_aberto->id ;?> </span> </h3>
                    <hr>
                    <pre><?php echo $user_aberto->login ;?></pre>
                    <p><strong><?php echo $user_aberto->ddd.' '.$user_aberto->celular ;?></strong></p>
                  </div>
                  </div>
            </div>
        </div><!-- FIM DOWNLINE ABERTO -->

        </div> <!-- FIM DA PRIMEIRA COLUNA -->

        <div class="col-xs-12 col-md-6">
          
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <i class="fa fa-filter fa fa-large"></i> Regras
                    <div class="panel-tools">
                  </div>
                </div>
                <div class="panel-body">
                      <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Sobre ativações e indicações</a></h2>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <li>Você precisa se ativar, doando 50,00 ao recebedor indicado no seu painel. Somente após sua doação ser recebida, você poderá indicar 3 pessoas pelo seu link.</li>
                          <li>Caso você não seja ativado em 24h, você perderdá sua posição no sistema e seu cadastro bloqueado.</li>
                          <li>Você tem 15 dias para indicar 3 pessoas. Caso não consiga, você será bloqueado.</li>
                          <li>Se você for bloqueado e ainda assim, em 15 dias, não indicar 3 amigos, seu cadastro será excluído.</li>
                          <li>Você só consegue receber se estiver com as doações em dia. Portanto seja ágil. Doe e poderá receber.</li>
                        </div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTwo">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Sobre prazos</a></h2>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                          <li><p>Nossa meta é alcançar o prazo máximo de derramamentos de rede em 45 dias. Por isso os prazos serão observados criteriosamente.</p></li>
                          <li>Você tem 24h para realizar suas doações.</li>
                          <li>Você também tem 24h para aceitar suas doações.</li>
                          <li>Caso você seja vítima de atraso, utilize o suporte para denúncia. O espírito da rede é a cordialidade. Doar é entender a necessidade do próximo e em segundo plano a suas necessidades mas, ser cordial não significa ser conivente. Denuncie.</li>
                          </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTree">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="true" aria-controls="collapseTree">Sobre exclusões</a></h2>
                          </div>
                          <div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTree">
                          <div class="panel-body">
                          <li><strong>NÃO</strong> se ativar com a primeira doação é passível de <strong>EXCLUSÃO</strong>. Não vamos tolerar pessoas sem o espírito de grupo.</li>
                          <li>Receber e não doar é passível de bloqueio no sistema.</li>
                          <li>Se você é líder, tenha a prática de identificar e manter organizada sua lista de espera. Os punidos que receberem e não doarem serão retirados do sistema, e o lugar ficará disponível para interessados.</li>
                          <li>A equipe de suporte tem a única função de manter a rede funcionando. Não somos responsáveis por colocar pessoas abaixo de doadores 'sedentários'. Se você decidiu entrar para a Rede ADS 50. Trabalhe. Todos trabalhamos. </li>
                          </div>
                          </div>
                        </div>
                      </div>
                     
                </div>
              </div>
            </div> <!-- FIM DAS REGRAS -->
        </div>
      </div><!-- FIM DO ROW -->
    </div>


  <?php $superuser = $this->native_session->get('superuser');

     if($superuser == 1 ):?>

    <div class="col-md-12 ">

    <?php //var_dump( $this->painel_model->Rastreador($this->native_session->get('user_id')) ); ?>

    <?php //echo $this->painel_model->LinkUnico(); ?>

    <?php //echo $this->painel_model->LinkUnico($this->native_session->get('user_id')) ; ?>

    <div class="col-sm-12 col-md-6 col-lg-6 ">
      <div class="mb60">
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-beer fa fa-large"></i>
              Avisos
            </div>
            <div class="panel-body">
              <form method="post">
               <div class="form-group">
                <input type="text" class="form-controle" name="id_user" >
               </div>
                <div class="form-group">
                <input type="submit" class="btn btn-success" name="superadm" value="Acessar">
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- VIDEO 
    <div class="col-xs-12 col-sm-12 col-md-6 mb60">
      <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-video fa fa-large"></i>
            Não seja mais um mudo imitando a multidão
        </div>
        <div class="panel-body">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/s_rbmeOP3T0" frameborder="0" allowfullscreen></iframe>
          </div>

        </div>
      </div>
    </div> -->
    <!-- END VIDEO  -->


  </div>
<?php endif;?>





  </div>



         <!-- Modal -->
                        <div class="modal fade" id="modalDoacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                  <?php  ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Doação para <?php echo $recebedor->nome ;?></h4>
                                    </div>
                                    
                                    <div class="modal-body">

                                        <h3><?php echo $recebedor->nome.' '.$recebedor->sobrenome ;?></h3>
                                        <p></i><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></p>
                                        <hr>
                                        <h3>Conta bancária</h3>
                                        <p>Banco: <?php foreach($bancos as $banco){
                                          
                                          if( $banco['code'] == $recebedor->banco){ 

                                                echo $banco['code'].' - '.$banco['name'];
                                            }

                                          } ?><br>
                                        Agência: <?php echo $recebedor->agencia ?> <br>
                                        Conta: <?php echo $recebedor->conta ?> <br>
                                        Tipo da conta: <?php echo $recebedor->tipo_conta; ?> <br>
                                        Titular: <?php echo $recebedor->nome.' '.$recebedor->sobrenome ;?>
                                        </p>
                                        <hr>

                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center">Enviar comprovante</div>
                                            <div class="panel-body">
                                            <form method="post" action="#" enctype="multipart/form-data" >
                      
                                              <input type="hidden" name="id_recebedor" required value="<?php echo $recebedor->id;?>" />

                                                  <div class="form-group">
                                                      <input type="file" name="userfile" required class="default" />
                                                  </div>

                                                 <div class="form-group">
                                                   <input type="submit" name="comprovante" class="btn btn-theme" value="Enviar comprovante">
                                                 </div>
                                          </form>
                                            </div>
                                        </div>

                                    </div>                       
                                </div>
                          </div>
                        </div>
