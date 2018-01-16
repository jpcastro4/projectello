<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    Visualizar Leilão
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->

            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-pencil font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">
                                    Visualizar Informações do Leilão</span>
                                </div>
                            </div>

                            <?php if(isset($message)) echo $message; ?>

                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_produto" data-toggle="tab">
                                            Produto </a>
                                        </li>
                                        <li>
                                            <a href="#tab_lances" data-toggle="tab">
                                            Últimos Lances </a>
                                        </li>
                                        <li>
                                            <a href="#tab_info" data-toggle="tab">
                                            Informações do Leilão
                                             </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_produto" style="font-size:16px;">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Produto
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php echo $produto->titulo;?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor Original
                                                    </label>
                                                    <div class="col-md-10">
                                                        R$ <?php echo number_format($produto->valor_original, 2, ".", ".");?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Lances do Rôbo até
                                                    </label>
                                                    <div class="col-md-10">
                                                        R$ <?php echo number_format($produto->lance_robo, 2, ".", ".");?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Detalhes
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php echo $produto->detalhes;?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_lances" style="font-size:16px;">
                                            <div class="form-body">

                                                <?php
                                                if($lances != false){
                                                    foreach($lances as $lance){
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><?php echo $this->admin->NomeUsuario($lance->id_usuario, $lance->robo);?>
                                                    </label>
                                                    <div class="col-md-10">
                                                        R$ <?php echo number_format($lance->valor_lance, 2, ".", ".");?>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                            }else{
                                                echo '<b>Nenhum lance foi dado no momento!</b>';
                                            }
                                            ?>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_info" style="font-size:16px;">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Data de inicio
                                                    </label>
                                                    <div class="col-md-10">
                                                    <?php
                                                    echo date('d/m/Y H:i', $produto->data_inicio);
                                                    ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Data Final
                                                    </label>
                                                    <div class="col-md-10">
                                                    <?php
                                                    echo date('d/m/Y H:i', $produto->data_fim);
                                                    ?>
                                                        </div>
                                                </div>

                                               <div class="form-group">
                                                    <label class="col-md-2 control-label">Status
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php
                                                        if($produto->status == 2){

                                                            echo '<b>Finalizado</b>';

                                                        }elseif($produto->status == 1 && time() < $produto->data_inicio){

                                                            echo '<b>Aguardando o começo</b>';

                                                        }else{
                                                            echo '<b>Iniciado!</b>';
                                                        }
                                                        ?>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Total de Lances
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php
                                                      echo  $this->admin->TotalDeLances($produto->id);
                                                        ?>
                                                    </div>
                                                </div>

                                                <?php
                                                if($produto->status == 2){
                                                ?>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ganhador
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php
                                                       echo $this->admin->GanhadorLeilao($produto->id);
                                                        ?>
                                                    </div>
                                                </div>

                                                <?php
                                                }
                                                ?>



                                                </div>
                                            </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>