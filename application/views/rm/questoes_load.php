                
                    <div class="col-12 ">
                        <div class="contain-card p-4 block-md lista">
                        
                        <?php if( !empty($lista_questoes ) ):
                            foreach($lista_questoes as $questao ): ?>
                            <div class="lista-item clearfix" data-idquestao=" <?php echo $questao->questaoID ?>">
                                <div class="row">
                                    <div class="col-1"> <i class="fa fa-sort p-2 handle"></i> </div>
                                    <div class="col-9 col-md-10">
                                        <div class="title editaquestao" data-idquestao="<?php echo $questao->questaoID ?>"> <?php echo $questao->questaoEnunciado ?> </div>
                                    </div>
                                    <!-- <hr class="hidden-md-up py-3"> -->
                                    <div class="col-1 text-right">
                                        <div class="btn-group" role="group">
                                                <a id="btnGroupDropSave" href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-wrench "></i></a>
                                                <div class="dropdown-menu pull-left" aria-labelledby="btnGroupDropSave">
                                                    <button class="dropdown-item editaquestao" data-idquestao="<?php echo $questao->questaoID ?>">Editar</button>
                                                    <button class="dropdown-item excluiquestao" data-idquestao="<?php echo $questao->questaoID ?>" data-pesquisaid="<?php echo $pesquisaID ?>">Excluir</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;

                        else: ?>

                            <div class="alert alert-info text-sm-center"> Não questões cadastradas para a pesquisa </div>

                        <?php endif;?>


                        </div>
                        
                        <div class="result"></div>

                    </div>
                    

                