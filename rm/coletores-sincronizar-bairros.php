 
        
        <div class="col col-lg-8 bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down" >
                 
                    <div class="col-sm-4">
                        <!-- <a href=""> </a> -->
                    </div>
                    <div class="col-sm-4 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
                    <div class="col-sm-4 text-right">
                        
                    </div>
                 
            </div>

            <div class="row py-4 max-height80 ">

                <div class="contain-container ">

                    <div class="row py-4">
                        <div class="col-12 col-md-9">
                                <h1 class="contain-title"> <?php echo $pesquisa->pesquisaNome ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="contain-card lista p-4 block-md">

                            <?php echo $mensagem; ?>
                            <?php echo $mensagem_erro; ?>

                            <?php if( !empty($temp_coletas ) ):

                                foreach($temp_coletas as $coletor ):

                                    $bairrosExtra = (array) json_decode(unserialize( $coletor->coletasExtra ) )  ;

                                    //var_dump($bairrosExtra);

                                    foreach ($bairrosExtra as $local ) : ?>

                                        <div class="lista-item clearfix" >
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="title">
                                                        <?php echo $local->localBairroComu; ?>
                                                    </div>
                                                </div>
                                                    
                                                <div class="col-12 col-md-3">
                                                    <div class="title">
                                                         
                                                    </div> 
                                                </div>

                                               
                                            </div>
                                        </div>
                                        
                                    <?php endforeach;?>                                

                            <?php endforeach;

                            else: ?>

                                <div class="alert alert-info text-sm-center"> Não há coletores vinculados </div>

                            <?php endif;?>
                            </div>
                             
                        </div>

                    </div>


                </div>
            </div>
            
            <div class="footer-form bg-grey-md2 mt-5">
                <a href="<?php echo base_url('dashboard/pesquisas') ?>" class="btn btn-link "> Sair </a>
                <!-- <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados" class="btn btn-theme "> Salvar </button> -->
                <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores/sincronizar/bairros-extra" class="btn btn-theme "> Continuar </a>                 
            </div>

        </div>



