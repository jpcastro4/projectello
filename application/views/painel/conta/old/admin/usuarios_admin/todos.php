<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/users');?>">Usuários administrativos</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos usuários administrativos
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
                                <span class="caption-subject font-green-sharp bold uppercase">Todos os usuários administrativos</span>
                            </div>
                            <div class="tools">
                            <div class="form-actions">
                                    <a href="<?php echo base_url('backoffice/geadmin/users/novo');?>" class="btn blue">Adicionar novo usuário</a>
                                </div>
                                <br />
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($usuarios !== false){
                                foreach($usuarios as $usuario){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $usuario->nome;?>
                                </td>
                                <td>
                                    <?php echo $usuario->login;?>
                                </td>
                                <td>

                                    <a href="<?php echo base_url('backoffice/geadmin/users/editar/'.$usuario->id);?>">Editar</a>
                                    |
                                     <a href="<?php echo base_url('backoffice/geadmin/users/excluir/'.$usuario->id);?>">Excluir</a>

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
