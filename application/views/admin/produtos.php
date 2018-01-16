 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="contain-title pull-left"> Produtos </h1>
                    <a href="#" class="btn btn-theme pull-right" data-toggle="modal" data-target="#produto">Novo produto</a>
                </div>
                
                <div class="col-12">
                    <div class="contain-card p-4">
                        <div class="lista clearfix">
                            <?php if(!empty($produtos)):
                            foreach ($produtos as $produto): ?>

                                <div class="lista-item mb-2">
                                    <div class="row">
                                        <div class="col-10"><div class="title"><?php echo $produto->produtoNome ?></div></div>
                                        <div class="col-2 text-right">
                                        <a href="<?php echo base_url('admin/produto/'.$produto->produtoID )?>" class="btn btn-theme"><span class="fa fa-search-plus"></span></a>
                                        <a href="" class="btn btn-theme"><span class="fa fa-trash" ></span></a></div>
                                    </div>
                                </div>
                            <?php endforeach; else:?>
                                <div class="alert alert-info text-center">Não há produtos</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
       
                        <div class="modal fade" id="produto">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <form action="<?php echo base_url()?>form/produto"  method="post" enctype="multipart/form-data" >
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Novo produto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Nome</div>
                                                                <input type="text" name="produtoNome" class="form-control" required />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Descrição</div>
                                                                <input type="text" name="produtoDescricao" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Valor</div>
                                                                <input type="text" name="produtoValor" class="form-control" required />
                                                            </div>
                                                            <div class="form-group col-12 mb-0">
                                                                <div class="label">Status</div>
                                                                <label class="switch">
                                                                <input type="checkbox" name="produtoStatus" value="1" >
                                                                    <div class="slider round"></div>
                                                                </label>
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

