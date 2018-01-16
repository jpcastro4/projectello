<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/bancario');?>">Contas Bancárias</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Adicionar nova conta
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
                                <i class="fa fa-bank font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                Adicionar nova conta para depósito </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">


                                    <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN SAMPLE FORM PORTLET-->
                                        <div class="portlet light">
                                            <div class="portlet-body form">
                                                <form action="" method="post">
                                                    <div class="form-body">

                                                    <?php if(isset($message)) echo $message; ?>


                                                        <div class="form-group">
                                                            <label>Banco</label>
                                                            <input type="text" name="banco" class="form-control" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Agência</label>
                                                            <input type="text" name="agencia" class="form-control" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Conta</label>
                                                            <input type="text" name="conta" class="form-control">
                                                        </div

                                                        <div class="form-group">
                                                            <label>Tipo de conta</label>
                                                            <input type="text" name="tipo_conta" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Titular</label>
                                                            <input type="text" name="titular" class="form-control">
                                                        </div

                                                        <div class="form-actions">
                                                        <input type="submit" name="submit" class="btn blue" value="Adicionar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- END SAMPLE FORM PORTLET-->


                                        <!-- END SAMPLE FORM PORTLET-->
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