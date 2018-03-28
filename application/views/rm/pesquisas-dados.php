 
        
        <div class="col bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down ">
                <div class="col-12 ">
                    <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                </div>
            </div>

            <div class="row py-4 max-height80 ">
                <div class="contain-container">

                    <div class="row py-4">
                        <div class="col-12">
                            <h1 class="contain-title"> <?php echo $pesquisa->pesquisaNome ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <form action="" method="post" >
                            <div class="contain-card p-4 block-md mb-4">
                                <fieldset class="clearfix">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="label">Status da pesquisa</div>
                                            <label >
                                                <input type="radio" value="0" class="option-input radio" name="pesquisaStatus" <?php if( $pesquisa != false ): if($pesquisa->pesquisaStatus == 0): echo 'checked'; endif; endif; ?> /> Rascunho
                                            </label>
                                            <label >
                                                <input type="radio" value="1" class="option-input radio" name="pesquisaStatus" <?php if( $pesquisa != false ): if($pesquisa->pesquisaStatus == 1): echo 'checked'; endif; endif; ?> /> Em campo
                                            </label>
                                            <label >  
                                                <input type="radio" value="2" class="option-input radio" name="pesquisaStatus" <?php if( $pesquisa != false ): if($pesquisa->pesquisaStatus == 2): echo 'checked'; endif; endif; ?> /> Em apuração
                                            </label>
                                            <label >  
                                                <input type="radio" value="3" class="option-input radio" name="pesquisaStatus" <?php if( $pesquisa != false ): if($pesquisa->pesquisaStatus == 3): echo 'checked'; endif; endif; ?> /> Finalizada
                                            </label>
                                        </div> 
                                    </div>
                                </fieldset>
                            </div>
                            <div class="contain-card p-4 block-md mb-4">
                                <?php //var_dump($pesquisa); ?>
                                <fieldset class="form-group mb-0">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <div class="label">Nome da pesquisa <br/><small><i> ( O título compõe a titulação dos relatórios. Seja breve e organizado. )</i></small></div>
                                            <input type="text" name="pesquisaNome" value="<?php if( $pesquisa != false ): echo $pesquisa->pesquisaNome; endif; ?>" class="form-control"  placeholder="Título da Pesquisa" required  />
                                        </div>
                                        <?php if( $pesquisa->pesquisaStatus == 0 ):?>
                                        <!-- <div class="form-group col-12">
                                            <div class="label">Tipo de pesquisa</div>
                                            <label >
                                                <input type="radio" value="1" class="option-input radio" name="pesquisaTipo" <?php if( $pesquisa != false ): if($pesquisa->pesquisaTipo == 1): echo 'checked'; endif; endif; ?> /> Eleitoral
                                            </label>
                                            <label >
                                                <input type="radio" value="2" class="option-input radio" name="pesquisaTipo" <?php if( $pesquisa != false ): if($pesquisa->pesquisaTipo == 2): echo 'checked'; endif; endif; ?> /> Mercado
                                            </label>
                                        </div> -->
                                        <?php endif; ?>
                                        <input type="hidden" name="pesquisaID" value="<?php if( $pesquisa != false ): echo $pesquisa->pesquisaID; endif; ?>" required  />
                                        <input type="hidden" name="form" value="dados" required  />

                                        <div class="form-group col-12">
                                            <div class="label">Esta pesquisa será publicada?</div>
                                            <label class="switch">
                                                <input type="checkbox" name="pesquisaPublicada" value="1"  <?php if( $pesquisa != false ): if($pesquisa->pesquisaPublicada == 1): echo 'checked'; endif; endif; ?>>
                                                <div class="slider round"></div>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 mb-0">
                                            <div class="label">Inicio da coleta</div>
                                            <input type="date" name="pesquisaInicio" class="form-control" value="<?php echo $pesquisa->pesquisaInicio ?>" >
                                        </div>
                                        <div class="form-group col-12 col-md-4 mb-0">
                                            <div class="label">Fim da coleta</div>
                                            <input type="date" name="pesquisaFim" class="form-control" value="<?php echo $pesquisa->pesquisaFim ?>" >
                                        </div>

                                    </div>
                                </fieldset>
                            </div>
                            <?php if( $pesquisa->pesquisaStatus == 2 ):?>
                            <div class="contain-card p-4 block-md">
                                <fieldset class="clearfix">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="label">Autorizar e-mail para acesso</div>
                                            <input type="email" name="emailAutorizado" class="form-control"  placeholder="Digite um e-mail válido" />
                                        </div> 
                                    </div>
                                </fieldset>
                            </div>
                            <?php endif; ?>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="footer-form bg-grey-md2 mt-5">
                <button type="button" class="btn btn-link "> Cancelar </button>
                <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados" class="btn btn-theme "> Salvar </button>
                <button type="button" id="btnsalvarecontinuar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/questoes" class="btn btn-theme "> Continuar </button>
                
                 
            </div>

        </div>

