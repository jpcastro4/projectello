        <?php  
         switch ($questao->tipoResposta) {
            case '1':
                $tipo = 'radio';
                break;
            case '2':
                $tipo = 'checkbox';
                break;
            case '4':
                $tipo = 'radio';
                break;
            
            default:
                $tipo = '';
                break;
        }  ?>


        <div class="modal fade" id="editaquestao" tabindex="-1" role="dialog" aria-labelledby="editaquestao" aria-hidden="true">
            <div class="modal-dialog modal-md <?php //if( $tipo != ''){ echo 'modal-questao'; } ?>" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title text-center pull-left">Editando questão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <?php //var_dump($questao) ?>

                        <p class="modal-alert"></p>

                        <fieldset class="row">
                            <div class="col-12  ">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 mb-0">
                                        <label >
                                            <input type="checkbox" <?php if( $questao->questaoObrigatoria == 1 ){ echo 'checked'; } ?> value="1" class="option-input checkbox clear" name="questaoObrigatoria" id="obrigatoria" /> Questão obrigatória?
                                        </label>
                                    </div>
                                    <!-- <div class="form-group col-12 col-md-6">
                                        <label >
                                            <input type="checkbox" <?php if( $questao->questaoBase == 1 ){ echo 'checked'; } ?> value="1" class="option-input checkbox clear" name="questaoBase" id="base"/> Questão base?
                                        </label>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label >
                                            <input type="checkbox" <?php if( $questao->questaoRelatorio == 1 ){ echo 'checked'; } ?> value="1" class="option-input checkbox clear" name="questaoRelatorio" id="relatorio" /> Aparece no relatório?
                                        </label>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label >
                                            <input type="checkbox" <?php if( $questao->questaoGraficoAtivo == 1 ){ echo 'checked'; } ?> value="1" class="option-input checkbox clear" name="questaoGraficoAtivo"  id="grafico"/> Ativa gráfico?
                                        </label>
                                    </div>

                                    <div class="form-group col-12 tipoGrafico" <?php if( $questao->questaoGraficoAtivo != 1 ){ echo 'style="display: none;"'; } ?>  >
                                        <div class="label">Selecione o tipo de gráfico</div> 
                                        <select class="form-control" name="questaoTipoGrafico" <?php if( $questao->questaoGraficoAtivo == 1 ){ echo 'required'; } ?>>
                                             
                                            <option <?php if( $questao->questaoTipoGrafico == 1 ){ echo 'selected'; } ?>  value="1"> Pizza </option>
                                            <option <?php if( $questao->questaoTipoGrafico == 2 ){ echo 'selected'; } ?>  value="2"> Torre </option>
                                        </select>
                                    </div> -->

                                    <hr class="separador-grey w-100 my-3">
                                    <div class="form-group col-12">
                                        <div class="label">Tema da questão</div> 
                                        <input type="text" name="questaoTema" class="form-control clear" value="<?php echo $questao->questaoTema; ?>"  placeholder="Digite um tema para a questao" />
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="label">Enunciado da questão</div> 
                                        <input type="text" name="questaoEnunciado" class="form-control clear" value="<?php echo $questao->questaoEnunciado; ?>" placeholder="Digite o enunciado da questão" required  />
                                    </div>

                                    <hr class="separador-grey w-100 my-4"> 


                                    <div class="form-group col-12">
                                        <div class="label">Qual o tipo da questão?</div> 
                                        <label class="col-12" for="unica" >
                                            <input type="radio" <?php if( $questao->tipoResposta == 1 ){ echo 'checked'; } ?> value="1" id="unica" class="option-input radio clear" name="tipoResposta" /> Estimulada Única
                                        </label>
                                        <label class="col-12" for="multipla">
                                            <input type="radio" <?php if( $questao->tipoResposta == 2 ){ echo 'checked'; } ?> value="2" id="multipla" class="option-input radio clear"  name="tipoResposta" /> Estimulada Mútipla
                                        </label>
                                        <label class="col-12" for="espontanea" >
                                            <input type="radio" <?php if( $questao->tipoResposta == 3 ){ echo 'checked'; } ?> value="3" id="espontanea" class="option-input radio clear" name="tipoResposta" /> Espontânea
                                        </label>
                                        <label class="col-12" for="mista" >
                                            <input type="radio" <?php if( $questao->tipoResposta == 4 ){ echo 'checked'; } ?> value="4" id="mista" class="option-input radio clear" name="tipoResposta" /> Mista
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="alternativas" <?php if( $tipo == ''){ echo 'style="display:none"'; } ?> >
                                <div class="rot-alternativas p-3 form-group">
                                    <div class="label">Adicione ou edite as alternativas da questão</div>
                                    <div class="col-12 px-0 alternativas" id="insert-alt">
                                        <?php if(!empty($questao->alternativas) ):

                                            foreach ($questao->alternativas as $alternativa): ?>
                                                
                                                <label class="w-100 label-alt mx-0 p-0 mb-3"><i class="fa fa-sort py-3 pr-3 handle"></i><input type="<?php echo $tipo ?>" disabled class="option-input <?php echo $tipo ?> disabled clear"  /><input class="inside-create col-7" name="alt[<?php echo $alternativa->respostaID ?>]<?php echo ($alternativa->stack)? '[stack]':''; ?>" placeholder="Insira a alternativa" required value="<?php echo $alternativa->resposta ?>" data-idresposta="<?php echo $alternativa->respostaID ?>" /> <i class="fa fa-thumb-tack stack <?php echo ($alternativa->stack)? 'active':''; ?> "></i>  <i class="fa fa-trash lixo"></i> </label> 
                                            
                                            <?php endforeach;

                                        endif; ?>  
                                    </div>
                                </div>
                                <div class="col-12 py-2 text-right">
                                    <span class="fa fa-plus-circle button-add-alt" id="add-alt" <?php if( $questao->tipoResposta == 2 ){ echo 'data-tipo="checkbox"'; } ?> <?php if( $questao->tipoResposta == 4 OR $questao->tipoResposta == 1){ echo 'data-tipo="radio"'; } ?> ></span>
                                </div>
                            </div>

                            <input type="hidden" name="pesquisaID" value="<?php echo $questao->pesquisaID; ?>" required  />
                            <input type="hidden" name="questaoID" id="questaoid" value="<?php echo $questao->questaoID; ?>" required  />
                           
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

