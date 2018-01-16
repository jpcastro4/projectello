      <!-- Start Contain Section -->
      <div class="main-content">
         <div class="page-content container-fluid">
            <div class="dashboard-main">

               <div class="row">
                  <div class="col-sm-12 col-md-6">
                  <?php $usuario = $this->painel_model->user() ?>

                  <pre>
                     <?php echo var_dump($this->painel_model->infoUser( 3 )  ) ?>
                  </pre>
                  <!-- Start Boxes Section -->
                  <div class="first-icon-main">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="ia-container">
                           <figure>
                              <div class="card-box-dash box-1-dash">
                                 <div>
                                    <i class="fa  fa-circle-o-notch  fa-5x dash-icon-head blue"></i>
                                    <div class="wid-u-info">
                                       <div class="huge"><b>Super<br/>ciclo</b></div>
                                       <div class="counter">
                                          <b><?php echo $usuario->superCiclo ?></b>
                                       </div>
                                       <!-- <div class="text-icon-dash">Open All Messages</div> -->
                                    </div>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="ia-container greenBg">
                           <figure>
                              <div class="card-box-dash box-2-dash">
                                 <div>
                                    <i class="fa fa-tasks  fa-5x dash-icon-head bg-light-green-500"></i>
                                    <div class="wid-u-info">
                                       <div class="huge"><b>Ciclo</b></div>
                                       <div class="counter">
                                          <b><?php echo $usuario->ciclo ?></b>
                                       </div>
                                       <!-- <div class="text-icon-dash">Popularity over time</div> -->
                                    </div>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="ia-container blueBG">
                           <figure>
                              <div class="card-box-dash box-3-dash">
                                 <div>
                                    <i class="fa fa-money fa-5x dash-icon-head purple"></i>
                                    <div class="wid-u-info">
                                       <div class="huge"><b>Recebido</b></div>
                                       <div class="counter">
                                          <b><?php echo $usuario->total_recebido ?></b>
                                       </div>
                                       <!-- <div class="text-icon-dash">Profit For The Year</div> -->
                                    </div>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="ia-container redBG">
                           <figure>
                              <div class="card-box-dash box-4-dash">
                                 <div>
                                    <i class="fa fa fa-credit-card-alt fa-5x dash-icon-head blue"></i>
                                    <div class="wid-u-info">
                                       <div class="huge"><b>Doado</b></div>
                                       <div class="counter">
                                          <b><?php echo $usuario->total_doado ?></b>
                                       </div>
                                       <!-- <div class="text-icon-dash">Disk Space</div> -->
                                    </div>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                  </div>
                  <!-- End Boxes Section -->

                     <div class="col-sm-12 col-md-12">
                           <div class="widgett widgett-article widgett-shadow">
                              <!-- Start Client Section -->
                              <div class="heading-top-index-2">
                                 <h3><span>Recebedor </span></h3>
                              </div>
                              <div class="message-box client-main-div">
                                 <div class="media margin-top-0">
                                    <div class="media-left user-img padding-right-0"> <img src="assets/images/global/img_240x265.png" alt="user" class="margin-top-5"> <span class="profile-status status-online pull-right profile-sm-status"></span> </div>
                                    <div class="media-body msg-detail">
                                       <div class="left-client-content">
                                          <h4>Domare Dos</h4>
                                          <p>Gud mrng</p>
                                       </div>
                                       
                                    </div>
                                 </div>
                                 <div class="media margin-top-0">
                                    <div class="media-left user-img padding-right-0"> <img src="assets/images/global/img_240x265.png" alt="user" class="margin-top-5"> <span class="profile-status status-busy pull-right profile-sm-status"></span> </div>
                                    <div class="media-body msg-detail">
                                       <div class="left-client-content">
                                          <h4>Sevral Den</h4>
                                          <p>I've sung a song!</p>
                                       </div>
                                       
                                    </div>
                                 </div>
                                 <div class="media margin-top-0">
                                    <div class="media-left user-img padding-right-0"> <img src="assets/images/global/img_240x265.png" alt="user" class="margin-top-5"> <span class="profile-status status-off pull-right profile-sm-status"></span> </div>
                                    <div class="media-body msg-detail">
                                       <div class="left-client-content">
                                            <h4>Rony Swag</h4>
                                            <p>Hello</p>
                                       </div>
                                       
                                    </div>
                                 </div>
                                 <div class="media margin-top-0">
                                    <div class="media-left user-img padding-right-0"> <img src="assets/images/global/img_240x265.png" alt="user" class="margin-top-5"> <span class="profile-status status-online pull-right profile-sm-status"></span> </div>
                                    <div class="media-body msg-detail">
                                       <div class="left-client-content">
                                            <h4>Jack Darpa</h4>
                                            <p>See you!</p>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                              <!-- End Client Section -->
                           </div>
                        </div>



                  </div>

                  <div class="col-sm-12 col-md-6">
                           <div class="widgett widgett-article widgett-shadow">
                              <!-- Start Products Section -->
                              <div class="heading-top-index-2">
                                 <h3><span>Donwlines</span></h3>
                              </div>
                              <div class="product-main">
                                 <div class="static-box product-main-div margin-0">
                                    <div class="example table-responsive">
                                       <div class="responsive-table">
                                          <table class="table table-hover">
                                             <thead>
                                                <tr>
                                                   
                                                   <th>Downline</th>
                                                   <th>Ciclo</th>
                                                   <th>Cronometro</th>
                                                   <th>Ação</th>
                                                </tr>
                                             </thead>
                                             <tbody>

                                                <?php $ciclos = $this->painel_model->Downlines(); ?>

                                                <pre>
                                                   <?php //var_dump($downlines); ?>
                                                </pre>

                                                <?php foreach ($ciclos as $ciclo) : ?>
                                                   <?php foreach ($ciclo as $down) : ?>
                                                <tr>
                                                   
                                                   <td><?php echo var_dump($this->painel_model->infoUser($down) ) ?></td>
                                                   <td>
                                                      <span data-plugin="peityBar" data-skin="blue" style="display: none;">5,3,9,6,5,9,7,3,5,2</span>
                                                      <svg class="peity" height="22" width="44">
                                                         <rect x="0.44000000000000006" y="9.777777777777777" width="3.52" height="12.222222222222223"></rect>
                                                         <rect x="4.840000000000001" y="14.666666666666668" width="3.5199999999999987" height="7.333333333333332"></rect>
                                                         <rect x="9.24" y="0" width="3.5199999999999996" height="22"></rect>
                                                         <rect x="13.64" y="7.333333333333334" width="3.5199999999999996" height="14.666666666666666"></rect>
                                                         <rect x="18.04" y="9.777777777777777" width="3.520000000000003" height="12.222222222222223"></rect>
                                                         <rect x="22.439999999999998" y="0" width="3.520000000000003" height="22"></rect>
                                                         <rect x="26.839999999999996" y="4.888888888888889" width="3.5200000000000067" height="17.11111111111111"></rect>
                                                         <rect x="31.24" y="14.666666666666668" width="3.5200000000000067" height="7.333333333333332"></rect>
                                                         <rect x="35.64" y="9.777777777777777" width="3.520000000000003" height="12.222222222222223"></rect>
                                                         <rect x="40.04" y="17.11111111111111" width="3.520000000000003" height="4.888888888888889"></rect>
                                                      </svg>
                                                   </td>
                                                   <td>
                                                      <span class="text-danger text-semibold">28.76%</span>
                                                   </td>
                                                   <td>
                                                      <span class="text-danger text-semibold">Down</span>
                                                   </td>
                                                </tr>
                                                   <?php endforeach; ?>
                                                <?php endforeach; ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Products Section -->
                           </div>
                        </div>

               </div>


               <div class="row">
                  <div class="col-sm-12">
                     











                     <div class="col-sm-12 col-md-12 tree-responsive clearfix">
          
              <div class="zoomViewport">
                 
              <?php $indicados = $this->painel_model->Familia( $this->native_session->get('user_id') ); ?>

              <?php if(!empty($indicados) ):  ?>

                <div class="tree row zoomContainer" id="draggable">
                  <ul>
                  <?php foreach($indicados as $indicador => $filho): ?>
                      <li class="indicador" ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a href="#"><?php //echo $indicador; ?><?php echo $this->painel_model->infoUser($indicador)->nome ?></a>
                      <?php if(!empty($filho) ):  ?>
                          <ul class="ciclo1">
                          <?php foreach($filho as $filhoId): ?>
                              <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($filhoId); ?>
                                            <li ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                              $statusDoacao = $doacaoDownline->status;
                                              if($statusDoacao == 1 ): ?>
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
                                               <?php endif;?>" href="#"><?php //echo $filhoId; ?><?php echo $this->painel_model->infoUser($filhoId)->nome; ?></a>
                              
                              <?php $indicadosNetos = $this->painel_model->RedeNetos( $filhoId ); ?>
                                  
                                <?php  if($indicadosNetos == null) :  ?>

                                <?php else:?>

                                  <ul class="ciclo2">
                                  <?php foreach($indicadosNetos as $neto): ?>
                                      <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($neto); ?>
                                            <li  ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a class="<?php if(!empty($doacaoDownline) ) : 

                                              $statusDoacao = $doacaoDownline->status;
                                              if($statusDoacao == 1 ): ?>
                                                label-success font-branco border-none
                                              <?php elseif($statusDoacao == 2): ?>
                                                label-danger font-branco border-none
                                              <?php else: ?>
                                                label-warning font-branco border-none
                                              <?php endif;?>
                                              
                                              <?php else: ?>
                                                  label-warning font-branco border-none
                                               <?php endif;?>" href="#"><?php //echo $neto; ?><?php echo $this->painel_model->infoUser($neto)->nome; ?></a>
                                        
                                             </li>
                                  <?php endforeach;?> 
                                  </ul>
                                  
                                <?php endif;?>
                              
                              </li>

                          <?php endforeach; ?>
                          </ul>
                        </li>
                      <?php endif;?>

                  <?php endforeach;?>
                    </ul>
                  
                </div> 
                <?php else: ?>

                    <div class="alert alert-info">Você não tem downlines.</div>

                <?php endif;?>
                     
              </div>
            </div>
















                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Contain Section -->

