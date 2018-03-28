 
        
        <div class="col bg-grey-md1 relative height-100">
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

                            <?php  
                                $ifExtra = false;
                                if( !empty( $temp_coletas ) ):                              

                                foreach($temp_coletas as $coleta ): 

                                    

                                    $numColetas = $this->dashboard_model->totalColetas($coleta->vinculoID)[0]->numMinColetas; 

                                    $coletas = unserialize( $coleta->coletas );
                                    $numColetasFeitas = count( $coletas );
                                    
                                    $coletasExtra = unserialize($coleta->coletasExtra);
                                    $numColetasExtra = count( $coletasExtra );

                                    if($numColetasExtra > 0 ){
                                        $ifExtra = true;
                                    }

                                    //dump($coleta);
                                    // dump($coletas);
                                    // dump($coletasExtra);

                                    
                            ?>

                                <div class="lista-item clearfix" style="background: linear-gradient(to right, #4ACC99 0%, #4ACC99 <?php echo  number_format(  ( $numColetasFeitas * 100 ) / $numColetas )   ?>%, #4ACC99 <?php echo  number_format(  ( $numColetasFeitas * 100 ) / $numColetas - 100)   ?>%, #e5e5e5 <?php echo  number_format(  ( $numColetasFeitas * 100 ) / $numColetas -100 )   ?>%, #e5e5e5 100%);">
                                    <div class="row">
                                        <div class="col-12 col-md-9">
                                            <div class="title"> <?php echo $coleta->coletorNome ?> - <?php echo $coleta->coletorDados ?></div>
                                        </div>
                                            
                                        <div class="col-12 col-md-3">
                                            <div class="title">
                                                <?php echo count( unserialize( $coleta->coletas ) ) ?> de  <?php echo $numColetas.pluraltext(" coleta", " coletas", $numColetas) ?> ( <?php echo  number_format(  ( $numColetasFeitas * 100 ) / $numColetas )   ?>% )
                                            </div> 
                                        </div>

                                    </div>
                                </div>
 
                            <?php endforeach;

                            else: ?>

                                <div class="alert alert-info text-sm-center"> Aguardando sincronia de dados </div>

                            <?php endif;?>
                            </div>
                             
                        </div>

                    </div>


                </div>
            </div>
            
            <?php if( !empty( $temp_coletas ) ):    ?>
            <div class="footer-form bg-grey-md2 mt-5">
                <a href="<?php echo base_url('dashboard/pesquisas') ?>" class="btn btn-link "> Sair </a>
                <!-- <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados" class="btn btn-theme "> Salvar </button> -->
                 
                <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar" class="btn btn-theme "> Continuar </a>                 

                 
            </div>

            <?php endif; ?>

        </div>



