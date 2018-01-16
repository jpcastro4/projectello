 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-6">
                    <h1 class="contain-title  "> Rastreadores </h1>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="btn btn-theme " data-toggle="modal" data-target="#pacote">Novo pacote</a>
                </div>
                
                <div class="col-12 pt-5">
                    <div class="contain-card p-4">
                        <?php if(!empty($pacotes)): ?>
                            <div class="row lista mx-0">
                            <?php foreach($pacotes as $pacote ): ?>
                                    <div class="col-12 lista-item"><a href="<?php echo site_url('admin/pacote/'.$pacote->pacoteID); ?>"> <div class="title"><?php echo $pacote->pacoteNome; ?></div></a></div>
                            <?php endforeach; ?>
                            </div>
                        <?php else: ?>

                            <p class="alert alert-info text-center"> Não há pacotes cadastrados </p>
                        <?php endif;?>     
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

