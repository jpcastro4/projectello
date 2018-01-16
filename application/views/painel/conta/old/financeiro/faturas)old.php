      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Faturas</h3>
                <div class="row mb ml">
                
                   <!-- page start-->
                  <div class="content-panel">

                        <div class="adv-table">

                        <?php
                            $msg_temp = $this->native_session->get('msgrcs');

                            if(isset($msg_temp) && !empty($msg_temp)){

                                echo $msg_temp.'<br /><br />';

                                $this->native_session->unset_userdata('msgrcs');
                            }
                            ?>

                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        ID da Fatura
                                    </th>
                                    <th>
                                        Data da Fatura
                                    </th>
                                    <th>
                                         Quantidade
                                    </th>
                                    <th>
                                        Descrição
                                    </th>
                                    <th>
                                         Valor total
                                    </th>
                                    <th width="20%">
                                         Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($faturas != false){
                                    foreach($faturas as $fatura){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $fatura->id;?>
                                    </td>
                                    <td>
                                         <?php echo $fatura->data_fatura;?>
                                    </td>
                                    <td>
                                         <?php echo $fatura->quantidade_cotas;?> cota(s)
                                    </td>
                                    <td>
                                        <?php echo ($fatura->renovacao == 0) ? 'Fatura de pagamento' : '<b><font color="red">FATURA DE RENOVAÇÃO</font></b>'; ?>
                                    </td>
                                    <td>
                                        R$ <?php echo number_format(config_site('valor_cota') * $fatura->quantidade_cotas, 2);?> Reais
                                    </td>
                                    <td>
                                         <a href="<?php echo base_url('faturas/pagar/'.$fatura->id);?>" class="btn green">Pagar</a> <a href="<?php echo base_url('faturas/cancelar/'.$fatura->id);?>" class="btn red">Cancelar</a>
                                    </td>
                                </tr>

                                <?php
                                    }
                                }
                                ?>

                                </tbody>
                                </table>
                                
                        </div>
                  </div>
              <!-- page end-->

                
              </div><!-- /row -->

        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

