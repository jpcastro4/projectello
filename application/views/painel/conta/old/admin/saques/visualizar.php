<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/saques');?>">Saques</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Visualizar Saque
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-money font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                #<?php echo $saque->id;?> - Pedido de saque </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-lg">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab">
                                        Detalhes do saque </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet yellow-crusta box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Detalhes do usuário
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Nome
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->nome;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Email
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->email;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 CPF
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $saque->cpf;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Login
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->login;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet blue-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados bancários
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Banco
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo BancoPorID($saque->banco);?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Agência
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->agencia;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Conta
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->conta;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Tipo de conta
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->tipo_conta;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Titular
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $saque->titular;?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet green-meadow box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Detalhes do saque
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Data do Pedido
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo date('d/m/Y', strtotime($saque->data_pedido));?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Valor
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                R$ <?php echo number_format($saque->valor, 2, ",", ".");?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if($saque->status == 0){
                                                        ?>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Qual ação ?
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <a href="<?php echo base_url('backoffice/geadmin/saques/pago/'.$saque->id);?>">Marcar como pago</a> | <a href="<?php echo base_url('backoffice/geadmin/saques/estornar/'.$saque->id);?>">Estornar</a>
                                                            </div>
                                                        </div>
                                                        <?php }else{ ?>
                                                        <div class="pull-right">
                                                            <?php
                                                            if($saque->status == 1){
                                                                echo '<font color="green"><b>Pagamento já feito</b></font>';
                                                            }else{
                                                                echo '<font color="red"><b>Valor Estornado</b></font>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>