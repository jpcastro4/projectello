<!-- Content -->
      <div class="container">
      <div class="container-fluid">
      <div class="row">
      <?php if(isset($mensagem)) echo $mensagem; 

        $nivel = $this->painel_model->nivelUser(); ?>
        <div class="col-sm-12 col-md-12">
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-beer fa fa-large"></i>
              Rede de recebimentos
              <div class="panel-tools">
                <!-- <div class="btn-group">
                  <a class="btn" href="#">
                    <i class="fa fa-refresh"></i>
                    Refresh statics
                  </a>
                  <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Toggle">
                    <i class="fa fa-chevron-down"></i>
                  </a>
                </div> -->
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                
                <?php // var_dump($indicados); ?>
                <table class='table'>
                  <thead>
                    <tr>
                      <!-- <th>#</th> -->
                      <!-- <th>Ciclo</th> -->
                      <th>First Name</th>
                      <th>Celular</th>
                      <th>Login</th>
                      <th>Ciclo do Indicado</th>
                      <th class='actions'>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                  $indicados = $this->painel_model->Downlines();
                  //
                  if(!empty($indicados) ): 

                  ?>
                  <?php foreach($indicados as $ciclo => $indicados_nivel): //foreach no primeiro nivel da array onde ele trata os ciclos ?>
                      <?php echo '<tr><td class="alert-info"> Ciclo '.$ciclo.'<td></tr>';?>
                      <?php if(!empty($indicados_nivel) ):  ?>
                        
                        <?php foreach($indicados_nivel as $downline): //segundo foreach no segundo nivel da array onde ?>

                        <?php $downlineInfo = $this->painel_model->infoUser($downline); ?>
                        
                        <?php //MARCACAO DE CORES PARA O STATUS
                        $doacaoDownline = $this->painel_model->verificaDoacaoDownline($downlineInfo->id);

                        ?>

                          <tr class="<?php if(!empty($doacaoDownline) ) : 

                              $statusDoacao = $doacaoDownline->status;
                                if($statusDoacao == 1 ): ?>
                                  success
                                <?php elseif($statusDoacao == 2): ?>
                                  danger
                                <?php else: ?>
                                    warning
                                <?php endif;?>

                                 <?php endif;?>  ">
                    <!--     <td><?php echo $downlineInfo->id; ?></td> -->
                        <!-- <td><?php echo $ciclo; ?></td> -->
                        <td><?php //echo $downlineInfo->id; ?><?php echo $downlineInfo->nome; ?></td>
                        <td><?php echo $downlineInfo->ddd.' '.$downlineInfo->celular; ?> </td>
                        <td ><a data-toggle="tooltip" target="_blank" title="Link de indicação" href="<?php echo base_url('/amigo')?>/<?php echo $downlineInfo->login; ?>"><?php echo $downlineInfo->login; ?></a></td>
                        <td><?php echo $downlineInfo->ciclo; ?> </td>
                        <td class="action">
                        <?php if($this->painel_model->ciclo() >= $ciclo OR $this->painel_model->lider() == true): //BLOQUEIA OS DOWNLINES QUE PERTENCEM AO CICLO IGUAL AO DO USUARIO LOGADO ENTENDENDO QUE ELE PRECISA SALTAR PRA RECEBER DOS PROXIMOS. ?>

                        <?php if(!empty($doacaoDownline) ) : 

                          if($statusDoacao == 0 ): ?>
                          <a data-toggle="modal" data-target="#modalConfirmaDoacao" data-iddoacao="<?php echo $doacaoDownline->id; ?>" data-comprovante="<?php echo $doacaoDownline->comprovante ?>">
                          <button class="btn btn-info" data-toggle="tooltip"  title="Visualizar" >
                            <i class="fa fa-eye"></i>
                          </button>
                          </a>
                          <?php elseif($statusDoacao == 1 ): ?>
                            <p class="label label-success">Liberada.</p>
                          <?php elseif($statusDoacao == 2 ): ?>
                            <p class="label label-danger">Rejeitada.</p>
                          <?php else: ?>
                          <p class="label label-info">Aguardando doação.</p>
                          <?php endif;?>

                        <?php else: ?>
                          <p class="label label-info">Aguardando doação.</p>
                        <?php endif;?>

                        <?php else: ?>
                          <p class="label label-warning">Doe para receber.</p>
                        <?php endif;?>
                        </td>
                      </tr>
                    <?php endforeach;
                    endif;?>
                        
                  <?php endforeach;?>
                  <?php else: ?>
                    <div class="alert alert-info">Você não tem downlines.</div>
                  <?php endif;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        </div>
      </div>


      <!-- Modal -->
                        <div class="modal fade " id="modalConfirmaDoacao" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <?php  ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Confirmar doação</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center">Clique para visualizar o comprovante maior.</div>
                                            <div class="panel-body">
                                            <a id="comprovante" target="_blank"  href=""><img style="width:100%" title="comprovante"/>
                                            </a>
                                            </div>
                                        </div>
                                        <hr>

                                        <form method="post" action="#" enctype="multipart/form-data" >
                      
                                          <input id="id_doacao" type="hidden" name="id_doacao" required />
                                          <div class="form-group text-center"> 
                                              <label>Insira sua senha</label>
                                              <input type="password" name="senha" class="form-control" required>
                                          </div>
                                          <div class="form-group text-center">
                                              <input id="submit" type="submit" name="confirmarDoacao" class="btn btn-success" value="Aceitar">
                                              <input id="submit" type="submit" name="recusarDoacao" class="btn btn-danger" value="Recusar">

                                          </div>
                                          </form>
                                            </div>
                                        </div>

                                    </div>                       
                                </div>
                          </div>
                        </div>
