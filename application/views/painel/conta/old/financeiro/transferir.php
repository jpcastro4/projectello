
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Transferir Saldo</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-dollar"></i>
                            <a href="#">Financeiro</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('transferir');?>">Transferir Saldo</a>
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
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-money"></i>Transfira saldo para um membro
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->
                            <?php
                            if(config_site('permitir_transferencia_membros') == 1){
                            ?>

                            <?php
                            if(isset($message)) echo $message;
                            ?>

                            <?php
                            if(config_site('valor_minimo_transferencia') > 0){

                                echo '<p class="text-center">O valor mínimo para cada transferência é de <b>R$ '.config_site('valor_minimo_transferencia').' Reais</b>.</p>';
                            }
                            ?>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Login do usuário</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="login" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Valor a ser transferido</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="valor" placeholder="exemplo: 230.00" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Transferir Saldo">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->

                                <?php
                                }else{
                                ?>
                                <div class="alert alert-info text-center">O módulo de transferência entre contas não está disponível no momento. Tente novamente mais tarde.</div>
                                <?php
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
