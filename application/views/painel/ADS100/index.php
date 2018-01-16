    <?php $superuser = $this->native_session->get('superuser');
    if($superuser == 1 ):?>
    <div class="container super-user">
                <div class="card relative">
                    <label class="labelsuperuser" id="labelsuperuser">Super User </label>

                    <div class="card-content grey lighten-4">
                        <span class="card-title activator grey-text block text-darken-4 clear ">Super User</span>
                        <form method="post">
                           <div class="input-field">
                            <input type="text" class="form-controle" id="idUser" name="id_user" >
                            <label for="idUser">ID do Usuário</label>
                           </div>
                            <div class="row center-align">
                                <input type="submit" class="btn" name="superadm" value="Acessar">
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <?php endif;?>
    <div class="container">            
        <div class="row">
            
            
            <div class="col s12 l9">
                <div class="row">
                    <div class="col s12 l6 ">
                        <div class="card grey lighten-5 ">
                            
                            <div class="card-content center-align">
                                <span class="card-title grey-text text-darken-4 block">Próxima doação </span>
                                <?php 

                                if($this->painel_model->lider() == false ): 
                                    $id_recebedor = $this->painel_model->Recebedor(); 
                                    $recebedor = $this->painel_model->infoUser($id_recebedor);
                                    $doador = $this->painel_model->infoUser($this->native_session->get('user_id'));
                                
                                ?>
                                
                                <div class="row ">
                                    <div class="row">
                                        <div class="block">
                                            <div class=""><i class="large material-icons">perm_identity</i></div>
                                        </div>

                                        <div class="block"> 
                                            <span class="card-title grey-text text-darken-4 block"><?php echo $recebedor->nome ;?></span>
                                            
                                            <span class="block flow-text"><strong> <?php echo $this->painel_model->valorDoacao(); ?></strong></span>
                                        </div>
                                    </div>
                                     <?php if($this->painel_model->qtdDoacoes() ): //DOE SOMENTE SE RECEBEU O BASTANTE  ?> 
                            
                                    <?php $StatusDoacao = $this->painel_model->StatusDoacao();?>

                                        <?php if($StatusDoacao != false): // SE A DOACAO EXISTE  ?>

                                            <?php if( $StatusDoacao->status == 0): // SE A DOACAO AINDA AGUARDA APROVACAO ?>
                                                <p class="chip light-blue accent-2 white-text">Aguarde seu upline aprovar a doação.</p>
                                            <?php elseif($StatusDoacao->status == 2): //SE A DOACAO FOI REJEITADA ?>
                                                <p class="chip red darken-4 white-text">Sua doação foi rejeita.</p>
                                                <div class="row">
                                                <a href="#modalDoacao" ><button class="btn btn-large red darken-4 white-text waves-effect waves-light"> Clique para enviar o comprovante </button></a>
                                                </div>
                                                <div class="row">
                                                <div class="chip red darken-4 white-text" id="cronometro"></div>
                                                </div>
                                            <?php elseif($StatusDoacao->status == 1): //SE A DOACAO FOI ACEITA E NAO HOUVER UPLINES ?>
                                                <p class="chip alert-success"><small>Sua doação foi aceita. Aguarde seus recebimentos.</small></p>
                                            <?php else:?>
                                                 <div class="row">
                                                <a href="#modalDoacao" class="btn btn-large amber lighten-1 white-text waves-effect waves-light">Clique para enviar o comprovante </a>
                                                </div>
                                                <div class="row">
                                                <div class="chip red darken-4 white-text" id="cronometro"></div>
                                                </div>
                                            <?php endif; ?>

                                        <?php else: //--- ELSE SE A DOACAO EXISTE ?>
                                            <div class="row">
                                            <div class="col s12 center-align">
                                            <a href="#modalDoacao" class="btn btn-large modal-trigger amber lighten-1 white-text waves-effect waves-light">Clique para enviar o comprovante </a>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="chip red darken-4 white-text" id="cronometro"></div>
                                            </div>
                                        <?php endif; //-- FIM SE A DOACAO EXISTE ?>

                                    <?php else: //--- ELSE DOE SOMENTE SE FOR O BASTANTE?>
                                     <p class="chip light-blue accent-2 white-text">Aguardando seu saldo ser suficiente </p>
                                    <?php endif; //----- FIM DOE SOMENTE SE FOR O BASTANTE ?>

                                </div>

                                <div class="row">
                                <div class="divider"></div>
                                </div>

                                <div class="cf center-align">
                                    <a class="activator btn teal lighten-3 " href="#">Ver dados do recebedor</a>
                                </div>

                                <?php else:?>
                                    <p class="chip light-blue center accent-2 white-text">Você não precisa doar. Você é líder </p>
                                <?php endif;?>

                            </div>
                            <div class="card-reveal">
                                <div class="row">
                                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                </div>


                                <div class="row center-align">
                                    <pre id="loginRecebedor"><?php echo $recebedor->login ;?></pre>
                                    <p><strong id="telefoneRecebedor"><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></strong></p>
                                </div>

                                <div class="row">
                                <div class="divider"></div>
                                </div>

                                <div class="row">
                                    <div class="col s12">
                                        <h5>Conta bancária</h5>
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
                                    </div>
                                </div>
                                <span style="color:#fff !important"><?php echo $id_recebedor; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l6">
                        <div class="card grey lighten-5">
                            <div class="card-content center-align">
                                <span class="card-title grey-text text-darken-4 block">Vaga aberta no LD</span>
                                <div class="card-container ">
                                    <!-- <div class="row"> -->
                                        <div class="block">
                                            <div class=""><i class="large material-icons">perm_identity</i></div>
                                        </div>
                                        <!-- <div class="row"> -->
                                            <?php

                                                $aberto = $this->painel_model->LinkUnico( $this->native_session->get('user_id') );

                                                $user_aberto = $this->painel_model->infoUser($aberto);

                                            ?>

                                            <?php if($user_aberto->ciclo > 0 ){ echo "<span class='chip green lighten-1 white-text'>Ativo</span>";}else{ echo "<span class='chip red darken-3 white-text'>Inativo</span>";}?>

                                            <span class="card-title grey-text text-darken-4 block"><?php echo $user_aberto->nome ;?> </span>
                                            <div class="row">
                                                <div class="divider"></div>
                                            </div>

                                            <pre><?php echo $user_aberto->login ;?></pre>
                                            <p><strong><?php echo $user_aberto->ddd.' '.$user_aberto->celular ;?></strong></p>
                                            <span style="color:#fff"> -<?php echo $user_aberto->id ;?> </span>
                                        <!-- </div> -->
                                    <!-- </div> -->

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 l3">
                <div class="row">
                    <div class="card">
                        <div class="card-content grey lighten-4">
                            <div class="row center-align">
                                <span class="card-title activator grey-text block text-darken-4 clear ">
                                    <?php echo $this->painel_model->user('nome'); ?>
                                </span>
                                <?php if( !empty($this->painel_model->indicador()) ):?>

                                <div class="chip">Indicado por <?php echo $this->painel_model->infoUser($this->painel_model->indicador() )->nome;?><?php endif; ?>
                                </div>
                                <?php  $nivel = $this->painel_model->nivelUser(); ?>
                                <div class="row center-align">
                                <p class="chip blue darken-3 white-text">Nível <?php echo $nivel->nivel; ?></p>
                                <p class="chip red lighten-1 white-text">Ciclo <?php echo $this->painel_model->ciclo(); ?></p>
                                </div>
                                <div class="row">
                                <div class="divider cf "></div>
                                </div>
                                <div class="cf col s12">
                                    <div class="col s6 center-align">
                                    <div class="block "><i class="material-icons">open_in_browser</i></div>
                                    <p class="block" ><?php echo $nivel->total_recebido; ?></p>
                                    <span class="block" >Total recebido</span>
                                    </div>
                                    <div class="col s6 center-align">
                                    <div class="block"><i class="material-icons">system_update_alt</i></div>
                                    <p class="block"><?php echo $nivel->total_doado; ?></p>
                                    <span class="block">Total doado</span>
                                    </div>
                                </div>

                            </div>
                        
                        </div>
                    </div>
                
                    
                    <div class="card">
                            
                            <div class="card-content grey lighten-4">
                                <span class="card-title activator grey-text text-darken-4">Link Direto</span>
                                    <pre><?php echo base_url('amigo/'.$this->painel_model->user('login') ) ?></pre>
                            </div>
                            
                    </div>

                    <div class="card">
                            
                            <div class="card-content grey lighten-4">
                                <span class="card-title activator grey-text text-darken-4">Link Único</span>
                                <pre><?php echo base_url('linkunico/amigo/'.$this->painel_model->user('login')) ?></pre>
                            </div>
                            
                    </div>
                    
                </div>
            
            </div>

        </div>
    </div>
    <div class="col s12 center-align">
        <div class="row"><h2>Rede</h2></div>
        <div class="row rede">
            <!-- Content -->
            <div class="cf ">
                <div class="tree-reponsive">
                    <?php $nivel = $this->painel_model->nivelUser(); ?>
                                                           
                    <?php $indicados = $this->painel_model->Familia( $this->native_session->get('user_id') ); ?>

                    <?php if(!empty($indicados) ):  ?>

                        <div class="tree row cf " id="draggable">
                            
                            <ul >
                                <?php foreach($indicados as $indicador => $filho): ?>
                                          <li class="indicador" ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a href="#"><?php //echo $indicador; ?><?php echo $this->painel_model->infoUser($indicador)->nome ?></a>
                                          <?php if(!empty($filho) ):  ?>
                                              <ul class="ciclo1">
                                              <?php foreach($filho as $filhoId): ?>
                                                  <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($filhoId); ?>
                                                    <li >

                                                    <div class="avatar-frame userGet"  data-get="<?php echo $filhoId; ?>">

                                                    <img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div>

                                                        <a class="
                                                            <?php if(!empty($doacaoDownline) ) : 

                                                                  $statusDoacao = $doacaoDownline->status;
                                                                  if($statusDoacao == 1 ): ?>
                                                                    light-green white-text
                                                                  <?php elseif($statusDoacao == 2): ?>
                                                                     red darken-2 white-text
                                                                  <?php else: ?>
                                                                    amber lighten-1
                                                                  <?php endif;?>
                                                                  
                                                                  <?php else: ?>
                                                                      amber lighten-1
                                                                   <?php endif;?>" href="#" >

                                                                   <?php echo $this->painel_model->infoUser($filhoId)->nome; ?>
                                                            
                                                        </a>
                                                  
                                                  <?php $indicadosNetos = $this->painel_model->RedeNetos( $filhoId ); ?>
                                                      
                                                    <?php  if($indicadosNetos == null) :  ?>

                                                    <?php else:?>

                                                      <ul class="ciclo2">
                                                      <?php foreach($indicadosNetos as $neto): ?>
                                                          <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($neto); ?>
                                                                <li  ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                                                  $statusDoacao = $doacaoDownline->status;
                                                                  if($statusDoacao == 1 ): ?>
                                                                    light-green white-text
                                                                  <?php elseif($statusDoacao == 2): ?>
                                                                     red darken-2 white-text
                                                                  <?php else: ?>
                                                                    amber lighten-1
                                                                  <?php endif;?>
                                                                  
                                                                  <?php else: ?>
                                                                      amber lighten-1
                                                                   <?php endif;?>" href="#"><?php //echo $neto; ?><?php echo $this->painel_model->infoUser($neto)->nome; ?></a>
                                                            
                                                            <?php $indicadosBisnetos = $this->painel_model->RedeBisnetos( $neto ); ?>
                                                      
                                                            <?php  if($indicadosBisnetos == null) :  ?>

                                                            <?php else:?>
                                                            <ul class="ciclo3" >
                                                            <?php foreach($indicadosBisnetos as $bisneto): ?>

                                                              <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($bisneto); ?>
                                                                <li  ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                                                  $statusDoacao = $doacaoDownline->status;
                                                                  if($statusDoacao == 1 ): ?>
                                                                    light-green white-text
                                                                  <?php elseif($statusDoacao == 2): ?>
                                                                     red darken-2 white-text
                                                                  <?php else: ?>
                                                                    amber lighten-1
                                                                  <?php endif;?>
                                                                  
                                                                  <?php else: ?>
                                                                      amber lighten-1
                                                                   <?php endif;?>" href="#"><?php //echo $bisneto; ?><?php echo $this->painel_model->infoUser($bisneto)->nome; ?></a>

                                                                    <?php $indicadosTataranetos = $this->painel_model->RedeTataranetos( $bisneto ); ?>
                                                              
                                                                    <?php  if($indicadosTataranetos == null) :  ?>

                                                                    <?php else:?>
                                                                    <ul class="ciclo4" >
                                                                    <?php foreach($indicadosTataranetos as $tataraneto): ?>
                                                                        <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($tataraneto); ?>
                                                                        <li >
                                                                        <div class="avatar-frame">
                                                                        <img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png">
                                                                        </div>

                                                                        <a class="<?php if(!empty($doacaoDownline) ) : 

                                                                          $statusDoacao = $doacaoDownline->status;
                                                                          if($statusDoacao == 1 ): ?>
                                                                            light-green white-text
                                                                          <?php elseif($statusDoacao == 2): ?>
                                                                            red darken-2 white-text
                                                                          <?php else: ?>
                                                                            amber lighten-1
                                                                          <?php endif;?>
                                                                          
                                                                          <?php else: ?>
                                                                              amber lighten-1
                                                                           <?php endif;?>" href="#"><?php //echo $tataraneto; ?><?php echo $this->painel_model->infoUser($tataraneto)->nome; ?></a>
                                                                                </li>
                                                                    <?php endforeach;?> 
                                                                    </ul>
                                                                    <?php endif;?>

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

                        <div class="alert alert-info">Você não tem downlines.</div>

                    <?php endif;?>           
                                         
                                    
                            
                </div>
                    
                    
            </div>
        </div>
    </div>



