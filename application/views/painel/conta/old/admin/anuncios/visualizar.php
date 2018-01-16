<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/anuncios');?>">Anúncios</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Visualizar Anúncio
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
                               Visualizando anúncio </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet green-meadow box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Detalhes do Anúncio
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Usuário (Anunciante)
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $anuncio->login;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Título
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $anuncio->titulo;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Descrição
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $anuncio->descricao;?>
                                                            </div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Link
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $anuncio->link;?>
                                                            </div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Status
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php
                                                                echo ($anuncio->status == 1) ? 'Ativo' : 'Esperando sua aprovação';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Ação
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php
                                                               if($anuncio->status == 1){
                                                                echo '<a href="'.base_url('geadmin/anuncios/desativar/'.$anuncio->id).'">Deixar como Pendente</a> | <a href="'.base_url('geadmin/anuncios/excluir/'.$anuncio->id).'">Excluir</a>';
                                                               }else{
                                                                echo '<a href="'.base_url('geadmin/anuncios/aprovar/'.$anuncio->id).'">Aprovar</a> | <a href="'.base_url('geadmin/anuncios/excluir/'.$anuncio->id).'">Excluir</a>';
                                                               }
                                                                ?>
                                                            </div>
                                                        </div>

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