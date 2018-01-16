
      <!-- Content -->
      
      <div id="content">
      <?php //if($this->painel_model->infoUser('ciclo') > 0 ):?>
      <div class="container-fluid mb60">
        <div class="col-xs-12 col-sm-11 col-md-6 col-lg-4 link">
          <h4>Link de indicação</h4>
          <pre><?php echo base_url('amigo/'.$login) ?></pre>

        </div>
      </div>
    <?php //endif;?>
      <div class="container-fluid mb60">
        <div class="row">
        <?php if(isset($message)) echo $message; 

        $nivel = $this->painel_model->nivelUser(); ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 ">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Nível</div>
                <div class="pw-icone col-xs-6 col-sm-5">
                  <i class="fa fa-bolt fa-4x"></i>
                </div>
                <div class="pw-resultado col-xs-6 col-sm-6"><?php echo $nivel->nivel; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Ciclo</div>
                <div class="pw-icone col-xs-6 col-sm-5">
                  <i class="fa fa-puzzle-piece fa-4x"></i>
                </div>
                <div class="pw-resultado col-xs-6 col-sm-6"><?php echo $this->painel_model->ciclo(); ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total recebido</div>
                <div class="pw-icone col-xs-6 col-sm-5">
                  <i class="fa fa-institution fa-4x"></i>
                </div>
                <div class="pw-resultado col-xs-6 col-sm-6"><?php echo $nivel->total_recebido; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total doado</div>
                <div class="pw-icone col-xs-6 col-sm-5">
                  <i class="fa fa-thumbs-o-up fa-4x"></i>
                </div>
                <div class="pw-resultado col-xs-6 col-sm-6"><?php echo $nivel->total_doado; ?></div>
              </div>
            </div>         
          </div>

        </div>
      </div>

