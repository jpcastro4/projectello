 
        
        <div class="col bg-grey-md1 h-100 height-100">
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
                        <div class="col-12 col-md-3 text-right">
                            <a href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores/novo" class="btn btn-theme  "> Novo coletor </a>
                        </div>
                    </div>


                    <div class="row">
                         
                        <div class="col-12  ">
                            <div class="contain-card p-4 block-md lista">
                                <?php echo $mensagem; ?>
                                <?php echo $mensagem_erro; ?>

                                <?php if( !empty($coletores_vinculados ) ):

                                

                                    foreach($coletores_vinculados as $coletor ): 
                                        
                                    ?>
                                    
                                    <div class="lista-item clearfix w-100">
                                        
                                        <div class="row">
                                           
                                            <div class="col-12 col-md-7">
                                               <a href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID ?>/coletores/edita/<?php echo $coletor->coletorID ?>" > <div class="title"> <?php echo $coletor->coletorNome ?> - <?php echo $coletor->coletorDados ?>  </div></a>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div class="title">
                                                    <?php 

                                                    $numColetas = $this->dashboard_model->totalColetas($coletor->vinculoID)[0]->numMinColetas; ?>

                                                    <?php echo $numColetas.pluraltext(" coleta", " coletas", $numColetas) ?>
                                                </div> 
                                            </div>
                                            


                                            <div class="col-12 col-md-2 text-right"> 
                                                <div class="btn-group" role="group">
                                                    <a id="btnGroupDropSave" href="" class="btn btn-contain btn-theme dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Escolha </a>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDropSave">
                                                        <a class="dropdown-item" href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID ?>/coletores/edita/<?php echo $coletor->coletorID ?>">Editar </a>
                                                        <a class="dropdown-item excluircoletor" href="#" data-excluir="<?php echo $coletor->vinculoID ?>" data-pesquisaid="<?php echo $pesquisa->pesquisaID ?>">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    

                                <?php endforeach;

                                else: ?>

                                    <div class="alert alert-info text-sm-center"> Não há coletores vinculados </div>

                                <?php endif;?>
                            </div>
                                
                        </div>
                         
                    </div> 
                </div>
            </div>
        </div>

