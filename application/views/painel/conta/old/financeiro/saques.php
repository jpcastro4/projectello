<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">



            <div class="col-lg-12 mt">
                <div class="row content-panel">
                    <div class="col-lg-12 ">

                    <a data-toggle="modal" data-target="#modalSaque" style="margin-right:20px " class=" mt mb btn btn-theme04 pull-right">Solicitar Saque </a>

                    <div class="chat-room-head">
                        <h1>Saques </h1>
                    </div>
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        ID Pedido
                                    </th>
                                    <th>
                                         Data do Pedido
                                    </th>
                                    <th>
                                         Valor
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($saques !== false){

                                    $status = array(0=>'<b><font color="orange">Pendente</font></b>', 1=>'<b><font color="green">Pago</font></b>', 2=>'<b><font color="red">Estornado</font></b>');

                                    foreach($saques as $saque){

                                    ?>
                                    <tr>
                                    <td>
                                         #<?php echo $saque->id;?>
                                    </td>
                                    <td>
                                        <?php echo converter_data($saque->data_pedido, "-", "/");?>
                                    </td>
                                    <td>
                                         <?php echo $saque->valor;?>
                                    </td>
                                    <td>
                                         <?php echo $status[$saque->status]; ?>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                }
                                ?>
                                </tbody>
                                </table>
                        
                    </div><! --/col-lg-10 -->
                   
                </div>
            </div><!--/col-lg-12 mt -->

            <?php  if(!$this->input->post('submit2') && !$this->input->post('submit')){ ?>

            <input type="hidden" class="verModal" value="false"> 

            <?php }elseif($this->input->post('submit2') && !$this->input->post('submit')){ ?>

            <input type="hidden" class="verModal"  value="true"> 

            <?php }elseif(!$this->input->post('submit2') && $this->input->post('submit')){ ?>

            <input type="hidden" class="verModal" value="true"> 

            <?php  }else{ ?>

            <input type="hidden" class="verModal" value="true"> 

            <?php }  ?>



            <! -- MODALS -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modalSaque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Solicitação de Saque</h4>
                              </div>
                              <div class="modal-body">

                                <div class="hidden-sm hidden-xs">
                                    <h4>R$ <?php echo $this->conta_model->user('saldo_disponivel');?></h4>
                                    <h6>SALDO DISPONÍVEL</h6>
                                    <h4><?php echo $this->conta_model->ValoresPagos();?></h4>
                                    <h6>VALORES PAGOS</h6>
                                </div>

                                <?php  if(config_site('saque_disponivel') == 1 ): ?>

                                    <div class="panel panel-info">
                                        <div class="panel-heading text-center">Atenção</div>
                                        <div class="panel-body">
                                           <p> Lembrando que o valor mínimo permitido para saque é de <b>R$ <?php echo config_site('valor_minimo_saque');?> Reais</b> </p>
                                           <p>Após ser solicitado o saque, o valor informado será retirado do seu <b>Saldo Disponível</b> e será colocado no <b>Saldo Bloqueado</b> até que o sistema faça o pagamento do seu pedido. Para que possamos fazer seu saque com maior agilidade e rapidez, sempre deixe os dados bancários atualizados.</p>
                                        </div>
                                    </div>

                                    <hr class="mt mb">

                                    <?php if (config_site('taxa_saque') != 0): ?>
                                    <div class="alert alert-warning text-center">Para efetuar um saque você pagará uma taxa de <b><?php echo config_site('taxa_saque');?>%</b> que será acrescentado no valor do saque.</div> <?php endif; ?>

                                    <form action="" method="post" class="form-horizontal">

                                    <?php  if( !$this->input->post('submit2') && !$this->input->post('submit')): ?>
                                    

                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Valor a ser sacado</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                        <input required type="text" class="form-control" name="valor" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Dados da sua conta bancária</label>
                                                <div class="col-md-6">
                                                    <b>Banco: </b><?php echo BancoPorID($this->conta_model->user('banco'));?><br />
                                                    <b>Agência: </b> <?php echo $this->conta_model->user('agencia');?><br />
                                                    <b>Conta: </b> <?php echo $this->conta_model->user('conta');?><br />
                                                    <b>Tipo de conta: </b> <?php echo $this->conta_model->user('tipo_conta');?><br />
                                                    <b>Titular: </b> <?php echo $this->conta_model->user('titular');?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                
                                                </div>
                                            </div>

                                        </div>
                                    
                                </div>
                              <div class="modal-footer">
                                <input type="submit" name="submit2" class="btn btn-default" value="Continuar">
                              </div>


                                <?php elseif($this->input->post('submit2') && !$this->input->post('submit')) : 

                                        $valor = $this->input->post('valor');
                                        $percentual = config_site('taxa_saque') / 100;

                                        $taxa_renovacao = $this->input->post('valor') * (0.0/100);

                                        $valor_renovacao = $valor - $taxa_renovacao; //Valor digitado - 36.7%
                                        $taxa_saque = $valor_renovacao * $percentual; //Porcentagem da taxa do saque
                                        $valor_saque = $valor_renovacao - $taxa_saque; //Valor total a ser sacado
                                    ?>

                                    <div class="list-group">

                                        <div class="list-group-item">Taxa Valor Solicitado -<strong> R$ <?php echo number_format($this->input->post('valor'), 2, ",", ".");?> Reais</strong> </div>

                                        <div class="list-group-item">Taxa de Renovação - <strong>R$ <?php echo number_format($taxa_renovacao, 2, ".", ".");?> Reais</strong> </div>
                                        
                                        <div class="list-group-item">Taxa de Saque - <strong>R$ <?php echo number_format($taxa_saque, 2, ".", ".");?> Reais</strong></div>

                                        <div class="list-group-item">Saque Total -  <?php echo '<strong>R$ '.number_format($valor_saque, 2, ",", ".").' Reais</strong>'; ?></div>
                                    </div>


                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="valor" value="<?php echo $this->input->post('valor');?>">
                                        <input type="submit" name="submit" class="btn green" value="Confirmar Saque">
                                    </div>

                                    <?php elseif(!$this->input->post('submit2') && $this->input->post('submit')):

                                    echo $message; ?>  

                                    <?php endif; ?>
                                    </form>
                                <?php  else : ?>

                                    <div class="alert alert-info text-center">As solicitações de saques estão bloqueadas no momento. Volte mais tarde.</div>
                                
                                <?php endif; ?> 
                               

                            </div>
                          </div>
                        </div>      

          
        </section><! --/wrapper -->
    
    </section><!-- /MAIN CONTENT -->





