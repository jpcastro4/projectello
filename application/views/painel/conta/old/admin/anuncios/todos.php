<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/anuncios');?>">Anúncios</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos Anúncios
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Anúncios</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                     Status
                                </th>
                                <th>
                                     Usuário
                                </th>
                                <th>
                                     Título
                                </th>
                                <th>
                                     Cliques
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($anuncios!== false){
                                foreach($anuncios as $anuncio){
                            ?>
                            <tr>
                                <td>
                                     <?php echo ($anuncio->status == 1) ? 'Ativo' : 'Pendente'; ?>
                                </td>
                                <td>
                                     <?php echo $anuncio->login;?>
                                </td>
                                <td>
                                     <?php echo $anuncio->titulo;?>
                                </td>
                                <td>
                                     <?php echo $anuncio->cliques;?>
                                </td>
                                <td>
                                     <a href="<?php echo base_url('geadmin/anuncios/visualizar/'.$anuncio->id);?>">Visualizar</a>
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
