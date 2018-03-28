 
        
        <div class="col bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down">
                <div class="col-12 ">
                    <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                </div>
            </div>

            <div class="row py-4 max-height80 ">

                <div class="contain-container ">
                    
                    <div class="row py-2">
                            <div class="col-12">
                                <h1 class="contain-title"> <?php echo $pesquisa->pesquisaNome ?></h1>
                            </div>
                            <div class="col-12 py-4 text-right">
                                <button class="btn btn-warning questoespadrao" type="button"> <i class="fa fa-plug mr-2"></i>  Questões padrão </button>
                                <a href="<?php echo site_url('relatorio/questionario/'.$pesquisa->pesquisaID); ?>" target="_blank"><button class="btn btn-theme" type="button"> <i class="fa fa-print mr-2"></i>Imprimir</button></a>
                                <button class="btn btn-theme novaquestao" type="button"> <i class="fa fa-plus-circle mr-2"></i>  Nova questão </button>
                            </div>
                    </div>
                
                    <div class="row relative" id="questoes"></div>

                </div>

            </div>

            <div class="footer-form bg-grey-md2 ">
                
                <a href="<?php echo base_url() ?>/dashboard/pesquisas/" class="btn btn-theme" >Sair</a>
                <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores"  class="btn btn-theme" >Continuar</a>

            </div>

        </div>

        <div class="" id="rot-editaquestoes"></div>
        <div class="" id="rot-novaquestao"></div>
        <div class="" id="rot-questoespadrao"></div>

