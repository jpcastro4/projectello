 
        
        <div class="col  bg-grey-md1 h-100 height-100">
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
                         
                        <div class="col-12  ">
                            <div class="contain-card p-4 block-md lista">
                                <?php echo $mensagem; ?>
                                <?php echo $mensagem_erro; ?>

                                <?php if( !empty($correcoes ) ):

                                //var_dump($correcoes);

                                    foreach($correcoes as $questao ): 
                                        //var_dump( $this->dashboard_model->totalColetas($questao->vinculoID) );
                                    ?>
                                <a href="<?php echo base_url('dashboard/pesquisas/p/'.$pesquisa->pesquisaID.'/corrige/'.$questao->questaoID)?>">
                                    <div class="lista-item clearfix">
                                        <div class="row">
                                            <div class="col-12 col-md-7">
                                                <div class="title">  <?php echo $questao->questaoEnunciado; ?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php endforeach;

                                else: ?>

                                    <div class="alert alert-info text-sm-center"> Não respostas textuais </div>

                                <?php endif;?>
                            </div>
                                
                        </div>
                         
                    </div> 
                </div>
            </div>
        </div>

