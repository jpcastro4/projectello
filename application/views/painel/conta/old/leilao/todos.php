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
                        <h1>Leilões em andamento</h1>
                    </div>

                     <div class="row mt">

                    <?php if($leiloes_andamento != false): ?>

                         <?php
                            foreach($leiloes_andamento['linhas']  as $leilao):
                        ?>

                   
                        <div class="col-lg-4 col-md-4 col-sm-4 mb ">
                            <div class="product-panel-2 pn-leilao pt">

                                
                                <div class="badge badge-hot" id="getting-started_<?php echo $leilao->id ?>"></div>

                                <script type="text/javascript">
                                   $("#getting-started_<?php echo $leilao->id ?>")
                                   .countdown("<?php echo date('Y/m/d H:m:i', $leilao->data_fim) ?>", function(event) {
                                     $(this).html(
                                       event.strftime('%D dias <br> %H:%M:%S')
                                     );
                                   });
                                 </script>
                                <img src="<?php echo base_url('uploads/'.$this->leilao_model->FotoPrincipal($leilao->id));?>" width="300" alt="">
                                <h5 class="mt"><?php echo $leilao->titulo;?></h5>
                                <h6>Últ. Lance: <?php echo $this->leilao_model->UltimoLancar($leilao->id);?> -  R$ <?php echo $this->leilao_model->UltimoLance($leilao->id);?></h6>
                                <a href="<?php echo base_url('leilao/visualizar/'.$leilao->id);?>"><button class="btn btn-small btn-theme04">FULL REPORT</button></a>
                            </div>
                        </div><! --/col-md-4 -->

                    <?php endforeach; endif; ?>
                        
                    </div>
                       
                    </div><! --/col-lg-10 -->
                   
                </div>
            </div><!--/col-lg-12 mt -->
           
        </section><! --/wrapper -->
    
    </section><!-- /MAIN CONTENT -->