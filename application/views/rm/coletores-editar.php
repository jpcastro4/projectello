
        
        <div class="col bg-grey-md1 h-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down">
                    <div class="col-12 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>

            </div>
 

            <div class="row clearfix max-height80" >
            <div class="col-12 py-5">
                    <div class="contain-container">
                        <a href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores/novo" class="btn btn-theme pull-right "> Novo coletor </a>
                    </div>
            </div>
            <?php //var_dump($coletores_vinculos ) ?>
                <div class="contain-container container ">
                    <!-- <div class="col-sm-12 ">  -->
                        <div class="contain-card p-4 mb-3 block-md" style="padding-bottom:100px">
                        
                            <form action="" method="post" >
                                <fieldset class="form-group">
                                    <div class="form-group col-12"> 
                                    <div class="label"> Coletor Vinculado </div>
                                    <h1 class="title-1"><?php $coletor = $this->dashboard_model->get_coletor($coletores_vinculos->coletorID); echo $coletor->coletorID?> | <?php echo $coletor->coletorNome; ?> (<?php echo $coletor->coletorDados; ?>)</h1>
                                    
                                    <input type="hidden" name="coletorID" type="number" value="<?php echo $coletor->coletorID?>" />
                                    </div>
                                    <div class="col-12 py-3">
                                    <hr class="separador-grey clearfix">
                                    </div>

                                    <div class="form-group col-12">
                                    <div class="label"> Selecione as regiões e números de coleta </div>

                                    <?php if( !empty( $coletores_vinculos->edit_vinculos ) ) :?>

                                        <?php $i = 1; foreach( $coletores_vinculos->edit_vinculos as $item => $vinculo ): ?>
                                            <div class="row vinculo" data-local="<?php echo $i++; ?>">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="form-group col-12 col-md-2">
                                                            <select class="form-control estadoid" name="edit_vinculo[<?php echo $vinculo->coletorLocalID; ?>][estadoID]">
                                                                <option disabled selected value="" > - UF - </option>
                                                                <?php if( !empty($lista_estados) ): ?>
                                                                    <?php  foreach ($lista_estados as $estado) : ?>
                                                                        <option value="<?php echo $estado->estadoID ?>" <?php if($vinculo->estadoID == $estado->estadoID){ echo 'selected'; } ?> > <?php echo $estado->estadoNome ?> </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-12 col-md-4">
                                                            <select class="form-control cidadeid" name="edit_vinculo[<?php echo $vinculo->coletorLocalID; ?>][cidadeID]">
                                                                <?php if( !empty( $this->dashboard_model->lista_cidades( $vinculo->estadoID ) ) ): ?>
                                                                    <?php  foreach ($this->dashboard_model->lista_cidades( $vinculo->estadoID ) as $cidade) : ?>
                                                                        <option value="<?php echo $cidade->cidadeID ?>" <?php if($vinculo->cidadeID == $cidade->cidadeID){ echo 'selected'; } ?> > <?php echo $cidade->cidadeNome ?> </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div> 
                                                        <div class="form-group col-12 col-md-4">
                                                            <select class="form-control bairrocomuid" name="edit_vinculo[<?php echo $vinculo->coletorLocalID; ?>][bairroComuID]">
                                                                <?php if( !empty( $this->dashboard_model->lista_bairros_comunidades( $vinculo->cidadeID ) ) ): ?>
                                                                    <?php  foreach ($this->dashboard_model->lista_bairros_comunidades( $vinculo->cidadeID ) as $bairroComu) : ?>
                                                                        <option value="<?php echo $bairroComu->bairroComuID ?>" <?php if($vinculo->bairroComuID == $bairroComu->bairroComuID){ echo 'selected'; } ?> > <?php echo $bairroComu->bairroComuNome ?> </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-12 col-md-2">
                                                            <input class="form-control nummincoletas" type="number" name="edit_vinculo[<?php echo $vinculo->coletorLocalID; ?>][numMinColetas]" value="<?php  echo $vinculo->numMinColetas; ?>" placeholder="Qtd" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 rot-close">
                                                <?php if($item != 0 ): ?>
                                                <i data-coletorlocalid="<?php echo $vinculo->coletorLocalID; ?>"  class="fa fa-close excluir"></i>
                                                <?php endif;?>
                                                </div>
                                                <div class="form-group col-12">
                                                    <hr class="separador-grey">
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-theme" id="novolocal"> Novo local </button>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="pesquisaID" value="<?php echo $pesquisa->pesquisaID ?>" required />
                                    <input type="hidden" name="pesquisaID" value="<?php echo $pesquisa->pesquisaID ?>" required />
                                    <!-- <input type="hidden" name="form" value="novo-pesquisador" required /> -->
                                </fieldset>
                                <input type="hidden" name="form" value="novo-vinculo-coletor" required />
                            </form>

                        </div>
                        
                   <!--  </div> -->

                </div>
            </div>

            <div class="footer-form bg-grey-md2 text-md-right text-left">
                
                <button type="button" class="btn btn-link"> Cancelar </button>
                <button type="button" id="btnsalvar" class="btn btn-theme"> Salvar </button>
                <a href="<?php echo base_url('dashboard/pesquisas/p/'.$pesquisa->pesquisaID.'/dados'); ?>"  class="btn btn-theme"> Finalizar </a>
            </div>

        </div>

