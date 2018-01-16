

    <hr class="invisible">

    <div class="container">
        <div class="row">     

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-8 col-xl-6 col-xl-offset-3">

              <!-- User Card
              ================================================== -->

              <div class="card card-inverse card-social text-xs-center">
                <div class="card-block has-gradient-red">
                  <img src="<?php echo base_url()?>assets/default_avatar.png" height="90" width="90" alt="Avatar" class="img-circle">
                  <h6 class="card-title">ID <?php echo $conta->id ?></h6>
                  <h5 class="card-title"> <?php echo $conta->nome ?></h5>
                  <h6 class="card-subtitle"><?php echo $conta->email ?></h6>
                  <form action="#" method="post">
                    <!-- <button type="submit" name="novologin" value="novologin" class="btn btn-secondary-outline btn-sm">Adquirir login</button> -->
                  </form>
                  
                </div>
                <div class="card-block ">
                  <div class="row">
                    <div class="col-md-4 card-stat">
                      <h4><?php echo $conta->totalRecebido ?> <small class="text-uppercase">Recebido</small></h4>
                    </div>
                    <div class="col-md-4 card-stat">
                      <h4><?php //echo $conta->total_afiliados ?> 0 <small class="text-uppercase">Indicados</small></h4>
                    </div>
                    <div class="col-md-4 card-stat">
                      <h4><?php //if( $conta->total_afiliados < 300 ){
                          //echo 1; 
                        //}else{ 
                        //echo floor($conta->total_afiliados / $conta->contas);

                        //} ?> 0 <small class="text-uppercase" >Reentradas</small></h4>
                    </div>
                  </div>
                </div>
              </div>

              <?php if( isset($mensagem) ) echo $mensagem; ?>
              <div class="card card-social text-xs-center">
                <div class="card-block">
                <?php if( $this->backoffice_model->usuariosContas() != false): ?>
                    <button  data-idUser="<?php echo $conta->id ?>" style="position:relative;right:inherit"  class="btn btn-success marcarPresenca " > Marcar presença </button>
                <?php else: ?>
                    <p class="bg-info text-white col-xs-12 text-center"> Você não tem nenhum login cadastrado. Provavelmente entrou e não foi incluído no fechamento. Infelizmente você não poderá participar. Caso haja vaga entramos em contato com você.</p>

                <?php endif;?>
                
                </div>
              </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
        
        </div>

        <div class="row ads">     

            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-8 col-xl-6 col-xl-offset-3">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- NOWX -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3215674587886121"
                       data-ad-slot="7539926294"
                       data-ad-format="auto"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
            </div>
        </div>
        
</div>