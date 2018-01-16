<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/faturas');?>">Faturas</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todas Faturas
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar faturas</span>
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
                                     Usuário
                                </th>
                                <th>
                                     Qtd. Cotas
                                </th>
                                <th>
                                     Fatura de Renovação
                                </th>
                                <th>
                                     Comprovante
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
                            if($faturas!== false){
                                foreach($faturas as $fatura){
                            ?>
                            <tr>
                                <td>
                                    #<?php echo $fatura->id;?>
                                </td>
                                <td>
                                     <?php echo $fatura->nome;?>
                                </td>
                                <td>
                                     <?php echo $fatura->quantidade;?>
                                </td>
                                <td>
                                     <?php echo $fatura->renovacao;?>
                                </td>
                                <td>
                                     <?php echo $fatura->comprovante_text; ?>
                                </td>
                                <td>
                                     <?php echo $fatura->status; ?>
                                </td>
                                <td>
                                    <?php
                                    if($fatura->status_number == 0){
                                    ?>
                                     <a href="<?php echo base_url('backoffice/geadmin/faturas/liberar/'.$fatura->id);?>" onclick="if(!confirm('Tem certeza que deseja liberar ? Se você permitir, as cotas referentes a essa fatura serão ativas.')) return false;">Liberar Fatura</a>
                                    <?php } ?>

                                    <?php if($fatura->comprovante_text == 'Enviado' && $fatura->status_number == 0) echo ' | '; ?>

                                    <?php if($fatura->comprovante_text == 'Enviado'){ ?>

                                    <a href="<?php echo base_url('uploads/'.$fatura->link_comprovante);?>" target="_blank">Comprovante</a>
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
