<div class="modal fade" id="novaquestao" tabindex="-1" role="dialog" aria-labelledby="novoEstado" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title text-center pull-left">Nova questão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-alert"> </p>
                            <fieldset class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 mb-0 ">
                                            <label >
                                                <input type="checkbox" value="1" class="option-input checkbox clear" name="questaoObrigatoria" id="obrigatoria" /> Questão obrigatória?
                                            </label>
                                        </div>
                                        <!-- <div class="form-group col-12 col-md-6">
                                            <label >
                                                <input type="checkbox" value="1" class="option-input checkbox clear" name="questaoBase" id="base"/> Questão base?
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label >
                                                <input type="checkbox" value="1" class="option-input checkbox clear" name="questaoRelatorio" id="relatorio" /> Aparece no relatório?
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label >
                                                <input type="checkbox" value="1" class="option-input checkbox clear" name="questaoGraficoAtivo"  id="grafico"/> Ativa gráfico?
                                            </label>
                                        </div>

                                        <div class="form-group col-12 tipoGrafico" style="display: none;" >
                                            <div class="label">Selecione o tipo de gráfico</div> 
                                            <select class="form-control" name="questaoTipoGrafico" required >
                                                <option value="1"> Pizza </option>
                                                <option value="2"> Torre </option>
                                            </select>
                                        </div> -->

                                        <hr class="separador-grey w-100 my-3">

                                        <div class="form-group col-12">
                                            <div class="label">Tema da questão</div> 
                                            <input type="text" name="questaoTema" class="form-control clear"  placeholder="Digite um tema para a questao" />
                                        </div>

                                        <div class="form-group col-12">
                                        <div class="label">Enunciado da questão?</div> 
                                            <input type="text" name="questaoEnunciado" class="form-control clear"  placeholder="Digite o enunciado da questão" required  />
                                        </div>
                                            
                                        <div class="form-group col-12 py-3">
                                            <div class="label">Qual o tipo da questão?</div> 
                                            <label class="col-12" for="unica" >
                                                <input type="radio" value="1" id="unica" class="option-input radio clear" name="tipoResposta" /> Estimulada Única
                                            </label>
                                            <label class="col-12" for="multipla" >
                                                <input type="radio" value="2" id="multipla" class="option-input radio clear"  name="tipoResposta" /> Estimulada Mútipla
                                            </label>
                                            <label class="col-12" for="espontanea" >
                                                <input type="radio" value="3" id="espontanea" class="option-input radio clear" name="tipoResposta" /> Espontânea
                                            </label>
                                             <label class="col-12" for="mista" >
                                                <input type="radio" value="4" id="mista" class="option-input radio clear" name="tipoResposta" /> Mista
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" id="alternativas" style="display: none">
                                    <div class="rot-alternativas col-12">
                                    <div class="label">Adicione as alternativas da questão</div>
                                        <div class="col-12 alternativas" id="insert-alt"></div>
                                    </div>
                                    <div class="col-12 p-3 text-right">
                                        <span class="btn btn-link" id="add-alt">Adicione alternativa</span>
                                    </div>
                                </div>

                                <input type="hidden" name="pesquisaID" value="<?php echo $pesquisaID ?>" required  />
                                <input type="hidden" name="form" value="dados" required  />
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