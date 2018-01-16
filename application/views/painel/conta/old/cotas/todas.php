<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="col-lg-12 mt">

                <div class="row content-panel">
                    <div class="col-lg-12 ">
                    <div class="chat-room-head">
                        <h1>ATIVOS</h1>
                    </div>
                        <?php
                            $msg_temp = $this->native_session->get('msgrcs');

                            if(isset($msg_temp) && !empty($msg_temp)){

                                echo $msg_temp.'<br /><br />';

                                $this->native_session->unset_userdata('msgrcs');
                            }
                        ?>
                            <?php
                                if($cotas !== false){ ?>

                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                <thead>
                                <tr>
                                    <th>
                                         ID
                                    </th>
                                    <th>
                                         Qtd. Ativos
                                    </th>
                                    <th>
                                         Fim do ciclo
                                    </th>
                                <!--    <th>
                                        Valor Recebido
                                    </th>
                                    <th>
                                        Rendimento total
                                    </th> -->
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Vinculo
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                

                                <?php  foreach($cotas as $cota){

                                    ?>
                                    <tr>
                                    <td>
                                         #<?php echo $cota->ID;?>
                                    </td>
                                    <td>
                                         <?php echo $cota->quantidade;?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', $cota->ultimo_recebimento);?>
                                    </td>
                                <!--    <td>
                                        <?php //$valor_pago = $cota->valor_pago;?>
                                         R$ <?php //echo number_format($valor_pago, 2, ".", "."); ?>
                                    </td>
                                    <td>
                                        <?php
                                        //$percentual = 55 / 100;
                                        //$valor_a_receber = ( config_site('valor_cota') * $cota->quantidade ) * $percentual * 3;
                                       // echo 'R$ '. number_format(($valor_a_receber), 2, ".", ".");
                                        ?>
                                    </td> -->
                                    <td>
                                         <?php echo ($cota->status == 1) ? '<span class="label label-success" >Ativo</span>' : 'Finalizado'; ?> 
                                    </td>
                                    <td >
                                        <?php if( /* date("d") >= '26' && date("d") <= '28' && */ $cota->estagio == 'X' ) : ?>

                                            <a href="<?php echo base_url('ativos/vincular/'.$cota->ID ); ?> " onclick="if(!confirm('Você está vinculando seu investimento ao processo de indicação. Tem certeza?.')) return false;" class="btn btn-primary btn-sm" > Vincular indicação </a>  


                                            

                                       <?php else: ?>

                                            <span class="label label-success">Ativo vinculado</span>

                                       <?php endif; ?>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                                </table>
                                <?php }else{ ?>

                                    <div class="alert alert-warning text-center mt"> Você não tem ativos em rendimento. <a href="<?php echo base_url();?>ativos/comprar">Clique aqui para adquirir.</a></div>
                               <?php  }
                                ?>
                        
                    </div><! --/col-lg-10 -->
                   
                </div>
            </div><!--/col-lg-12 mt -->
           
        </section><! --/wrapper -->

       
    
    </section><!-- /MAIN CONTENT -->








