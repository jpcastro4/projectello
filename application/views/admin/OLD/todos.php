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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar usuários</span>
                            </div>
                            <div class="tools">
                                    <div class="btn-group">
                                                    <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fa fa-share"></i>
                                                        <span class="hidden-xs"> Filtros </span>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right" id="datatable_ajax_tools">
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setBlocks');?>" data-action="0" class="tool-action">
                                                                <i class="icon-check"></i> Bloqueados</a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setCiclo/1');?>" data-action="1" class="tool-action">
                                                                <i class="icon-check"></i> Ciclo 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setCiclo/2');?>" data-action="2" class="tool-action">
                                                                <i class="icon-check"></i> Ciclo 2</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setCiclo/3');?>" data-action="3" class="tool-action">
                                                                <i class="icon-check"></i> Ciclo 3</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setCiclo/4');?>" data-action="4" class="tool-action">
                                                                <i class="icon-check"></i> Ciclo 4</a>
                                                        </li>
                                                         <li class="divider"> </li>
                                                        <li>
                                                            <a href="<?php echo base_url('boadmin/setTodos');?>" data-action="4" class="tool-action">
                                                                <i class="icon-check"></i> Todos</a>
                                                        </li>
                                                    </ul>
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
                                         Nome
                                    </th>
                                    <th>
                                         Login
                                    </th>
                                    <th>
                                         Email
                                    </th>
                                    <th>
                                         Ciclo
                                    </th>
                                    <th>
                                         Cronometro
                                    </th>
                                    <th>
                                         Bloqueado ?
                                    </th>
                                    <th>
                                         Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $blocks = $this->native_session->get_flashdata('blocks');
                            $ciclo = $this->native_session->get_flashdata('ciclo');


                            if($this->admin->Usuarios() != false){
                                foreach($this->admin->Usuarios($blocks, $ciclo) as $usuario){
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                     #<?php echo $usuario->id;?>
                                </td>
                                <td>
                                     <?php echo $usuario->nome;?> <?php echo $usuario->sobrenome;?>
                                </td>
                                <td>
                                     <?php echo $usuario->login;?>
                                </td>
                                <td>
                                     <?php echo $usuario->email;?>
                                </td>
                                <td>
                                     <?php echo $usuario->ciclo;?>
                                </td>
                                <td>
                                        <?php

                                            // $dataFinal = strtotime($usuario->cronometro)+86400;
                                            // $data = date('Y-m-d H:i:s',$dataFinal);
                                        $data = date('Y-m-d H:i:s',strtotime($usuario->cronometro) );
                                        ?>
                                        <div data-countdown=" <?php echo $data; ?>"></div>
                                </td>
                                <td>
                                     <?php if($usuario->block == 1){echo '<span class="label label-sm label-danger"> Sim </span>';}else{ echo '<span class="label label-sm label-success"> Não </span>';}?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                       <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i>
                                       </button>
                                       
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo base_url('boadmin/usuario/'.$usuario->id);?>"><i class="icon-docs"></i> Visualizar</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('boadmin/usuario/editar/'.$usuario->id);?>"><i class="icon-tag"></i> Editar </a>
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
