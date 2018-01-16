

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="col-lg-12 mt">

            <div class="mt">
                        
                    <!--    <h1> <?php date_default_timezone_set('America/Sao_Paulo'); echo 'Agora: '. time() .' - Amanha: '. (time()+(60*60*24)) .' - 15 dias atras: '. ((60*60*24*15)-time()) .' - Ontem: '. ((60*60*24*1)-time())   ; ?> </h1>

                       <h2><?php  $this->load->helper('valor_helper'); echo randomWithDecimal(13.33, 13.33, 2); ?></h2> -->
                       
                    </div>

                <div class="row content-panel">
                    <div class="col-lg-12 ">


                    <div class="chat-room-head">
                        <h1>Extrato</h1>
                    </div>
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
                                        ID
                                    </th>
                                    <th>
                                         Data
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th>
                                         Descrição
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if($extrato_registros != false){

                                    foreach($extrato_registros as $extrato){
                                ?>
                                <tr>
                                    <td>#<?php echo (strlen($extrato->id) == 1) ? "0".$extrato->id : $extrato->id;?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($extrato->data));?></td>
                                    <td><font color="<?php echo $extrato->cor;?>"><?php echo $extrato->valor;?></font></td>
                                    <td><?php echo $extrato->descricao;?></td>
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
           
        </section><! --/wrapper -->
    
    </section><!-- /MAIN CONTENT -->