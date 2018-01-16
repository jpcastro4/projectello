<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/bilhetes');?>">Bilhetes</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todas os Bilhetes
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <a href="<?php echo base_url('geadmin/bilhetes/limpar');?>" class="btn btn-success pull-right" onclick="if(!confirm('Tem certeza que deseja limpar tudo ? Se você fizer isso, todos os números serão excluídos do banco de dados para você realizar um novo sorteio.')) return false;">Limpar tudo</a>
                    <br /><br />

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Todos os bilhetes pagos
                                </span>
                            </div>
                            <div class="tools">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    Número da sorte
                                </th>
                                <th>
                                     Login
                                </th>
                                <th>
                                     Nome completo
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($bilhetes !== false){
                                foreach($bilhetes as $bilhete){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $bilhete->numero_sorte;?>
                                </td>
                                <td>
                                     <?php echo $bilhete->login;?>
                                </td>
                                <td>
                                     <?php echo $bilhete->nome;?>
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
