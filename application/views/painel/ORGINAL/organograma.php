      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Indicados</li>
          <li><a href="#">Lorem</a></li>
          <li class='active'><a href="#">ipsum</a></li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
      <div class="container-fluid">
      <div class="row">
      <?php if(isset($message)) echo $message; 

        $nivel = $this->painel_model->nivelUser(); ?>
        <div class="col-sm-12 col-md-12">
          
              <div class="tree-responsive zoomViewport">
                 
              <?php $indicados = $this->painel_model->Familia( $this->native_session->get('user_id') ); ?>

              <?php if(!empty($indicados) ):  ?>

                <div class="tree row zoomContainer" id="draggable">
                  <ul>
                  <?php foreach($indicados as $indicador => $filho): ?>
                      <li class="indicador" ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a href="#"><?php //echo $indicador; ?><?php echo $this->painel_model->infoUser($indicador)->nome ?></a>
                      <?php if(!empty($filho) ):  ?>
                          <ul class="ciclo1">
                          <?php foreach($filho as $filhoId): ?>
                              <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($filhoId); ?>
                                            <li ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                              $statusDoacao = $doacaoDownline->status;
                                              if($statusDoacao == 1 ): ?>
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
                                               <?php endif;?>" href="#"><?php //echo $filhoId; ?><?php echo $this->painel_model->infoUser($filhoId)->nome; ?></a>
                              
                              <?php $indicadosNetos = $this->painel_model->RedeNetos( $filhoId ); ?>
                                  
                                <?php  if($indicadosNetos == null) :  ?>

                                <?php else:?>

                                  <ul class="ciclo2">
                                  <?php foreach($indicadosNetos as $neto): ?>
                                      <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($neto); ?>
                                            <li  ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                              $statusDoacao = $doacaoDownline->status;
                                              if($statusDoacao == 1 ): ?>
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
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
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
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
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
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
  </div>

 
      <!-- Modal -->
                  <div class="modal fade " id="modalAviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Visualização por Organograma</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center">Sua rede é muito grande? Use o mouse para clicar e arrastar.</div>
                                            <div class="panel-body">
                                            <img src="<?php echo base_url()?>uploads/organograma.gif" style="width:100%" />
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>                       
                              </div>
                          </div>
                        </div>
