<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/bancario');?>">Contas Bancárias</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todoas contas bancárias
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar contas bancárias para depósito</span>
                            </div>
                            <div class="tools">
                            <div class="form-actions">
                                    <a href="<?php echo base_url('backoffice/geadmin/bancario/nova');?>" class="btn blue">Adicionar nova conta</a>
                                </div>
                                <br />
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    Banco
                                </th>
                                <th>
                                    Agência
                                </th>
                                <th>
                                     Conta
                                </th>
                                <th>
                                     Tipo de conta
                                </th>
                                <th>
                                    Titular
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($contas !== false){
                                foreach($contas as $conta){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $conta->banco;?>
                                </td>
                                <td>
                                    <?php echo $conta->agencia;?>
                                </td>
                                <td>
                                     <?php echo $conta->conta;?>
                                </td>

                                <td>
                                     <?php echo $conta->tipo_conta;?>
                                </td>

                                <td>
                                    <?php echo $conta->titular;?>
                                </td>
                                <td>

                                    <a href="<?php echo base_url('backoffice/geadmin/bancario/editar/'.$conta->id);?>">Editar</a>
                                    |
                                    <a href="<?php echo base_url('backoffice/geadmin/bancario/excluir/'.$conta->id);?>">Excluir</a>


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
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
