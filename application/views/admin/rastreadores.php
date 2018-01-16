 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="contain-title pull-left"> Rastreadores </h1>
                    <a href="#" class="btn btn-theme pull-right" data-toggle="modal" data-target="#rastreador">Novo rastreador</a>
                </div>
                
                <div class="col-12">
                    <div class="contain-card p-4">
                        <form action="" method="post" enctype="multipart/form-data" >               
                        <div class="contain-card p-4 block-md mb-4">
                            
                            <fieldset class="form-group mb-0">
                                <div class="row">
                                    <div class="form-group col-12 mb-4">
                                        <div class="label">Nome do empreendimento </div>
                                        <input type="text" name="empNome" class="form-control"  placeholder="Nome do empreendimento" required  />
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <div class="label">Link para o site </div>
                                        <input type="text" name="empLinkSite" class="form-control"  placeholder="Link do site" />
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="label">Área (m²) </div>
                                                <input type="text" name="empArea" class="form-control" required  />
                                            </div>
                                            <div class="col-4">
                                                <div class="label">Número de quartos </div>
                                                <input type="text" name="empQuartos" class="form-control" required  />
                                            </div>
                                             <div class="col-4">
                                                <div class="label">Número de Andares </div>
                                                <input type="text" name="empAndares" class="form-control" required  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <div class="row">
                                           <input type="checkbox" name="mudaAndares" value="1" checked style="display: none; position: absolute; left: 90000"> 
                                            <div class="col-3">
                                                <div class="label">Núm. de Atpº por andar </div>
                                                <input type="text" name="empAptoAndar" class="form-control" required  />
                                            </div>
                                            <div class="col-3">
                                                <div class="label">Primeiro pavimento diferente? </div>
                                                <label class="switch">
                                                <input type="checkbox" name="empPrimeiroDif" value="1">
                                                <div class="slider round"></div>
                                            </label>
                                            </div>
                                            <div class="col-3 hidden " style="display: none">
                                                <div class="label">Começa em </div>
                                                <input type="text" name="empPrimeiroPavi" class="form-control" required  />
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group col-12 mb-0">
                                            <div class="label">Status do empreedimento</div>
                                            <label class="switch">
                                                <input type="checkbox" name="empStatus" value="1">
                                                <div class="slider round"></div>
                                            </label>
                                    </div>
                     
                                    <input type="hidden" name="form" value="dados" required  />
                                 </div>
                            </fieldset>
                        </div>
                        </form>            
                    </div>
                </div>
                 
            </div>
        </div>
       
                        <div class="modal fade" id="rastreador">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Envio de arquivos</h5>
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

