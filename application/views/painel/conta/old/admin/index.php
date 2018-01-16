
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Página inicial <small>estatísticas</small></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Dashboard
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row margin-top-10">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject theme-font bold uppercase">Estatísticas Gerais</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row list-separated">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="font-grey-mint font-sm">
                                         Membros
                                    </div>
                                    <div class="uppercase font-hg font-red-flamingo">
                                         <?php echo $this->admin->TotalUsuarios();?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="font-grey-mint font-sm">
                                         Cotas ativas
                                    </div>
                                    <div class="uppercase font-hg theme-font">
                                        <?php echo $this->admin->CotasAtivas();?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="font-grey-mint font-sm">
                                         Recebimentos
                                    </div>
                                    <div class="uppercase font-hg font-purple">
                                         R$ <?php echo $this->admin->Recebimentos();?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="font-grey-mint font-sm">
                                         Saques pendentes
                                    </div>
                                    <div class="uppercase font-hg font-blue-sharp">
                                         <?php echo $this->admin->SaquesPendentes();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>

            <!-- CUSTOM -->
            <div class="row margin-top-10">

                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject theme-font bold uppercase">Atividades de membros (Aleatoriamente)</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row number-stats margin-bottom-30">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="stat-left">
                                        <div class="stat-chart">
                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                            <div id="sparkline_bar"></div>
                                        </div>
                                        <div class="stat-number">
                                            <div class="title">
                                                 Total de membros
                                            </div>
                                            <div class="number">
                                                 <?php echo $this->admin->TotalUsuarios();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="stat-right">
                                        <div class="stat-chart">
                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                            <div id="sparkline_bar2"></div>
                                        </div>
                                        <div class="stat-number">
                                            <div class="title">
                                                 Novos membros
                                            </div>
                                            <div class="number">
                                                 <?php echo $this->admin->UltimosUsuarios();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $atividades = $this->admin->AtividadesMembros();
                            ?>
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                <thead>
                                <tr class="uppercase">
                                    <th colspan="1">
                                         Nome
                                    </th>
                                    <th>
                                         Saldo em conta
                                    </th>
                                    <th>
                                         Cotas ativas
                                    </th>
                                    <th>
                                         Faturas no B.O
                                    </th>
                                    <th>
                                         Membro desde
                                    </th>
                                </tr>
                                </thead>
                                <?php
                                if($atividades !== false){

                                    foreach($atividades as $atividade){
                                ?>
                                <tr>
                                    <td>
                                        <a href="javascript:;" class="primary-link"><?php echo $atividade->nome;?></a>
                                    </td>
                                    <td>
                                         R$ <?php echo number_format($atividade->saldo_disponivel, 2, ",", ".");?>
                                    </td>
                                    <td>
                                         <?php echo $atividade->quantidade_cotas;?>
                                    </td>
                                    <td>
                                         <?php echo $atividade->quantidade_faturas;?>
                                    </td>
                                    <td>
                                        <span class="bold theme-font"><?php echo date('d/m/Y', strtotime($atividade->data_cadastro));?></span>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
            <!-- END CUSTOM -->


            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
