

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
                        <h1>Extrato</h1>
                    </div>
                        <?php
                            $msg_temp = $this->native_session->get('msgrcs');

                            if(isset($msg_temp) && !empty($msg_temp)){

                                echo $msg_temp.'<br /><br />';

                                $this->native_session->unset_userdata('msgrcs');
                            }
                        ?>

                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                <thead>
                                <tr>
                                    <th>
                                         Número da sorte
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($bilhetes !== false){

                                    foreach($bilhetes as $bilhete){

                                    ?>
                                    <tr>
                                    <td>
                                         <?php echo $bilhete->numero_sorte;?>
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
           
        </section><! --/wrapper -->
    
    </section><!-- /MAIN CONTENT -->