    <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Configurações
                                <small>dados e conteúdos administrativos</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->            
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('boadmin/setBlocks');?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Administração</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <form role="form" class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                    <label class="col-md-2 control-label">Nome dos site
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nome_site" value="<?php echo $config->nome_site;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo tela de login <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_login">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Backoffice <br /><small>(94x14)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_backoffice">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Admin <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_admin">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Favicon <br /><small>(16x16)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="favicon">
                                                    </div>
                                                </div>  
                                                <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit" class="btn btn-success" value="Atualizar site">                                                          
                                                        </div>
                                                    </div>        
                                                    
                                                </form>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
