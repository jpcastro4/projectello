 
        
        <div class="container relative mb-5">

            <div class="row mb-5">
                <div class="col-12 py-5">
                    <h1 class="contain-title"> Lista de empreendimentos </h1>
                </div>
                
                <div class="col-12">
                    <div class="row">
                     <?php if(!empty($emps)): ?>
                         
                        <?php foreach ($emps as $emp) : ?>
                           
                            <div class="col-12 col-md-4">
                                <div class="w-100 empImagem-lista">
                                <img class="w-100" src="<?php echo base_url() ?>/uploads/<?php echo $emp->empImagem; ?>">
                                </div>
                                <div class="detalhes p-3">
                                    <h4 class="text-center"><?php echo $emp->empNome; ?></h4>
                                </div>
                                <div class="py-3">
                                    <a href="<?php echo base_url()?>/administrativo/empreendimento/<?php echo $emp->empID ?>" class="btn btn-theme btn-width"> Editar </a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>

                        <p class="alert alert-info"> Não há empreendimentos cadastrados</p>
                     <?php endif; ?>               
                    </div>
                </div>
                 
            </div>
        </div>
       
        

