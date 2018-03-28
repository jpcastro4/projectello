 
        
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
                      
                    </div>

                    <form method="post" >   
                    <div class="row">
                         
                        <div class="col-12  ">
                            <div class="contain-card p-4 block-md lista">
                                                             
                                <?php echo $mensagem; ?>
                                <?php echo $mensagem_erro; ?>

                                <?php if( !empty($corrige ) ):

                                //var_dump($corrige);
                                $i = 0;
                                foreach($corrige as $item ):  ?>
                                    
                                    <div class="form-group">
                                        
                                        <?php  if(! is_numeric($item->respostaR) ): $i++; ?>
                                        <small class="form-text text-muted"><strong>Coleta <?php echo $item->coletaID ?> - Coletor #<?php echo $item->coletorID ?> -  <?php echo $item->coletorID ?>.</strong></small>
                                            <?php if($item->respostaR != ""): ?>

                                                <textarea class="form-control " name="respostas[<?php echo $item->respostaRID?>]" ><?php echo $item->respostaR?></textarea>

                                            <?php else: 
                                                echo '<div class="alert alert-info text-sm-center"> O candidato fez a opção de não responder. </div>';
                                             endif;?>
                                        <?php endif;?>
                                    </div>

                                    
                                <?php  endforeach;

                                    if($i == 0 ):

                                       echo '<div class="alert alert-info text-sm-center"> Todas as respostas foram mistas, dadas em opções de escolha. </div>';
                                    endif;

                                else: ?>

                                    <div class="alert alert-info text-sm-center"> Não respostas textuais </div>

                                <?php endif;?>
                                
                            </div>
                                
                        </div>
                         
                    </div> 

                    <div class="footer-form bg-grey-md2 mt-5">
                        <a href="#" onclick="window.history.back();" class="btn btn-link "> Perguntas </a>
                        <!-- <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados" class="btn btn-theme "> Salvar </button> -->
                        <button name="form" value="true" type="submit" class="btn btn-theme "> Finalizar correções </button>                 
                    </div>
                    </form>

                </div>
            </div>
        </div>

