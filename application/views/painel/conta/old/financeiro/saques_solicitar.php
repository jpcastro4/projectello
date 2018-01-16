
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Solicitar Saque</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-dollar"></i>
                            <a href="#">Financeiro</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('saque');?>">Solicitar Saque</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-light green-soft" href="#">
                        <div class="visual">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 R$ <?php echo $this->conta_model->user('saldo_disponivel');?>
                            </div>
                            <div class="desc">
                                 Disponível para saque
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-light blue-soft" href="#">
                        <div class="visual">
                            <i class="fa fa-send"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 R$ <?php echo $this->conta_model->ValoresPagos();?>
                            </div>
                            <div class="desc">
                                 Enviados para sua conta bancária
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="portlet form">


                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-money"></i>Solicitação de um novo saque
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->

                                <?php
                                if(config_site('saque_disponivel') != 1){

                                ?>
                                <p class="">Lembrando que o valor mínimo permitido para saque é de <b>R$ <?php echo config_site('valor_minimo_saque');?> Reais</b></p>
                                <p class="">Após ser solicitado o saque, o valor informado será retirado do seu <b>Saldo Disponível</b> e será colocado no <b>Saldo Bloqueado</b> até que o sistema faça o pagamento do seu pedido. Para que possamos fazer seu saque com maior agilidade e rapidez, sempre deixe os dados bancários atualizados.</p>

                                <div class="alert alert-info text-center">Para efetuar um saque você pagará uma taxa de <b><?php echo config_site('taxa_saque');?>%</b> que será acrescentado no valor do saque.</div>

                                <?php
                                if(!$this->input->post('submit2') && !$this->input->post('submit')){
                                ?>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Valor a ser sacado</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="valor" required>
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
                                            <input type="submit" name="submit2" class="btn green" value="Continuar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }elseif($this->input->post('submit2') && !$this->input->post('submit')){
                                ?>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">

                                         <div class="form-group">
                                            <label class="control-label col-md-3">Valor Pedido</label>
                                            <div class="col-md-6">
                                               <strong> R$ <?php echo number_format($this->input->post('valor'), 2, ",", ".");?> Reais</strong>
                                            </div>
                                        </div>

                                        <?php

                                        $valor = $this->input->post('valor');
                                        $percentual = config_site('taxa_saque') / 100;

                                        $taxa_renovacao = $this->input->post('valor') * (0.0/100);

                                        $valor_renovacao = $valor - $taxa_renovacao; //Valor digitado - 36.7%
                                        $taxa_saque = $valor_renovacao * $percentual; //Porcentagem da taxa do saque
                                        $valor_saque = $valor_renovacao - $taxa_saque; //Valor total a ser sacado
                                        ?>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Taxa para Renovação</label>
                                            <div class="col-md-6">
                                                <strong>R$ <?php echo number_format($taxa_renovacao, 2, ".", ".");?> Reais</strong>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Taxa do Saque</label>
                                            <div class="col-md-6">
                                                <strong>R$ <?php echo number_format($taxa_saque, 2, ".", ".");?> Reais</strong>
                                            </div>
                                        </div>

                                        <input type="hidden" name="valor" value="<?php echo $this->input->post('valor');?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Valor total a ser sacado</label>
                                            <div class="col-md-6">
                                                <?php
                                                echo '<strong>R$ '.number_format($valor_saque, 2, ",", ".").' Reais</strong>';
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Solicitar Saque">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }elseif(!$this->input->post('submit2') && $this->input->post('submit')){
                                    echo $message;
                                }
                               ?>
                                <!-- END FORM-->

                                <?php

                                }else{

                                    echo '<div class="alert alert-info text-center">As solicitações de saques estão bloqueadas no momento. Volte mais tarde.</div>';
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