<!--       <div class="container-fluid mb60">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            
          </div>
          <div class="col-sm-12 col-md-6">
            
          </div>
        </div>
      </div>
 -->
      <div class="container-fuid">
      <div class="row">
        <div class="col-sm-12 col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-money fa fa-large"></i>
              Sua próxima doação
              <!-- <div class="panel-tools">
                <div class="btn-group">
                  <a class="btn" href="#">
                    <i class="fa fa-refresh"></i>
                    Refresh statics
                  </a>
                  <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Toggle">
                    <i class="fa fa-chevron-down"></i>
                  </a>
                </div>
              </div> -->
            </div>
            <div class="panel-body">
            <?php 
              //var_dump($this->painel_model->Uplines() );

            if($this->painel_model->lider() == false ):

              $id_recebedor = $this->painel_model->Recebedor();

            //echo $this->painel_model->Recebedor();
              
              ?>
            <div class="recebedor col-md-6 text-center">

              <i class="fa fa-user"></i>
              
              <?php $recebedor = $this->painel_model->infoUser($id_recebedor); ?>
              <h3><?php echo $recebedor->nome ;?></h3>
              <p><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></p>
            </div>
            <div class="col-md-6 text-center">
             <span class="vlrrecebedor"> <?php echo valorFormat($proxValor,2); ?></span><br>

             <?php $StatusDoacao = $this->painel_model->StatusDoacao();?>

            <?php if($StatusDoacao != false):

            if( $StatusDoacao->status == 0): ?>
                <p class="alert alert-info">Aguarde seu upline aprovar a doação.</p>
            <?php elseif($StatusDoacao->status == 2):?>
              <p class="alert alert-danger">Sua doação foi rejeita.</p>
              <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-default">Doar</button>
            <?php else:?>
                <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-default">Doar</button>
            <?php endif; ?>
            <?php else:?>
                <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-default">Doar</button>
            <?php endif; ?>


            </div>
            <?php else:?>
            <p class="alert alert-info">Você não precisa doar. Você é líder</p>
          <?php endif;?>

            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6">
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-beer fa fa-large"></i>
              Rede de recebimentos
              <div class="panel-tools">
                <div class="btn-group">
                  <a class="btn" href="#">
                    <i class="fa fa-refresh"></i>
                    Refresh statics
                  </a>
                  <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Toggle">
                    <i class="fa fa-chevron-down"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                
                <?php // var_dump($indicados); ?>
                <table class='table'>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Ciclo</th>
                      <th>First Name</th>
                      <th>Celular</th>
                      <th>Username</th>
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
                  <?php  foreach($indicados as $ciclo=>$indicados_ciclo): //foreach no primeiro nivel da array onde ele trata os ciclos ?>
                     <!--  <tr> Ciclo <?php //echo $nivel;?></tr> -->
                        <?php if(!empty($indicados_ciclo) ): 
                        foreach($indicados_ciclo as $downline): //segundo foreach no segundo nivel da array onde ?>
                        <?php $downlineInfo = $this->painel_model->infoUser($downline); ?>
                        
                          <tr class="<?php if(!empty($doacaoDownline) ) : 

                                if($doacaoDownline->status == 0 ): ?>
                                  warning
                                <?php elseif($doacaoDownline->status == 1 ): ?>
                                  success
                                <?php elseif($doacaoDownline->status == 2 ): ?>
                                  danger
                                  <?php else: ?>
                                    warning
                              <?php endif;?>

                              <?php else: ?>
                               warning
                              <?php endif;?>

                          ">
                        <td><?php echo $downlineInfo->id; ?></td>
                        <td><?php echo $ciclo; ?></td>
                        <td><?php echo $downlineInfo->nome; ?></td>
                        <td><?php echo $downlineInfo->celular; ?> </td>
                        <td><?php echo $downlineInfo->login; ?></td>
                        <td class="action">

                        <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($downlineInfo->id);  ?>


                        <?php if($ciclo == $this->painel_model->ciclo()  OR $this->painel_model->lider() == true):

                          if(!empty($doacaoDownline) ) : 

                          if($doacaoDownline->status == 0 ): ?>
                          <a data-toggle="modal" data-target="#modalConfirmaDoacao" data-iddoacao="<?php echo $doacaoDownline->id; ?>" data-comprovante="<?php echo $doacaoDownline->comprovante ?>">
                          <button class="btn btn-info" data-toggle="tooltip"  title="Visualizar" >
                            <i class="fa fa-eye"></i>
                          </button>
                          </a>
                          <?php elseif($doacaoDownline->status == 1 ): ?>
                            <p class="label label-success">Liberada.</p>
                          <?php elseif($doacaoDownline->status == 2 ): ?>
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

      <!-- <div class="container-fuid">
      <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-beer fa fa-large"></i>
            Hierapolis Rocks!
            <div class="panel-tools">
              <div class="btn-group">
                <a class="btn" href="#">
                  <i class="fa fa-refresh"></i>
                  Refresh statics
                </a>
                <a class="btn" data-toggle="toolbar-tooltip" href="#" title="Toggle">
                  <i class="fa fa-chevron-down"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="page-header">
              <h4>System usage</h4>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-success" style="width: 35%"></div>
              <div class="progress-bar progress-bar-warning" style="width: 20%"></div>
              <div class="progress-bar progress-bar-danger" style="width: 10%"></div>
            </div>
            <div class="page-header">
              <h4>User statics</h4>
            </div>
            <div class="row text-center">
              <div class="col-md-3">
                <input class="knob second" data-bgcolor="#d4ecfd" data-fgcolor="#30a1ec" data-height="140" data-inputcolor="#333" data-thickness=".3" data-width="140" type="text" value="50">
              </div>
              <div class="col-md-3">
                <input class="knob second" data-bgcolor="#c4e9aa" data-fgcolor="#8ac368" data-height="140" data-inputcolor="#333" data-thickness=".3" data-width="140" type="text" value="75">
              </div>
              <div class="col-md-3">
                <input class="knob second" data-bgcolor="#cef3f5" data-fgcolor="#5ba0a3" data-height="140" data-inputcolor="#333" data-thickness=".3" data-width="140" type="text" value="35">
              </div>
              <div class="col-md-3">
                <input class="knob second" data-bgcolor="#f8d2e0" data-fgcolor="#b85e80" data-height="140" data-inputcolor="#333" data-thickness=".3" data-width="140" type="text" value="85">
              </div>
            </div>
          </div>
        </div>
        </div> -->
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
                                        <p>Agência: <?php echo $recebedor->agencia ?> <br> Conta: <?php echo $recebedor->banco ?> <br> Tipo da conta: <?php echo $recebedor->tipo_conta; ?> <br> Titular: <?php echo $recebedor->nome.' '.$recebedor->sobrenome ;?></p>
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
                                              <input type="password" name="senha" class="form-control" required >
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
