 
        
        <div class="container relative mb-5">

            <div class="row mb-5">
                <div class="col-12 py-5">
                    <h1 class="contain-title"> <?php echo $emp->empNome; ?>  </h1>
                </div>
                
                <div class="col-12 col-md-8">
                    <form action="" method="post" enctype="multipart/form-data" >
                                              
                        <div class="contain-card p-4 block-md mb-4">
                            <?php if( !empty($emp->empImagem)): ?>
                            <div class="w-100 mb-5">
                                <img class="w-100" src="<?php echo base_url() ?>/uploads/<?php echo $emp->empImagem ?>">
                            </div>
                            <div class="content-card text-center mb-4">
                                <a href="#" data-toggle="modal" data-target="#imagem"> <span class="fa fa-plus-circle fa-3x"></span> <br/> Trocar imagem </a>
                            </div>
                            <?php else: ?>
                            <div class="content-card text-center py-3 my-4">
                                <a href="#" data-toggle="modal" data-target="#imagem"> <span class="fa fa-plus-circle fa-3x"></span> <br/> Adicionar imagem </a>
                            </div>
                            <?php endif;?>
                            <fieldset class="form-group mb-0">
                                <div class="row">
                                    <div class="form-group col-12 mb-4">
                                        <div class="label">Nome do empreendimento </div>
                                        <input type="text" name="empNome" class="form-control" placeholder="Título da Pesquisa" required  value="<?php echo $emp->empNome; ?>" />
                                    </div>

                                    <div class="form-group col-12 mb-4">
                                        <div class="label">Link para o site </div>
                                        <input type="text" name="empLinkSite" class="form-control"  placeholder="Link do site" value="<?php echo $emp->empLinkSite; ?>" />
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <div class="row">
                                            <div class="col-6 col-sm-4">
                                                <div class="label">Área (m²) </div>
                                                <input type="text" name="empArea" class="form-control" required  value="<?php echo $emp->empArea; ?>" />
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <div class="label">Nº de quartos </div>
                                                <input type="text" name="empQuartos" class="form-control" required  value="<?php echo $emp->empQuartos; ?>"  />
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="label">Editar andares</div>
                                                <label class="switch">
                                                <input type="checkbox" name="mudaAndares" value="1">
                                                <div class="slider round"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-grou col-12 mb-4 editar-andares" style="display: none">
                                        <div class="row">
                                            <div class="col-12 mb-2 ">
                                                <div class="alert alert-info text-center w-100" >Ao editar os andares a marcação das unidades ocupadas será resetada.</div> 
                                            </div>
                                            
                                            <div class="col-3">
                                                <div class="label">Nº de Andares </div>
                                                <input type="text" name="empAndares" class="form-control" required value="<?php echo $emp->empAndares; ?>" />
                                            </div>
                                            <div class="col-3">
                                                <div class="label">Atpº por andar </div>
                                                <input type="text" name="empAptoAndar" class="form-control" required value="<?php echo $emp->empAptoAndar ?>" />
                                            </div>
                                            <div class="col-4">
                                                <div class="label">1º pavimento diferente? </div>
                                                <label class="switch">
                                                <input type="checkbox" name="empPrimeiroDif" <?php  if($emp->empPrimeiroDif == 1): echo 'checked'; endif; ?> value="1" >
                                                <div class="slider round"></div>
                                                </label>
                                            </div>
                                            <div class="col-2 hidden " style="display: none">
                                                <div class="label">Começa em </div>
                                                <input type="text" name="empPrimeiroPavi" class="form-control" required  value="<?php echo $emp->empPrimeiroPavi ?>" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-12 mb-0">
                                        <hr class="separador-cinza">
                                            <div class="label">Status do empreedimento</div>
                                            <label class="switch">
                                                <input type="checkbox" name="empStatus" value="1"  <?php  if($emp->empStatus == 1): echo 'checked'; endif; ?> >
                                                <div class="slider round"></div>
                                            </label>
                                    </div>
                                    <input type="hidden" name="id_empreendimento" value="<?php echo $emp->empID ?>" required />
                                    <input type="hidden" name="form" value="dados" required  />
                                 </div>
                            </fieldset>
                        </div>
                    </form>
                        <div class="row mb-4">
                            <?php if( !empty($arquivos) ): ?>
                                <?php foreach ($arquivos as $arquivo ):

                                    switch ($arquivo->arquivoTipo) {
                                        case '.jpg':
                                            $icone = 'fa-file-image-o';
                                            break;
                                        case '.png':
                                            $icone = 'fa-file-image-o';
                                            break;
                                        case '.jpeg':
                                            $icone = 'fa-file-image-o';
                                            break;
                                        case '.pdf':
                                            $icone = 'fa-file-pdf-o';
                                            break;
                                        case '.xls':
                                            $icone = 'fa-file-excel-o';
                                            break;
                                        case '.xlsx':
                                            $icone = 'fa-file-excel-o';
                                            break;
                                        case '.ppt':
                                            $icone = 'fa-file-powerpoint-o';
                                            break;
                                        case '.pptx':
                                            $icone = 'fa-file-powerpoint-o';
                                            break;
                                        default:
                                            $icone = 'fa-file-image-o';
                                            break;
                                    } 

                                ?>
                                <div class="col-4 ">
                                    <div class="contain-card py-3 text-center relative">
                                        <a class="icone-arquivo" href="<?php echo base_url() ?>/uploads/<?php echo $arquivo->arquivoCaminho ?>" target="_blank"> <span class="fa <?php echo $icone; ?>"></span><br/> <?php echo $arquivo->arquivoNome ?> </a>
                                        <a href="#" class="excluir" data-excluir="<?php echo $arquivo->arquivoID ?>" style="position:absolute;top:-5px;right:-5px"><span class="fa fa-times-circle fa-2x"></span></a>
                                   </div>
                                </div>  
                                <?php endforeach; ?>
                                
                            <?php endif;?>
                             
                        </div>

                        <div class="content-card text-center py-3 my-4">
                            <a href="#" data-toggle="modal" data-target="#arquivos"> <span class="fa fa-plus-circle fa-4x"></span> <br/> Adicionar arquivos </a>
                        </div>

                        <div class="modal fade" id="imagem">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Imagem padrão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body px-3">
                                        <div class="">
                                                <div class="row">
                                                    <form action="<?php echo base_url()?>ajax_functions/imagem"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Arquivo <small>(jpeg/jpg/png)</small> </div>
                                                                <input type="file" name="imagem" id="imagem" class="form-control file" />
                                                            </div>
                                                            <div class="form-group  col-12 text-right">
                                                                <input type="submit" name="submit" class="btn btn-success" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                                                   
                                                </div>
                                             
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="arquivos">
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
                                                    <form action="<?php echo base_url()?>ajax_functions/upload"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Nome do arquivo</div>
                                                                <input type="text" name="arquivoNome" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Arquivo <small>(pdf/ppt/jpeg/jpg/png)</small> </div>
                                                                <input type="file" name="arquivo" id="arquivo" class="form-control file" />
                                                            </div>
                                                            <div class="form-group  col-12 text-right">
                                                                <input type="submit" name="submit" class="btn btn-success" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                                                   
                                                </div>
                                             
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                                        
                    
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                    <?php

                    $predio =  unserialize($emp->empAptos);

                     foreach (array_reverse($predio, true) as $andark => $andar): ?>

                         <?php echo '<ul class="andar clearfix col-12"> <li class="text-center col-12 hidden-xs-up">andar '.$andark.'</span>'; ?>

                            <?php foreach ( $andar as $key => $value) :?>

                               <li class="apto apto-<?php echo $emp->empAptoAndar; ?> <?php echo ($value['status'] )? 'apto-livre' : 'apto-reservado'; ?> " data-emp="<?php echo $emp->empID ?>" data-andar="<?php echo $andark ?>" data-apto="<?php echo $value['numApto'] ?>">
                                    <div class="label"><?php echo $value['numApto'] ?></div>
                                   <!--  <label class="switch">
                                        <input data-emp="<?php echo $emp->empID ?>" data-andar="<?php echo $andark ?>" data-apto="<?php echo $value['numApto'] ?>" type="checkbox" name="empStatus" <?php echo ($value['status'] )? 'checked' : ''; ?> >
                                        <div class="slider round"></div>
                                    </label> -->
                                <?php echo '</li>'; ?>

                            <?php endforeach; ?>    

                         <?php echo '</ul>'; ?>

                    <?php endforeach; ?>    
                    <?php //var_dump( unserialize($emp->empAptos)); ?>

                    </div>  
                </div>
            </div>
        </div>
        <div class="footer-form fixed-bottom bg-grey-md2 ">
            <button type="button" class="btn btn-link "> Cancelar </button>
            <button type="submit" id="btnsalvar" class="btn btn-theme "> Salvar </button>                 
        </div>

        

