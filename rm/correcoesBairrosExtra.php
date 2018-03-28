 
        
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

                    <form method="post">
                    <div class="row">
                         
                        <div class="col-12  ">
                            <div class="contain-card p-4 block-md lista">
                                <?php echo $mensagem; ?>
                                <?php  echo (!empty($mensagem_erro))? '<p class="alert alert-danger w-100 text-center">'.$mensagem_erro.'</p>':''; ?>

                                <?php if( !empty($lista_bairrosExtra ) ):
                                    $i = 0; ?>                             
                                
                                <?php  foreach($lista_bairrosExtra as $key=>$bairro ): ?>
                                 
                                <div class="lista-item clearfix">
                                     
                                    <div class="row vinculo">
                                        <div class="form-group col-12 col-md-4">
                                            <input class="form-control" name="add_vinculo[<?php echo $key; ?>][bairroExtra]" readonly value="<?php echo $bairro->localTempNome; ?>"/>
                                            <input class="form-control" name="add_vinculo[<?php echo $key; ?>][zona]" type="hidden" value="<?php echo $bairro->localTempZona; ?>"/>
                                            <input class="form-control" name="add_vinculo[<?php echo $key; ?>][vinculoID]" type="hidden" value="<?php echo $bairro->vinculoID; ?>"/>
                                        </div>
                                        <div class="form-group col-12 col-md-2">
                                            <select class="form-control estadoid" name="add_vinculo[<?php echo $key; ?>][estadoID]">
                                                <option selected value="null" > - UF - </option>
                                                <?php if( !empty($lista_estados) ): ?>
                                                    <?php  foreach ($lista_estados as $estado) : ?>
                                                        <option value="<?php echo $estado->estadoID ?>" > <?php echo $estado->estadoNome ?> </option>
                                                    <?php endforeach; ?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <select class="form-control  cidadeid" name="add_vinculo[<?php echo $key; ?>][cidadeID]">
                                                <option selected value="null" > - Cidade - </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <select class="form-control  bairrocomuid" name="add_vinculo[<?php echo $key; ?>][bairroComuID]">
                                                <option selected value="null" > - Bairro/Comu/Região - </option>                                      
                                            </select>
                                        </div>
                                    </div>
                                     
                                </div>
                                 
                                <?php endforeach; ?>

                                

                                <?php else: ?>

                                    <div class="alert alert-info text-sm-center"> Não há bairros extra para vincular. </div>

                                <?php endif;?>
                            </div>
                                
                        </div>
                         
                    </div> 

                    <div class="footer-form bg-grey-md2 mt-5">
                        <?php if( !empty($lista_bairrosExtra ) ): ?>  
                            <button name="form" value="true" type="submit" class="btn btn-theme "> Processar bairros </button>
                        <?php else: ?>
                            <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar/correcoes" class="btn btn-theme "> Continuar </a>
                        <?php endif; ?>
                                   
                    </div>

                   </form>

                </div>
            </div>
        </div>

