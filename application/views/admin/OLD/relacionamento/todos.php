<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('boadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('boadmin/usuarios');?>">Usuários</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos usuários
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar E-mails</span>
                            </div>

                            <div class="tools">
                                    <div class="btn-group">
                                                    <a class="btn green btn-outline btn-circle" href="<?php echo base_url('boadmin/emails/novo');?>" >
                                                        <i class="fa fa-share"></i>
                                                        <span class="hidden-xs"> Novo </span>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                    </div>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <table class="table table-bordered " id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                         Data
                                    </th>
                                    <th>
                                         Assunto
                                    </th>
                                    <th>
                                         Log
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php


                            if($this->admin->emails() != false){

                                foreach($this->admin->emails() as $email){
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                     #<?php echo $email->id;?>
                                </td>
                                <td>
                                     <?php echo $email->date;?>
                                </td>
                                <td>
                                     <?php echo $email->assunto;?>
                                </td>
                                <td>
                                       <?php echo $email->log;?>
                                </td>
                                <td>
                                     <?php if($email->status == 0){echo '<span class="label label-sm label-danger"> Aguardando </span>';}else{ echo '<span class="label label-sm label-success"> Enviado </span>';}?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                       <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i>
                                       </button>
                                       
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a target="_blank" href="<?php echo base_url('boadmin/emails/visualizar/'.$email->id);?>"><i class="icon-docs"></i> Visualizar</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('boadmin/emails/editar/'.$email->id);?>"><i class="icon-tag"></i> Editar </a>
                                            </li>
                                        </ul>
                                    </div>
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
