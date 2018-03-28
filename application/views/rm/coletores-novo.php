 
        
        <div class="col bg-grey-md1 h-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down">
                    <div class="col-12 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
            </div>
            <div class="row clearfix max-height80 pt-4">
                <div class="contain-container container">
                    <div class="col-12"> 
                        <div class="contain-card px-4 py-5 block-md"> 
                        
                            <form action="" method="post" >
                                <fieldset class="form-group">
                                    <div class="form-group col-12"> 
                                        <div class="label"> Escolha o coletor que será vinculado </div>
                                        <select class="form-control col-12" name="coletorID">
                                        <?php if(!empty($lista_coletores) ) :?>
                                            <option disabled selected value="" > - Selecione um coletor - </option>
                                            <?php foreach ($lista_coletores as $coletor) : ?>
                                                <option value="<?php echo $coletor->coletorID?>"

                                                    <?php if( $this->dashboard_model->coletor_ocupado($coletor->coletorID,$pesquisa->pesquisaID) ) echo 'disabled'; ?> > 

                                                    #<?php echo $coletor->coletorID?> - <?php echo $coletor->coletorNome; ?>

                                                    <?php if( $this->dashboard_model->coletor_ocupado($coletor->coletorID,$pesquisa->pesquisaID) ) echo ' - Já vinculado a essa pesquisa';?>
                                                    
                                                </option>
                                            <?php endforeach;?>
                                        <?php else: ?>
                                            <option disabled selected value="" > - Não há coletores ativos - </option>
                                        <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="col-12 py-4">
                                    <hr class="separador-grey clearfix ">
                                    </div>

                                    <div class="form-group col-12">
                                    <div class="label"> Selecione as regiões e números de coleta </div>

                                    <div class="row vinculo" data-local="1">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="form-group col-12 col-md-2">
                                                    <select class="form-control  estadoid" name="add_vinculo[1][estadoID]">
                                                        <option disabled selected value="" > - UF - </option>
                                                        <?php if( !empty($lista_estados) ): ?>
                                                            <?php  foreach ($lista_estados as $estado) : ?>
                                                                <option value="<?php echo $estado->estadoID ?>" > <?php echo $estado->estadoNome ?> </option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 col-md-4">
                                                    <select class="form-control  cidadeid" name="add_vinculo[1][cidadeID]">
                                                        <option disabled selected value="" > - Cidade - </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 col-md-4">
                                                    <select class="form-control  bairrocomuid" name="add_vinculo[1][bairroComuID]">
                                                        <option disabled selected value="" > - Bairro/Comu/Região - </option>                                      
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 col-md-2">
                                                    <input class="form-control   nummincoletas" type="number" name="add_vinculo[1][numMinColetas]" placeholder="Qtd" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 rot-close"></div>

                                        <div class="form-group col-12">
                                            <hr class="separador-grey">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-theme" id="novolocal"> Novo local </button>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="pesquisaID" value="<?php echo $pesquisa->pesquisaID ?>" required="required" />
                                    <input type="hidden" name="form" value="novo-vinculo-coletor" required="required" />
                                </fieldset>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-form bg-grey-md2 text-md-right text-left">
                
                <button type="button" class="btn btn-link"> Cancelar </button>
                <button type="button" id="btnsalvar" class="btn btn-theme"> Salvar </button>
                 
            </div>

        </div>

