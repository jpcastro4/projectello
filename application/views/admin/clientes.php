 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="contain-title pull-left"> Clientes </h1>
                    <a href="#" class="btn btn-theme pull-right" data-toggle="modal" data-target="#cliente">Novo cliente</a>
                </div>
                
                <div class="col-12">
                    <div class="contain-card p-4">
                        <div class="lista clearfix">
                            <?php if(!empty($clientes)):
                            foreach ($clientes as $cliente): ?>

                                <div class="lista-item mb-2">
                                    <div class="row">
                                        <div class="col-10"><div class="title"><?php echo $cliente->clienteNome ?></div></div>
                                        <div class="col-2 text-right">
                                        <a href="<?php echo base_url('admin/cliente/'.$cliente->clienteID )?>" class="btn btn-theme"><span class="fa fa-search-plus"></span></a>
                                        <a href="" class="btn btn-theme"><span class="fa fa-trash" ></span></a></div>
                                    </div>
                                </div>
                            <?php endforeach; else:?>
                                <div class="alert alert-info text-center">Não há clientes</div>
                            <?php endif; ?>
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

