<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/tickets');?>">Tickets</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos os tickets
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
                                <span class="caption-subject font-green-sharp bold uppercase">Todos os tickets</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                     Assunto
                                </th>
                                <th>
                                     Aberto em
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
                            if($tickets !== false){
                                foreach($tickets as $ticket){
                            ?>
                            <tr>
                                <td>
                                    #<?php echo $ticket->id;?>
                                </td>
                                <td>
                                    <?php echo $ticket->login;?>
                                </td>
                                <td>
                                     <?php echo $ticket->titulo;?>
                                </td>

                                <td>
                                     <?php echo date('d/m/Y', strtotime($ticket->data));?>
                                </td>

                                <td>
                                    <?php
                                    echo StatusUserAdmin($ticket->status);
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('backoffice/geadmin/tickets/visualizar/'.$ticket->id);?>">Visualizar</a>
                                    <?php
                                    if($ticket->status != 2){
                                    ?>
                                    |
                                     <a href="<?php echo base_url('backoffice/geadmin/tickets/fechar/'.$ticket->id);?>" onclick="if(!confirm('Tem certeza que deseja fechar esse ticket ?')) return false;">Fechar Ticket</a>

                                    <?php }elseif($ticket->status == 2){ ?>
                                    | <a href="<?php echo base_url('backoffice/geadmin/tickets/reabrir/'.$ticket->id);?>">Re-abrir Ticket</a>
                                    <?php } ?>
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
