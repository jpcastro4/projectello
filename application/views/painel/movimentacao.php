<!-- Content -->
<div class="container">
     
    <div class="row">
        <?php //if(isset($mensagem)) echo $mensagem; 

        $nivel = $this->painel_model->nivelUser(); ?>

        <div class="col-sm-12 col-md-12">
          
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-beer fa fa-large"></i>
                  Recebimentos
                </div>
                <div class="panel-body">
                    <div class="col-sm-12" >
                        
                        <?php // var_dump($indicados); ?>
                        <table class="display responsive nowrap" id="recebimentos" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <!-- <th>#</th> -->
                                  <!-- <th>Ciclo</th> -->
                                  <th data-priority="1" >Doador</th>
                                  <th>Comprovante</th>
                                  <th>Enviado</th>
                                  <th>Ciclo do Indicado</th>
                                  <th>Valor</th>
                                  <th data-priority="2" class='actions'>
                                    Actions
                                  </th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php $recebidas = $this->painel_model->listaRecebimentos();
                            if($recebidas != false):
                            foreach($recebidas as $recebida ): ?>
                               
                                <tr  class="<?php if(!empty($doacaoDownline) ) : 

                              $statusDoacao = $doacaoDownline->status;
                                if($statusDoacao == 1 ): ?>
                                  success
                                <?php elseif($statusDoacao == 2): ?>
                                  danger
                                <?php else: ?>
                                    warning
                                <?php endif;?>

                                 <?php endif;?>  "> 
                                    <td><?php echo $this->painel_model->infoUser($recebida->id_doador)->nome; ?> <sup class="label" style="background-color:#666"> <?php echo $this->painel_model->infoUser($recebida->id_doador)->login ?></sup></td>
                                    <td><a href="<?php echo base_url('uploads/comprovantes/'.$recebida->comprovante)?>" target="_blank">
                                          <button data-toggle="tooltip"  title="Ver comprovante" >
                                            <i class="fa fa-file-o"></i>
                                          </button>
                                          </a></td>
                                    <td><?php echo date('d/m/Y', strtotime($recebida->data_envio) ); ?></td>
                                    <td><?php echo $recebida->ciclo ?></td>
                                    <td><?php echo $recebida->valor ?></td>
                                    <td>
                                        <?php

                                          if($recebida->status == 0 ): ?>
                                          <a data-toggle="modal" data-target="#modalConfirmaDoacao" data-iddoacao="<?php echo $recebida->id; ?>" data-comprovante="<?php echo $recebida->comprovante ?>">
                                          <button class="btn btn-info" data-toggle="tooltip"  title="Visualizar" >
                                            Visualizar comprovante
                                          </button>
                                          </a>
                                          <?php elseif($recebida->status == 1 ): ?>
                                            <p class="label label-success">Liberada.</p>
                                          <?php elseif($recebida->status == 2 ): ?>
                                            <p class="label label-danger">Rejeitada.</p>
                                          <?php else: ?>
                                          <p class="label label-info">Aguardando doação.</p>
                                          <?php endif;?>


                                    </td>
                                </tr>

                            <?php endforeach; endif; ?>


                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="adsense" style="max-width:900px; margin-left:auto;margin-right:auto;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- REDE ADS 50 -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-3215674587886121"
           data-ad-slot="2424863893"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script></div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
          
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-beer fa fa-large"></i>
                  Doações
                </div>
                <div class="panel-body">
                    <div class="col-sm-12" >
                        
                        <?php // var_dump($indicados); ?>
                        <table class="display responsive nowrap" id="doacoes" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <!-- <th>#</th> -->
                                  <!-- <th>Ciclo</th> -->
                                  <th>Recebedor</th>
                                  <th>Comprovante</th>
                                  <th>Ciclo do Indicado</th>
                                  <th>Valor</th>
                                  <th class='actions'>
                                    Actions
                                  </th>
                                </tr>
                            </thead>
                          <tbody>
                            <?php $doadas = $this->painel_model->listaDoacoes();
                            if($doadas != false):
                            foreach($doadas as $doada ): ?>
                               
                                <tr> 
                                    <td><?php echo $this->painel_model->infoUser($doada->id_recebedor)->nome; ?></td>
                                    <td><a href="<?php echo base_url('uploads/comprovantes/'.$doada->comprovante)?>" target="_blank">
                                          <button data-toggle="tooltip"  title="Ver comprovante" >
                                            <i class="fa fa-file-o"></i>
                                          </button>
                                          </a></td>
                                    <td><?php echo $doada->ciclo ?></td>
                                    <td><?php echo $doada->valor ?></td>
                                    <td>
                                        <?php

                                          if($doada->status == 0 ): ?>
                                          <p class="label label-info">Aguardando doação.</p>
                                          <?php elseif($doada->status == 1 ): ?>
                                            <p class="label label-success">Liberada.</p>
                                          <?php elseif($doada->status == 2 ): ?>
                                            <p class="label label-danger">Rejeitada.</p>
                                          <?php else: ?>
                                          <p class="label label-info">Aguardando doação.</p>
                                          <?php endif;?>


                                    </td>
                                </tr>

                            <?php endforeach; endif; ?>


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
