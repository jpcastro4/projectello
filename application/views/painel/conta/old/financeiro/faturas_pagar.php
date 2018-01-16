      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">

      <?php if($fatura->status == 0 ) :?>
        <section class="wrapper ">
            <div class="col-lg-12">
                <div class="row content-panel">
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider hidden-sm hidden-xs">
                        <h4>Comprovantes já enviados</h4>

                        <?php if($comprovantes!=false ){

                                foreach ($comprovantes as $comprovante) {
                                    
                                    echo '<a href="'. base_url() .'uploads/comprovantes/'.$comprovante->comprovante .'" target="_blank">Visualizar</a>';
                                }

                            } ?>


                        </div>
                    </div>
                    <div class="col-lg-6col-lg-offset-1">
                    <h4> Enviar comprovante </h4>

                    <form method="post" action="#" enctype="multipart/form-data" >
                      
                        <input type="hidden" name="id_fatura" value="<?php echo $fatura->id;?>" />

                            <div class="form-group">
                                
                                    <div class="col-md-4">
                                        <input type="file" name="userfile" class="default" />
                                    </div>
                            </div>

                           <div class="form-group">
                             <input type="submit" name="submit" class="btn btn-theme" value="Enviar comprovante">
                           </div>

                           <?php
                            if(isset($message)) echo $message;
                            ?>
                        
                    </form>
                    </div>

                    
                </div>
            </div>
            <div class="col-lg-6">
                
            </div>
        </section>
    <?php endif;?>
          <section class="wrapper mt">
             <div class="col-lg-12 ">
             
                <div class="row content-panel">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="invoice-body">
                            <div class="pull-left"> 
                                <h1>ELLO BETA</h1>
                                <address>
                                <!-- <strong>Rua Vergel, 1329,</strong><br>
                                Campo Grande,<br>
                                RJ<br> -->
                                <abbr title="Phone">Suporte:</abbr> (11) 9 7996-3069
                                </address>
                            </div><!-- /pull-left -->
                            
                            <div class="pull-right">
                                <h2>Fatura</h2>
                                <?php if($fatura->status == 1 ){ ?><p class="alert alert-info"> Fatura Paga</p><?php } ?>
                            </div><! --/pull-right -->
                            
                            <div class="clearfix"></div>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Afiliado: <?php echo $this->conta_model->user('nome').' '.$this->conta_model->user('sobrenome') ;?></h4>
                                    <address>
                                    <strong><?php echo $this->conta_model->user('cpf');?></strong><br>
                                    <?php foreach($bancos as $banco){ if($banco['code'] == $this->conta_model->user('banco') ){ echo $banco['name'];}} ?><br>
                                    Conta: <?php echo $this->conta_model->user('conta'); ?><br>
                                    Agência: <?php echo $this->conta_model->user('agencia'); ?><br>
                                    Tipo: <?php echo $this->conta_model->user('tipo_conta'); ?><br>
                                    Titular: <?php echo $this->conta_model->user('titular'); ?><br>
                                    <abbr title="Phone">Celular: <?php echo $this->conta_model->user('celular'); ?></abbr> 
                                    </address>
                                </div><! --/col-md-9 -->
                                <div class="col-md-5">
                                    <h4>Beneficiário: Difference Marketing e Informática Ltda</h4>
                                    <address>
                                    <strong>14.926.394/0001-18</strong><br>
                                    <?php foreach($contas as $conta):  ?><br>
                                    Banco: <?php echo $conta->banco;?><br>
                                    Conta: <?php echo $conta->conta;?><br>
                                    Agência: <?php echo $conta->agencia;?><br>
                                    Tipo: <?php echo $conta->tipo_conta;?>
                                    <?php endforeach;?>
                                    </address>
                                </div><! --/col-md-9 -->
                                <div class="col-md-3"><br>
                                    <div>
                                        <div class="pull-left"> Nº da Fatura : </div>
                                        <div class="pull-right"> <?php echo $fatura->id;?> </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="pull-left"> Data fatura : </div>
                                    <div class="pull-right"> <?php echo date('d/m/Y', strtotime($fatura->solicitada));?></div>

                                    <br>
                                    <div class="clearfix"></div>
                                    <div class="well well-small green">
                                        <div class="pull-left"> Total de Ativo(s): </div>
                                        <div class="pull-right"> <?php echo number_format($fatura->quantidade_cotas * (config_site('valor_cota')), 2); ?> </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div><!-- /col-md-3 -->


                                
                            </div><! --/row -->
                            
                            
                       
                            <table class="table">
                                <thead>
                                <tr>
                                <th style="width:60px" class="text-center">QTY</th>
                                <th class="text-left">DESCRIPTION</th>
                                <th style="width:140px" class="text-right">UNIT PRICE</th>
                                <th style="width:90px" class="text-right">TOTAL</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                        <td class="text-center">1</td>
                                        <td><?php echo $fatura->quantidade_cotas ?> ativo(s)</td>
                                        <td class="text-right"><?php echo number_format( config_site('valor_cota'), 2); ?></td>
                                        <td class="text-right"><?php echo number_format($fatura->quantidade_cotas * (config_site('valor_cota')), 2); ?></td>
                                        </tr>
                                       <!--  <tr>
                                        <td class="text-center">2</td>
                                        <td>Cupons Promocionais Adquiridos (item discriminativo, a ser deduzido do saldo de rendimento no ato do saque)</td>
                                        <td class="text-right">10.00</td>
                                        <td class="text-right"><?php echo number_format($fatura->quantidade_cotas * 10, 2); ?></td>
                                        </tr> -->
                                        <tr>
                                        <td colspan="2" rowspan="4" ><h4>Avisos:</h4>
                                            <p>Obrigado por adquirir seus ativos. Lembre-se que o pagamento deve ser realizado<br> e o comprovante deve ser enviado aqui mesmo no backoffice para o departamento financeiro execute seus ativos.</p>
                                        
                                        <td class="text-right"><strong>Subtotal</strong></td>
                                        <td class="text-right"><?php echo number_format( $fatura->quantidade_cotas * (config_site('valor_cota') )  , 2); ?></td>
                                        </tr>
                                        <!-- <tr>
                                        <td class="text-right no-border"><strong>Shipping</strong></td>
                                        <td class="text-right">$0.00</td>
                                        </tr> 
                                        <tr>
                                        <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                                        <td class="text-right">$0.00</td>
                                        </tr>-->
                                        <tr class="well well-small green">
                                        <td class="text-right no-border"><div class=""><strong>Saldo de Entrada</strong></div></td>
                                        <td class="text-right"><div class=""><strong><?php echo number_format( $fatura->quantidade_cotas * (config_site('valor_cota') )  , 2); ?></strong></div></td>
                                        </tr>
                                    </tbody>
                            </table>
                            <br>
                            <br>
                     </div><!-- /invoice-body -->
                </div><! --/col-lg-10 -->
        </div><!--/col-lg-12 mt -->
           
    </section><! --/wrapper -->
    
  </section><!-- /MAIN CONTENT -->


   