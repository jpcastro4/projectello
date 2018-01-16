
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Meu Anúncio</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="<?php echo base_url('anuncio');?>">Meu Anúncio</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet form">


                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bullhorn"></i>Meu Anúncio
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->
                            <?php
                            if(config_site('permitir_cadastro_anuncio') == 1){
                            ?>

                            <?php
                            if($anuncio !== false){
                            ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat dashboard-stat-light blue-soft" href="<?php echo base_url('extrato');?>">
                                        <div class="visual">
                                            <i class="fa fa-line-chart"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                 <?php echo ($anuncio->status == 0) ? 'Pendente' : 'Ativo';?>
                                            </div>
                                            <div class="desc">
                                                Status do anúncio
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat dashboard-stat-light red-soft" href="<?php echo base_url('extrato');?>">
                                        <div class="visual">
                                            <i class="fa fa-location-arrow"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                 <?php echo $anuncio->cliques;?>
                                            </div>
                                            <div class="desc">
                                                 Cliques
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    </div>

                                <?php
                                }
                                ?>

                                <br />

                                <?php
                                if(isset($message)) echo $message;
                                ?>

                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Título do Anúncio</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="titulo" value="<?php echo ($anuncio !== false) ? $anuncio->titulo : '';?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Descrição do Anúncio</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="descricao" required><?php echo ($anuncio !== false) ? $anuncio->descricao : '';?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Link de redirecionamento</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="link" value="<?php echo ($anuncio !== false) ? $anuncio->link : '';?>" required>
                                            </div>
                                        </div>

                                        <?php
                                        if($this->conta_model->CotasAtivas() > 0){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="<?php echo ($anuncio !== false) ? 'Editar' : 'Cadastrar';?> Anúncio">
                                            </div>
                                        </div>
                                        <?php
                                        }else{
                                            echo '<div class="alert alert-info text-center">Para poder adicionar ou editar um anúncio, pelo menos 1 cota deve estar ativa.</div>';
                                        }
                                        ?>
                                    </div>
                                </form>
                                <!-- END FORM-->

                                <?php
                                }else{
                                ?>
                                <div class="alert alert-info text-center">O módulo de anúncio não está disponível no momento. Tente novamente mais tarde.</div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>


                </div>
                 <!-- PORTLET LIGHT -->


                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!--Cooming Soon...-->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
