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
                            <h1>Novo afiliado
                                <small>em massa para grupo segmentado</small>
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
                                <a href="<?php echo base_url('boadmin');?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Administração</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="clearfix"><?php if(isset($mensagem)) echo $mensagem;  ?></div>
                            
                            <form role="form" class="form-horizontal" action="" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nome
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" readonly class="form-control" name="nome" value="<?php if(!empty($afiliadoEditar->nome) ) echo $afiliadoEditar->nome; ?>">
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control" name="email" value="<?php if(!empty($afiliadoEditar->email) ) echo $afiliadoEditar->email; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Telefone
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="tel" class="form-control" name="telefone" value="<?php if(!empty($afiliadoEditar->telefone) ) echo $afiliadoEditar->telefone; ?>">
                                                    </div>
                                                </div>

                                               

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Senha
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="senha" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Contas
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="contas" value="<?php if(!empty($afiliadoEditar->contas) ) echo $afiliadoEditar->contas; ?>">
                                                    </div>
                                                </div>
                                                 
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">
                                                    </label>
                                                    <div class="col-md-10">
                                                        <button class="btn btn-success btn-large " type="submit" value="submit" name="submit">Salvar</button>
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
