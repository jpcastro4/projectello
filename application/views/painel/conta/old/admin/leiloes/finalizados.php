<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/leiloes/andamento');?>">Leilões</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Leilões em andamento
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
                                <i class="fa fa-gavel font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Leilões em andamento</span>
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
                                     Produto
                                </th>
                                <th>
                                     Valor Final
                                </th>
                                <th>
                                     Ganhador do Leilão
                                </th>
                                <th>
                                     Finalizado em
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($leiloes !== false){
                                foreach($leiloes as $leilao){
                            ?>
                            <tr>
                                <td>
                                     #<?php echo $leilao->id;?>
                                </td>
                                <td>
                                     <?php echo $leilao->titulo;?>
                                </td>
                                <td>
                                     R$ <?php echo $this->leilao_model->UltimoLance($leilao->id);?>
                                </td>
                                <td>
                                     <?php echo $this->leilao_model->VencedorLeilao($leilao->id);?>
                                </td>
                                <td>
                                     <?php echo date('d/m/Y H:i:s', $leilao->data_fim);?>
                                </td>
                                <td>
                                     <a href="<?php echo base_url('geadmin/leiloes/visualizar/'.$leilao->id);?>">Informações</a> | <a href="<?php echo base_url('geadmin/leiloes/editar/'.$leilao->id);?>">Editar</a> | <a href="<?php echo base_url('geadmin/leiloes/excluir/'.$leilao->id);?>" onclick="if(!confirm('Você tem certeza que deseja excluir esse leilão ? Tudo dele será excluído.') return false;">Excluir</a>
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
