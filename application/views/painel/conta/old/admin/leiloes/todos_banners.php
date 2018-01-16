<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos os Banners do Leilão
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Baners do Leilão</span>
                            </div>
                            <div class="tools">
                            <div class="form-actions">
                                    <a href="<?php echo base_url('geadmin/leiloes/banners/novo');?>" class="btn blue">Adicionar novo banner</a>
                                </div>
                                <br />
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Link do Banner
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($banners !== false){
                                foreach($banners as $banner){
                            ?>
                            <tr>
                                <td width="100">
                                    <img src="<?php echo base_url('uploads/'.$banner->banner);?>" border="0" class="img-responsive">
                                </td>
                                <td>
                                    <a href="<?php echo base_url('uploads/'.$banner->banner);?>" target="_blank"><?php echo base_url('uploads/'.$banner->banner);?></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('geadmin/leiloes/banners/excluir/'.$banner->id);?>">Excluir</a>
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