<div class="modal" id="modalDoacao" >
    <div class="modal-content">
        <div class="row">
        <button type="button" class="modal-action modal-close waves-effect waves-green " >&times;</button>
        </div>
        <h4 class="modal-title" id="myModalLabel">Doação para <?php echo $recebedor->nome.' '.$recebedor->sobrenome ;?></h4>
        
        <div class="row">
            <div class="divider"></div>
        </div>

        <p>Whatsapp: <?php echo $recebedor->ddd.' '.$recebedor->celular ;?></p>

        <h5>Dados bancários</h5>
        <p>Banco: <?php foreach($bancos as $banco):                                          
            if( $banco['code'] == $recebedor->banco): 
                echo $banco['code'].' - '.$banco['name']; 
            endif;
        endforeach; ?><br />
        Agência: <?php echo $recebedor->agencia ?> <br />
        Conta: <?php echo $recebedor->conta ?> <br />
        Tipo da conta: <?php echo $recebedor->tipo_conta; ?> <br />
        Titular: <?php echo $recebedor->titular ;?>
        </p>
      
    
        
        <h4 class="modal-title">Envie o comprovante</h4>
            
        <div class="row">
            <div class="divider"></div>
        </div>

        <form method="post" action="#" enctype="multipart/form-data" >      
            <input type="hidden" name="id_recebedor" required value="<?php echo $recebedor->id;?>" />

            <div class="file-field input-field">
                    <div class="btn">
                        <span>Inserir comprovante</span>
                        <input type="file" name="userfile" required />
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
            </div>
            <div class="modal-footer">              
                <div class="row">
                    <input type="submit" id="comprovante" name="comprovante" class="btn btn-theme" value="Confirmar envio">
                </div>
            </div>
        </form>
        
    </div>
</div>
      
<div class="modal" id="modalDownline" >
    <div class="modal-content">
        
        <div id="iduser"></div>
        
    </div>
</div>