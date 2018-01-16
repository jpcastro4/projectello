      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          <div class="row">
            
            <div class="col-lg-12 mt">

            <?php if($ativo_indicador == 'nao_patrocinado' OR  $ativo_indicador != 0):  ?>

                <?php    if($ativos == 0 ): ?>
                
               <!--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>START</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$100</span>
                        </div> 
                        
                            <p>1 Cota</p>
                       
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit1cota" value="Comprar 1 ativos"></form>
                    </div>
                </div>
       
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>BRONZE</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$200</span>
                        </div>
                         
                            <p>2 ativos</p>
                        
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit2cotas" value="Comprar 2 ativos"> </form>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>MASTER BRONZE</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$300</span>
                        </div>
                         
                            <p>3 ativos</p>
                        
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit3cotas" value="Comprar 3 ativo"> </form>
                    </div>
                </div>
                <?php //if( $ativo_indicador <= 5):?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>PRATA</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$500</span>
                        </div> 
                        
                            <p>5 ativos</p>
                       

                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit5cotas" value="Comprar 5 ativos"></form>
                    </div>
                </div>
                <?php //endif;?>

                <?php //if( $ativo_indicador <= 10):?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>OURO</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$1000</span>
                        </div> 
                        
                            <p>10 Ativos</p>
                       
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit10cotas" value="Comprar 10 ativos"></form>
                    </div>
                </div>
                <?php //endif;?>

                <?php //if( $ativo_indicador <= 30):?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>PLATINA</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$3000</span>
                        </div> 
                        
                            <p>30 ativos</p>
                        
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit30cotas" value="Comprar 30 ativos"></form>
                    </div>
                </div>
                <?php //endif; ?>
                

                <?php else: ?>
                    <p class="alert alert-danger">Você tem ativos em andamento. No momento é permitido apenas um ciclo de investimento por vez.</p>
                <?php endif; ?> 

            <?php else:  ?>
                <p class="alert alert-danger">Seu indicador não está ativo. Entre em contato com ele.</p>
            <?php endif; ?>
                
            </div><! -- /col-lg-12 -->
          </div><! -- /row --> 

          <div class="row">
            
            <div class="col-lg-12">
                

             <!--    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="custom-box">
                        <div class="servicetitle">
                            <h4>DIAMANTE</h4>
                            <hr>
                        </div>
                        <div class="icn-main-container">
                            <span class="icn-container">R$5000</span>
                        </div> 
                        
                            <p>50 ativos</p>
                       
                            <form method="post" action=""><input class="btn btn-theme" type="submit" name="submit50cotas" value="Comprar 50 ativos"></form>
                    </div>
                </div> -->
                
            </div><! -- /col-lg-12 -->
          </div><! -- /row -->          
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->