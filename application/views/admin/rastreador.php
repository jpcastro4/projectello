 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-6">
                    <h1 class="contain-title  "> Rastreadores </h1>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="btn btn-theme " data-toggle="modal" data-target="#rastreador">Novo rastreador</a>
                    <a href="#" class="btn btn-theme  " data-toggle="modal" data-target="#versao">Nova versão</a>
                </div>
                
                <div class="col-12 pt-5">
                    <div class="contain-card p-4">
                        <form action="<?php echo base_url('form/rastreador') ?>" method="post"  >               
                        <div class=" ">
                            
                            <fieldset class="form-group mb-0">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <div class="label">Fabricante </div>
                                        <input type="text" name="rastreadorFabricante" class="form-control"  value="<?php echo $rastreador->rastreadorFabricante;?>" required  />
                                    </div>

                                    <div class="form-group col-12 col-md-6 mb-4">
                                        <div class="label">Modelo</div>
                                        <input type="text" name="rastreadorModelo" class="form-control"  value="<?php echo $rastreador->rastreadorModelo;?>" required  />
                                    </div>
                                    <input type="hidden" name="rastreadorID" value="<?php echo $rastreador->rastreadorID;?>">
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
                        <h1 class="contain-title  ">Versões </h1>
                    </div>
                    <div class="contain-card mt-3 p-4">
                                  
                        <div class="row px-4">
                            <div class="col-12 lista ">
                                <?php if(!empty($versoes)): 
                                    foreach ($versoes as $versao) : ?>

                                    <div class="lista-item">
                                        <div class="row">
                                            <div class="col-10"><div class="title">Protocolo <?php echo $versao->rastreadorProtocolo ?> - Versão <?php echo $versao->rastreadorVersao ?> - Firmware <?php echo $versao->rastreadorFw ?> </div></div>
                                            <div class="col-2 text-right"><span class="fa fa-trash fa-1x"></span></div>
                                        </div>
                                    </div>
                                        
                                <?php endforeach; endif;?>
                            </div>
                        </div>
                              
                    </div>


                </div>
                 
            </div>
        </div>
       
                        <div class="modal fade" id="rastreador">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Novo rastreador</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-3">
                                        <div class="">
                                                <div class="row">
                                                    <form action="<?php echo base_url()?>form/rastreador"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Fabricante</div>
                                                                <input type="text" name="rastreadorFabricante" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Modelo</div>
                                                                <input type="text" name="rastreadorModelo" class="form-control" />
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

                         <div class="modal fade" id="versao">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Nova versão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-3">
                                        <div class="">
                                                <div class="row">
                                                    <form action="<?php echo base_url()?>form/versao"  method="post" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Protocolo</div>
                                                                <input type="text" name="rastreadorProtocolo" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Versão</div>
                                                                <input type="text" name="rastreadorVersao" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Firmware</div>
                                                                <input type="text" name="rastreadorFw" class="form-control" />
                                                            </div>
                                                            <input type="hidden" name="rastreadorID" value="<?php echo $rastreador->rastreadorID;?>">
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

