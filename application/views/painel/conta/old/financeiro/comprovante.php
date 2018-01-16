
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Enviar Comprovante</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-dollar"></i>
                            <a href="#">Financeiro</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('comprovante');?>">Enviar comprovante</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet form">


                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-money"></i>Envio do comprovante de pagamento
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->

                            <?php
                            if(isset($message)) echo $message;
                            ?>

                            <?php
                            if($faturas !== false){
                            ?>
                                <p class="text-center">Faça o envio do comprovante de uma de suas faturas em aberto. Caso o pagamento de uma de suas faturas já estiverem confirmadas, então ela não será listada abaixo.</p>
                                <p class="text-center">Você também pode fazer o re-envio de um comprovante quando quiser, basta selecionar a fatura e enviar o comprovante em anexo.</p>

                                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Referente a Fatura</label>
                                            <div class="col-md-6">
                                                <select name="id_fatura" class="form-control" required>
                                                    <?php
                                                    foreach($faturas as $fatura){
                                                    ?>
                                                    <option value="<?php echo $fatura->id;?>">Fatura #<?php echo $fatura->id;?> - Compra de <?php echo $fatura->quantidade_cotas;?> cotas por R$ <?php echo number_format($fatura->quantidade_cotas * config_site('valor_cota'), 2);?> Reais</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Comprovante</label>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control" name="userfile" required value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Enviar comprovante">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->

                                <?php
                                }else{
                                    echo '<div class="alert alert-info text-center">Você não tem nenhuma fatura em aberto.</div>';
                                }

                                ?>


                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>


                </div>
                 <!-- PORTLET LIGHT -->


                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!--Cooming Soon...-->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
