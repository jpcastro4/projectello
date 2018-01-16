 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="contain-title pull-left"> Pacote: <?php echo $pacote->pacoteNome; ?> </h1>
                    <a href="#" class="btn btn-theme pull-right" data-toggle="modal" data-target="#pacote">Novo pacote</a>
                </div>
                
                <div class="col-12">
                    <div class="contain-card p-4">
                        <form action="<?php echo base_url()?>form/pacote/<?php echo $pacote->pacoteID ?>"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Nome</div>
                                                                <input type="text" name="pacoteNome" class="form-control" value="<?php echo $pacote->pacoteNome; ?>"  />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Imagem</div>
                                                                <input type="file" name="pacoteImg" class="form-control" value="<?php echo $pacote->pacoteImg; ?>"  />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Valor do pacote (U$)</div>
                                                                <input type="number" name="pacoteValor" class="form-control" value="<?php echo $pacote->pacoteValor; ?>"  />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Pontos de ativação</div>
                                                                <input type="number" name="pacotePntsAtivacao" class="form-control" value="<?php echo $pacote->pacotePntsAtivacao; ?>"  />
                                                            </div>


                                                            
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Percentual Binario (%)</div>
                                                                <input type="number" name="pacotePercBinario" class="form-control" value="<?php echo $pacote->pacotePercBinario; ?>"  />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Teto de Pontos Binário Diário</div>
                                                                <input type="number" name="pacoteTetoBinDiario" class="form-control" value="<?php echo $pacote->pacoteTetoBinDiario; ?>"  />
                                                            </div>


                                                            <div class="form-group col-6 ">
                                                                <div class="label">Pontos Indicação ao Binario</div>
                                                                <input type="number" name="pacotePntsBinario" class="form-control" value="<?php echo $pacote->pacotePntsBinario; ?>"  />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Percentual Bonus indicação direta (%) </div>
                                                                <input type="number" name="pacotePercBonusDireta" class="form-control" value="<?php echo $pacote->pacotePercBonusDireta; ?>"  />
                                                            </div>
                                                            

                                                            <div class="form-group col-6">
                                                                <div class="label">Rendimento Diário (%)</div>
                                                                <input type="number" name="pacotePercRendDiario" class="form-control" value="<?php echo $pacote->pacotePercRendDiario; ?>"  />
                                                            </div>

                                                            <div class="form-group col-6 ">
                                                                <div class="label">Doação Mínima (BTP)</div>
                                                                <input type="number" name="pacoteMinDoacao" class="form-control" value="<?php echo $pacote->pacoteMinDoacao; ?>"  />
                                                            </div>

                                                            

                                                            <div class="form-group col-12 ">
                                                                <div class="label">Mensalidade (BTP)</div>
                                                                <input type="number" name="pacoteMensalidade" class="form-control" value="<?php echo $pacote->pacoteMensalidade; ?>"  />
                                                            </div>

                                                            <div class="form-group  col-12 text-right">
                                                                <button type="submit" class="btn btn-success" > Salvar </button>
                                                            </div>
                                                        </div>
                                                    </form>       
                    </div>
                </div>
                 
            </div>
        </div>


        <div class="modal fade" id="pacote">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center">Novo pacote</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-3">
                                        <div class="">
                                                <div class="row">
                                                    <form action="<?php echo base_url()?>form/pacote"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Nome</div>
                                                                <input type="text" name="pacoteNome" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Imagem</div>
                                                                <input type="file" name="pacoteImg" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Valor do pacote (U$)</div>
                                                                <input type="number" name="pacoteValor" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Pontos de ativação</div>
                                                                <input type="number" name="pacotePntsAtivacao" class="form-control" />
                                                            </div>


                                                            
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Percentual Binario (%)</div>
                                                                <input type="number" name="pacotePercBinario" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Teto de Pontos Binário Diário</div>
                                                                <input type="number" name="pacoteTetoBinDiario" class="form-control" />
                                                            </div>


                                                            <div class="form-group col-6 ">
                                                                <div class="label">Pontos Indicação ao Binario</div>
                                                                <input type="number" name="pacotePntsBinario" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Percentual Bonus indicação direta (%) </div>
                                                                <input type="number" name="pacotePercBonusDireta" class="form-control" />
                                                            </div>
                                                            

                                                            <div class="form-group col-6">
                                                                <div class="label">Rendimento Diário (%)</div>
                                                                <input type="number" name="pacotePercRendDiario" class="form-control" />
                                                            </div>

                                                            <div class="form-group col-6 ">
                                                                <div class="label">Doação Mínima (BTP)</div>
                                                                <input type="number" name="pacoteMinDoacao" class="form-control" />
                                                            </div>

                                                            

                                                            <div class="form-group col-12 ">
                                                                <div class="label">Mensalidade (BTP)</div>
                                                                <input type="number" name="pacoteMensalidade" class="form-control" />
                                                            </div>

                                                            <div class="form-group  col-12 text-right">
                                                                <button type="submit" class="btn btn-success" > Salvar </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                                                   
                                                </div>
                                             
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>