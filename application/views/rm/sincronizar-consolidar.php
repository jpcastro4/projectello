 
        
        <div class="col bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down" >
                 
                    <div class="col-sm-4">
                        <!-- <a href=""> </a> -->
                    </div>
                    <div class="col-sm-4 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
                    <div class="col-sm-4 text-right">
                        
                    </div>
                 
            </div>

            <div class="row py-4 max-height80 ">

                <div class="contain-container-short">

                    <div class="row py-4">
                        <div class="col-12 col-md-9">
                                <h1 class="contain-title"> <?php echo $pesquisa->pesquisaNome ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ">
                            <div class="contain-card lista p-4 block-md text-center">

                            <?php echo $mensagem; ?>
                            <?php echo $mensagem_erro; ?>
                                
                                <?php if($coletas_temp[0]->consolidaStatus == 0 ): ?>
                                <i class="icon-middle fa fa-archive fa-4x py-4"></i>
                                <p>Vamos consolidar as coletas e prosseguir para as pesquisas? Esse processo deve ser realizado somente se todos os coletores estiverem sincronizados com o sistema.</p>
                                <p>Clique abaixo para consolidar a coletas realizadas pelos coletores. O sistema pode parecer travado, mas ele está trabalhando.</p>
                                <p>Durante a consolidação o sistema irá preparar os dados para emissão dos relatórios e redirecionar para a correção de respostas esponstâneas caso haja.</p>

                                <p class="alert alert-danger"><strong>Esse processo não pode ser revertido.</strong></p>
 
                                <button class="btn btn-theme my-4" id="consolidar" data-pesquisaid="<?php echo $pesquisa->pesquisaID ?>" >Consolidar coletas</button>

                                <?php else: ?>
                                     <?php if($coletas_temp[0]->statusColeta == 1 ): ?>
                                        <i class="icon-middle fa fa-archive fa-4x py-4"></i>
                                        <p>As coletas já foram consolidadas. Não é possível repetir o processo para não haver sobreposição de respostas. </p>
                                    <?php else: ?>

                                        <i class="icon-middle fa fa-spinner fa-spin fa-4x py-4"></i>

                                        <script type="text/javascript">
                                            setTimeout(function(){
                                                window.location.reload()
                                            },20000)
                                        </script>
                                        <p>As coletas estão sendo processadas </p>

                                    <?php endif; ?>   

                                <?php endif; ?>
                             
                            </div>
                             
                        </div>

                    </div>


                </div>
            </div>
            
            <div class="footer-form bg-grey-md2 mt-5">
                <a href="<?php echo base_url('dashboard/pesquisas') ?>" class="btn btn-link "> Sair </a>
                <!-- <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados" class="btn btn-theme "> Salvar </button> -->
                <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/consolidar/bairros-extra" class="btn btn-theme "> Ir para Correções </a>                 
            </div>

        </div>



