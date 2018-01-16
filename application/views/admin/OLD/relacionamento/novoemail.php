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
                            <h1>Novo email
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
                            <p class="alert alert-info text-center">Por padrão todas as mensagens são programadas para envio às 4 da manhã</p>
                            <form role="form" class="form-horizontal" action="" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Assunto
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="assunto" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pra quem?
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select multiple class="form-control" name="filtro[]" required>
                                                            <option value="todos-1"> Todos</option>
                                                            <option value="ciclo-1"> Ciclo 1</option>
                                                            <option value="ciclo-2"> Ciclo 2</option>
                                                            <option value="ciclo-3"> Ciclo 3</option>
                                                            <option value="ciclo-4"> Ciclo 4</option>
                                                            <option value="block-1"> Bloqueados</option>
                                                            <option value="block-0"> Não bloqueados</option>

                                                            <?php $segmentacao = $this->admin->segmentacao(); 
                                                            if( $segmentacao != false): ?>

                                                                <option value="<?php echo $segmentacao->id; ?>"><?php echo $segmentacao->nome; ?></option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Assunto
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" id="default-editor" name="corpo"></textarea>
                                                    </div>
                                                </div>
                                                 
                                                <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit" class="btn btn-success" value="Salvar">                                                          
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
