<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">

              <div class="row ">
                <div class="col-lg-12">
                    <div class="row content-panel">

                        <div class="col-md-5 col-sm-12 profile-text">
                            <h5>Link de indicação</h5><pre><?php echo base_url('patrocinador/'.$login);?>/</pre>
                        </div>
                        
                    </div><!-- /row -->    
                </div>
            </div>
            <div class="row mt">
                  <div class="col-lg-12 main-chart">
                  
                    <div class="row "><!-- mtbox -->
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="li_fire"></span>
                                <h3><?php echo $this->conta_model->CotasAtivas();?> ativos</h3>
                            </div>
                                <p>Ativos aplicados. <br>Cada ativo equivale ao valor de R$ 100,00</p>
                        </div>
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="li_vallet"></span>
                                <h3>R$ <?php echo $this->conta_model->user('saldo_disponivel');?></h3>
                            </div>
                                <p>Saldo investimento</p>
                        </div>
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="fa fa-group" style="margin-top:11px; margin-bottom:10px"></span>
                                <h3><?php echo $this->conta_model->TotalIndicados();?></h3>
                            </div>
                                <p>Indicados diretos</p>
                        </div>
                        
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="li_banknote"></span>
                                <h3>R$ <?php echo number_format($this->conta_model->user('saldo_comissao') + $this->conta_model->user('saldo_bonus') );?> </h3>
                            </div>
                                <p>Comissão Indicação + Bônus por ciclo</p>
                        </div>
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="li_star"></span>
                                <h3><?php echo $this->conta_model->user('pontos_invest');?></h3>
                            </div>
                                <p>Pontos por investimento.</p>
                        </div>
                        <div class="col-md-2 col-sm-3 box0">
                            <div class="box1">
                                <span class="fa fa-bolt" style="margin-top:11px; margin-bottom:10px"></span>
                                <h3><?php echo $this->conta_model->user('pontos_indicacao');?></h3>
                            </div>
                                <p>Pontos por indicacao.</p>
                        </div>
                    
                    </div><!-- /row mt -->  
                  
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
            </div>      
                  
     <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
            <div class="row mt"  >
                <div class="col-lg-9">
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                        <div class="col-md-4 col-sm-4 mb">
                            <div class="white-panel pn donut-chart">
                                <div class="white-header">
                                    <h5>PRÓXIMO RECEBIMENTO</h5>
                                </div>
                                 <?php 

                                    $hoje = strtotime('now');
                                    $ultimo = $ultima_cota;

                                    $diferenca = (int)floor( ($ultimo - $hoje) / (60 * 60 * 24) );

                                    $Y = (100 * $diferenca) / 90; 
                                ?>

                                <?php if($ultima_cota != false):?>

                                    <div class="col-sm-12 goleft">
                                        <div class="progress progress-striped active" style="height:40px;">
                                          <div class="progress-bar"  role="progressbar" aria-valuenow="<?php echo $Y ;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $Y ;?>%">
                                            <span class="sr-only"><?php echo (int)floor($Y) ;?>% Complete</span>
                                          </div>
                                        </div>
                                    </div>

                                    <p><i class="fa fa-database"></i><?php echo (int)floor($Y) ;?>%</p>
                                
                            <?php else:?>

                                <div class="col-lg-11">

                                    <div class="form-group text-center" >
                                        <!--<div class=""><h4>As compras serão liberadas em breve. Mantenha seu email atualizado. <br></h4></div>-->
                                         <div class="mt col-lg-offset-1 col-lg-10">
                                            <a href="<?php echo base_url();?>ativos/comprar" class="btn btn-theme" >Compre agora seu ativo</a>
                                        </div> 
                                    </div>
                                </div>
                               
                            <?php endif;?>

                            </div><! --/grey-panel -->
                        </div><!-- /col-md-4-->
                        

                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
                            <div class="compras pn">
                                <div class="weather-2-header">
                                    <h2>LOJA VIRTUAL</h2>
                                    <h4>em breve</h4>
                                </div>
                            </div>
                        </div><!-- /col-md-4 -->
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
                            <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>EM BREVE</h5>
                                </div>
                                
                                    <div class="service-icon">
                                        <a class="" href="faq.html#"><i style="font-size:3em" class="dm-icon fa fa-random"></i></a>
                                    </div>
                                    
                                    <p>Um FAQ completo pra você tirar suas dúvidas.</p>
                                
                               <!--  <p><img src="<?php echo base_url();?>assets/frontend/novo/assets/img/avatar.png" class="img-circle" width="80"></p>
                                <p><b>Zac Snider</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="small mt">MEMBER SINCE</p>
                                        <p>2012</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small mt">TOTAL SPEND</p>
                                        <p>$ 47,60</p>
                                    </div>
                                </div> -->
                            </div>
                        </div><!-- /col-md-4 -->
                        

                    </div><!-- /row -->
                </div>
                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                        <h3>EXTRATO</h3>
                                        
                        <div class="recent-activity">
                        <?php
                            if($extrato_registros != false):

                                foreach($extrato_registros as $extrato):
                        ?>
                            <!-- <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div> -->
                            <div class="activity-panel  mb">
                                
                                <p><?php echo $extrato->descricao;?></p>
                                <small><?php echo date('d/m/Y H:i:s', strtotime($extrato->data));?></small>
                            </div>
                                                    
                            <?php
                                endforeach;

                            else: ?>

                                <div class="alert alert-info mt">Você não tem movimentações.</div>

                            <?php
                            endif;
                            ?>
                        </div><! --/recent-activity -->

                       

                        <!-- CALENDAR
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->               
                  

              </div><! --/row -->
          </section>
      </section>





