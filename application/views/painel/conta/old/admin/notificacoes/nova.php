<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/notificacoes');?>">Notificações</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Nova notificação
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
                                <i class="fa fa-exclamation font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                Adicionar nova notificação </span>
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

                                                    <p>Preencha o campo abaixo e clique em <b>Enviar</b>, após isso a mensagem abaixo entrará nas notificações de todos os usuários cadastrados no sistema. <b>Use poucas palavras</b>.</p>

                                                        <div class="form-group">
                                                            <label>Notificação</label>
                                                            <textarea class="form-control" rows="3" name="notificacao"></textarea>
                                                        </div>

                                                        <div class="form-actions">
                                                        <input type="submit" name="submit" class="btn blue" value="Enviar">
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