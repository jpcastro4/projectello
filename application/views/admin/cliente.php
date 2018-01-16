 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-6">
                    <h1 class="contain-title  "> Cliente </h1>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="btn btn-theme " data-toggle="modal" data-target="#cliente">Novo cliente</a>
                    <a href="#" class="btn btn-theme  " data-toggle="modal" data-target="#veiculo">Novo veiculo</a>
                </div>
                
                <div class="col-12 pt-5">
                    <div class="contain-card p-4">

                        <?php //var_dump($this->admin->select_rastreadores() ); ?>


                        <form action="<?php echo base_url('form/rastreador') ?>" method="post"  >               
                        <div class=" ">
                            
                            <fieldset class="form-group mb-0">
                                <div class="row">
                                    <div class="form-group col-6 ">
                                        <div class="label">CPF</div>
                                        <input type="text" name="clienteCpf" class="form-control" required value="<?php echo $cliente->clienteCpf ?>" />
                                    </div>
                                    <div class="form-group col-6 ">
                                        <div class="label">Data de anivesario</div>
                                        <input type="date" name="clienteAniver" class="form-control" required value="<?php echo $cliente->clienteAniver ?>" />
                                    </div>
                                    <div class="form-group col-12 ">
                                        <div class="label">Nome</div>
                                        <input type="text" name="clienteNome" class="form-control" required value="<?php echo $cliente->clienteNome ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">Telefone</div>
                                        <input type="text" name="clienteTelefone" class="form-control" value="<?php echo $cliente->clienteTelefone ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">Celular</div>
                                        <input type="text" name="clienteCelular" class="form-control" required value="<?php echo $cliente->clienteCelular ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">Email</div>
                                        <input type="text" name="clienteEmail" class="form-control" required value="<?php echo $cliente->clienteEmail ?>" />
                                    </div>
                                    <div class="form-group col-6 ">
                                        <div class="label">Rua</div>
                                        <input type="text" name="clienteRua" class="form-control" required value="<?php echo $cliente->clienteRua ?>" />
                                    </div>
                                    <div class="form-group col-6 ">
                                        <div class="label">Complemento</div>
                                        <input type="text" name="clienteEndComp" class="form-control" value="<?php echo $cliente->clienteEndComp ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">Bairro</div>
                                        <input type="text" name="clienteBairro" class="form-control" required value="<?php echo $cliente->clienteBairro ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">Cidade</div>
                                        <input type="text" name="clienteCidade" class="form-control" required value="<?php echo $cliente->clienteCidade ?>" />
                                    </div>
                                    <div class="form-group col-4 ">
                                        <div class="label">CEP</div>
                                        <input type="text" name="clienteCep" class="form-control" required value="<?php echo $cliente->clienteCep ?>" />
                                    </div>



                                    <input type="hidden" name="clienteID" value="<?php echo $cliente->clienteID;?>">
                                    <input type="hidden" name="edita" value="true">
                     
                                    <div class="form-group  col-12 text-right">
                                        <button type="submit" class="btn btn-success" > Salvar </button>
                                    </div>
                                 </div>
                            </fieldset>
                        </div>
                        </form>            
                    </div>
                    <div class="w-100 mt-5">
                        <h1 class="contain-title">Veículos do cliente </h1>
                    </div>
                    <div class="contain-card mt-3 p-4">
                                  
                        <div class="row">
                            <div class="col-12 lista ">
                                <?php if(!empty($veiculos)): 
                                    foreach ($veiculos as $veiculo) : ?>

                                    <div class="lista-item mb-2">
                                        <div class="row">
                                            <div class="col-10"><div class="title"><?php echo $veiculo->veiculoModelo ?> - <?php echo $veiculo->veiculoPlaca ?></div></div>
                                            <div class="col-2 text-right">
                                            <a href="#" data-open-painel="veiculo-<?php echo $veiculo->veiculoID ?>" class="btn btn-theme"><span class="fa fa-search-plus"></span></a>
                                            <a href="#" data-open-painel="produto-<?php echo $veiculo->veiculoID ?>"class="btn btn-theme"><span class="fa fa-th-list" ></span></a> 
                                            <a href="" class="btn btn-theme excluir" data-exluir-veiculo="<?php echo $veiculo->veiculoID ?>"><span class="fa fa-trash" ></span></a></div>
                                        </div>
                                    </div>
                                    <div class="lista-item-painel mb-3 relative" data-painel="veiculo-<?php echo $veiculo->veiculoID ?>" >
                                        <span class="fa fa-close fa-2x fechar" data-open-painel="veiculo-<?php echo $veiculo->veiculoID ?>"></span>
                                        <form action="<?php echo base_url('form/veiculo') ?>" method="post" >
                                        <div class="row" >
                                        
                                            <div class="form-group col-4 ">
                                                <div class="label">Fabricante</div>
                                                <input type="text" name="veiculoFabricante" class="form-control" required value="<?php echo $veiculo->veiculoFabricante ?>" />
                                            </div>
                                            <div class="form-group col-4 ">
                                                <div class="label">Modelo</div>
                                                <input type="text" name="veiculoModelo" class="form-control" required value="<?php echo $veiculo->veiculoModelo ?>" />
                                            </div>
                                            <div class="form-group col-3 ">
                                                <div class="label">Placa</div>
                                                <input type="text" name="veiculoPlaca" class="form-control" required value="<?php echo $veiculo->veiculoPlaca ?>" />
                                            </div>
                                            <div class="form-group col-3 ">
                                                <div class="label">Adesão</div>
                                                <input type="date" name="veiculoAdesao" class="form-control" required value="<?php echo $veiculo->veiculoAdesao ?>" />
                                            </div>
                                            <div class="form-group col-4 ">
                                                <div class="label">Instalação</div>
                                                <input type="date" name="veiculoInstalacao" class="form-control" value="<?php echo $veiculo->veiculoInstalacao ?>"  />
                                            </div>
                                            <div class="form-group col-4 ">
                                                <div class="label">Ativação</div>
                                                <input type="date" name="veiculoAtivacao" class="form-control"  value="<?php echo $veiculo->veiculoAtivacao ?>"/>
                                            </div>
                                            <div class="form-group col-4 ">
                                                <div class="label">Versão Rastreador</div>
                                                <select name="rastreadorVrsID" class="form-control" >
                                                    <option value="" disabled selected >Selecione</option>
                                                    <?php                                                  
                                                    foreach ($this->admin->select_rastreadores()  as $rastreador) :?>
                                                    <option value="<?php echo $rastreador->rastreadorVersID ?>" <?php echo ( $veiculo->rastreadorVrsID == $rastreador->rastreadorVersID )? 'selected':'' ; ?> >
                                                    <?php echo  $rastreador->rastreadorFabricante ?>-<?php echo  $rastreador->rastreadorModelo ?> <?php echo $rastreador->rastreadorVersao ?>/<?php echo  $rastreador->rastreadorProtocolo ?>/<?php echo $rastreador->rastreadorFw ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                             
                                            <div class="form-group col-4 ">
                                                <div class="label">Modo de pagamento</div>
                                                
                                                <select name="veiculoTipoPgto" class="form-control" >
                                                    <?php foreach($this->admin->select_tipo_pagamento()  as $tipo) : ?>
                                                    
                                                    <option value="<?php echo $tipo->pagamentoTipoID ?>" <?php echo ( $veiculo->veiculoTipoPgto == $tipo->pagamentoTipoID )? 'selected':'' ; ?>  > <?php echo $tipo->pagamentoTipoNome  ?> </option> 

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-12 mb-0">
                                                <div class="label">Status do veículo</div>
                                                <label> 
                                                    <input type="radio" name="veiculoStatus" class="option-input radio" value="0" <?php echo ( $veiculo->veiculoStatus == 0 )? 'checked':'' ; ?>/> Inativo
                                                </label>

                                                <label> 
                                                    <input type="radio" name="veiculoStatus" class="option-input radio" value="1" <?php echo ( $veiculo->veiculoStatus == 1 )? 'checked':'' ; ?>/> Aguardando
                                                </label>

                                                <label> 
                                                    <input type="radio" name="veiculoStatus" class="option-input radio" value="2" <?php echo ( $veiculo->veiculoStatus == 2 )? 'checked':'' ; ?>/> Ativo
                                                </label>

                                                <label> 
                                                    <input type="radio" name="veiculoStatus" class="option-input radio" value="3" <?php echo ( $veiculo->veiculoStatus == 3 )? 'checked':'' ; ?>/> Suspenso
                                                </label>
                                            </div>
                                            
                                            <input type="hidden" name="edita" value="true">
                                            <input type="hidden" name="clienteID" value="<?php echo $cliente->clienteID;?>">
                                            <input type="hidden" name="veiculoID" value="<?php echo $veiculo->veiculoID;?>">

                                            <div class="form-group  col-12 text-right">
                                                <button type="submit" class="btn btn-success" > Salvar </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>


                                    <div class="lista-item-painel mb-3 relative" data-painel="produto-<?php echo $veiculo->veiculoID ?>">
                                        <span class="fa fa-close fa-2x fechar" data-open-painel="produto-<?php echo $veiculo->veiculoID ?>"></span>
                                        <h5 class="mb-4">Produtos contratados</h5>
                                        <?php $produtos = $this->admin->produtos_veiculo($veiculo->veiculoID);
                                        if(!empty($produtos) ): 
                                        foreach($produtos as $produto): ?>
                                            <div class="lista-item mb-2"> <div class="title"><?php echo $produto->produtoNome ?> - <?php echo $produto->produtoValor ?></div> </div>
                                        <?php endforeach; else:?>
                                            <div class="alert alert-info text-center"> Não há produtos contratados</div>
                                        <?php endif; ?>
                                        <div class="w-100 text-center my-3"><a href="#" data-toggle="modal" data-target="#add-produto" data-veiculo="<?php echo $veiculo->veiculoID ?>"><span class="fa fa-plus-circle fa-3x"></span><h6>Adicionar produto</h6></a></div>
                                    </div> 
                                        
                                <?php endforeach; else:?>
                                    <div class="alert alert-info text-center">Não há veículos</div>
                                <?php endif;?>
                            </div>
                        </div>
                              
                    </div>

                </div>
                 
            </div>
        </div>
       
            <div class="modal fade" id="cliente">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <form action="<?php echo base_url()?>form/cliente"  method="post" enctype="multipart/form-data" >
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Novo cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" >
                                <div class="form-group col-6 ">
                                    <div class="label">CPF</div>
                                    <input type="text" name="clienteCpf" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Data de anivesario</div>
                                    <input type="date" name="clienteAniver" class="form-control" required />
                                </div>
                                <div class="form-group col-12 ">
                                    <div class="label">Nome</div>
                                    <input type="text" name="clienteNome" class="form-control" required />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">Telefone</div>
                                    <input type="text" name="clienteTelefone" class="form-control" />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">Celular</div>
                                    <input type="text" name="clienteCelular" class="form-control" required />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">Email</div>
                                    <input type="text" name="clienteEmail" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Rua</div>
                                    <input type="text" name="clienteRua" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Complemento</div>
                                    <input type="text" name="clienteEndComp" class="form-control" />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">Bairro</div>
                                    <input type="text" name="clienteBairro" class="form-control" required />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">Cidade</div>
                                    <input type="text" name="clienteCidade" class="form-control" required />
                                </div>
                                <div class="form-group col-4 ">
                                    <div class="label">CEP</div>
                                    <input type="text" name="clienteCep" class="form-control" required />
                                </div>
                             </div>
                        </div>
                        <div class="modal-footer text-right">
                            <button type="submit" class="btn btn-success" > Salvar </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="veiculo">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <form action="<?php echo base_url()?>form/veiculo"  method="post" enctype="multipart/form-data" >
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Novo veiculo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" >
                                <div class="form-group col-6 ">
                                    <div class="label">Fabricante</div>
                                    <input type="text" name="veiculoFabricante" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Modelo</div>
                                    <input type="text" name="veiculoModelo" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Placa</div>
                                    <input type="text" name="veiculoPlaca" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Adesão</div>
                                    <input type="date" name="veiculoAdesao" class="form-control" required />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Instalação</div>
                                    <input type="date" name="veiculoInstalacao" class="form-control"   />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Ativação</div>
                                    <input type="date" name="veiculoAtivacao" class="form-control" />
                                </div>
                                <div class="form-group col-6 ">
                                    <div class="label">Versão Rastreador</div>
                                    <select name="rastreadorVrsID" class="form-control" >
                                        <option value="" disabled selected >Selecione</option>
                                        <?php                                                  
                                        foreach ($this->admin->select_rastreadores()  as $rastreador) {
                                            echo '<option value="'.$rastreador->rastreadorVersID.'" >'. $rastreador->rastreadorFabricante.'-'. $rastreador->rastreadorModelo.' '.$rastreador->rastreadorVersao.'/'. $rastreador->rastreadorProtocolo.'/'. $rastreador->rastreadorFw.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                 
                                <div class="form-group col-6 ">
                                    <div class="label">Modo de pagamento</div>
                                    
                                    <select name="veiculoTipoPgto" class="form-control" >
                                        <option value="" disabled selected >Selecione</option>
                                        <?php                                                  
                                        foreach ($this->admin->select_tipo_pagamento()  as $tipo) {
                                            echo '<option value="'.$tipo->pagamentoTipoID.'" >'. $tipo->pagamentoTipoNome.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <div class="label">Status do veículo</div>
                                    <label> 
                                        <input type="radio" name="veiculoStatus" class="option-input radio" value="0"  /> Inativo
                                    </label>

                                    <label> 
                                        <input type="radio" name="veiculoStatus" class="option-input radio" value="1"  /> Aguardando
                                    </label>

                                    <label> 
                                        <input type="radio" name="veiculoStatus" class="option-input radio" value="2"  /> Ativo
                                    </label>

                                    <label> 
                                        <input type="radio" name="veiculoStatus" class="option-input radio" value="3"  /> Suspenso
                                    </label>
                                </div>

                                <div class="form-group col-12 ">
                                    <div class="label">Produtos</div>

                                    <?php foreach ($this->admin->listaProdutos()  as $produto) :?>
                                        <label class="w-100"> 
                                            <input type="checkbox" name="produtos[]" class="option-input checkbox" value="<?php echo $produto->produtoID ?>"  /> <?php echo $produto->produtoNome ?> 
                                        </label>
                                    <?php endforeach; ?>
                                                                     
                                </div>
                                <input type="hidden" name="clienteID" value="<?php echo $cliente->clienteID;?>">
                             </div>
                        </div>
                        <div class="modal-footer text-right">
                            <button type="submit" class="btn btn-success" > Salvar </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-produto">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <form action="<?php echo base_url()?>form/add_produto"  method="post"  >
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Novo produto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" >
                                <div class="form-group col-12 ">
                                    <div class="label">Adiciona produto</div>
                                    <select name="produtoID" class="form-control" >
                                        <option value="" disabled selected >Selecione</option>
                                        <?php                                                  
                                        foreach ($this->admin->listaProdutos()  as $produto) {
                                            echo '<option value="'.$produto->produtoID.'" >'. $produto->produtoNome.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="clienteID" value="<?php echo $cliente->clienteID ?>" >
                                <input type="hidden" name="veiculoID" >
                             </div>
                        </div>
                        <div class="modal-footer text-right">
                            <button type="submit" class="btn btn-success" > Salvar </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>