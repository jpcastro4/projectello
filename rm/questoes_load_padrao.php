    <div class="modal fade" id="questoespadrao" tabindex="-1" role="dialog" aria-labelledby="novoEstado" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title text-xs-center pull-left">Questoes padrão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-alert"> As questões serão clonadas para a pesquisa e não tem vinculo com as configurações</p>
                            <fieldset class="form-group">                                
                            <div class="form-group col-xs-12 lista">

                                <?php if( !empty($lista_questoes ) ):
                                    foreach($lista_questoes as $questao ): ?>
                                    <div class="lista-item clearfix">
                                        <div class="row">
                                            <div class="col-2"> <input type="checkbox" value="<?php echo $questao->questaoID ?>" id="padrao" class="option-input checkbox clear" name="questao_padrao[]" /> </div>
                                            <div class="col-10"> <div class="title  pt-2"> <?php echo $questao->questaoEnunciado ?> </div></div>
                                        </div>
                                    </div>

                                <?php endforeach;

                                else: ?>

                                    <div class="alert alert-info text-sm-center"> Não questões cadastradas para a pesquisa </div>

                                <?php endif;?>


                                 
                            </div>
                            <input type="hidden" name="pesquisaID" value="<?php echo $pesquisaID ?>" required  />
                            </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnsalvar" class="btn btn-theme">Salvar</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>