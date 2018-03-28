        <div class="col-12 col-md-3 col-lg-2 col-menu bg-grey-md2 height-100 <?php if($this->agent->is_mobile() ): echo 'collapse'; endif;?>" id="menu-secundario" >
            <div class="row head header-sec-menu align-items-center p-2 hidden-sm-down">
                <div class="title title-2 col-12"><i class="fa fa-line-chart fa-align-right"></i> <span class="pull-right"> <?php echo $pg_nivel_1 ?>  </span></div>
            </div>

            <div class="row scroll-menu">
                <div class="pb-2 pt-4 col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_todas_pesquisas) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas"><i class="fa fa-files-o"></i> Todas as pesquisas </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas_nova) ){ echo 'ativo '; } ?>"  data-toggle="modal" data-target="#nova" href="#" ><i class="fa fa-plus-circle"></i> Nova pesquisa </a></li>
                        <!-- <li><a class="<?php if( !empty($pg_coletores) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/coletores"><i class="fa fa-mobile-phone"></i> Coletores </a></li>
                        <li><a class="<?php if( !empty($pg_locais) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/locais"><i class="fa fa-street-view"></i> Locais </a></li> -->
                    </ul>
                </div>

                <?php if(!empty($pg_pesquisas_editar)  ) :?>

                <hr class="separador-grey w-100 clearfix">

                <div class="py-2 col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_etapa_1) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados"><i class="fa fa-thumb-tack"></i> Dados da pesquisa </a></li>
                        <li><a class="<?php if( !empty($pg_etapa_2) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/questoes"><i class="fa fa-thumb-tack"></i> Questões </a></li>
                        <li><a class="<?php if( !empty($pg_coletores) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores"><i class="fa fa-thumb-tack"></i> Coletores vinculados </a></li>
                        <li><a class="<?php if( !empty($pg_sincronizar) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/sincronizar"><i class="fa fa-thumb-tack"></i> Sincronizar coletores </a></li>
                    </ul>
                </div>

                <?php endif; ?>

                <?php if(!empty($pg_pesquisas_consolidacao)) :?>

                <hr class="separador-grey w-100 clearfix">

                <div class="py-2 col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_consolidar) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar"><i class="fa fa-thumb-tack"></i> Consolidar </a></li>
                        <li><a class="<?php if( !empty($pg_bairrosextra) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar/bairros-extra"><i class="fa fa-thumb-tack"></i> Bairros Extra </a></li>
                        <li><a class="<?php if( !empty($pg_correcoes) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar/correcoes"><i class="fa fa-thumb-tack"></i> Correcoes </a></li>
                    </ul>
                </div>

                <?php endif; ?>
                <?php if(!empty($pg_relatorios)) :?>

                <hr class="separador-grey w-100 clearfix">

                <div class="py-2 col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_pesquisas_relatorios_config) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/relatorio/configuracoes"><i class="fa fa-thumb-tack"></i> Configurar relatório </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas_relatorios_mapa) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/relatorio/mapa"><i class="fa fa-thumb-tack"></i> Mapa RealTime </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas_relatorios_exportar) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/relatorio/exportar"><i class="fa fa-thumb-tack"></i> Relatorio PDF </a></li>
                    </ul>
                </div>

                <?php endif; ?>
            </div>
        </div>