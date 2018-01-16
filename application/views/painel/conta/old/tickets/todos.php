      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="chat-room mt">
                  <aside class="mid-side">
                      <div class="chat-room-head">
                          <h3>Tickets</h3>
                          <form action="#" class="pull-right position">
                              <input type="text" placeholder="Search" class="form-control search-btn ">
                          </form>
                      </div>
                      <div class="room-desk">
                          <h4 class="pull-left">Tickets Abertos</h4>
                          <!-- <a href="#" class="pull-right btn btn-theme02">+ Create Room</a> -->
                          <a href="#" data-toggle="modal" data-target="#novoTicket" class="btn btn-theme04 pull-right">Abrir novo Ticket</a>

                          <!-- Modal -->
                          <div class="modal fade" id="novoTicket" tabindex="-1" role="dialog" aria-labelledby="novoTicket" aria-hidden="true">
                            <div class="modal-dialog">
                            <form action="" method="post" class="form-horizontal">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Abrir novo Ticket</h4>
                                </div>
                                <div class="modal-body">
                                  
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Assunto</label>
                                            <div class="col-md-6">
                                                <input type="text" name="assunto" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mensagem</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="mensagem" required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="submit"class="btn btn-primary" value="Abrir Ticket">
                                </div>
                              </div>
                            </div>
                            </form>
                          </div>              

                          <?php
                                if($tickets !== false):

                                    foreach($tickets as $ticket):

                                      if(StatusUser($ticket->status) != 'Fechado'): ?>
                          <div class="room-box">
                              <h5 class="text-primary"><a href="<?php echo base_url();?>backoffice/tickets/visualizar/<?php echo $ticket->id;?>"> <?php echo $ticket->titulo;?></a></h5>
                              <p><span class="label label-primary"><?php echo StatusUser($ticket->status);?></span>  | <span class="text-muted">ID</span> #<?php echo $ticket->id;?> | <span class="text-muted">Data :</span> <?php echo converter_data($ticket->data, "-", "/");?></p>
                          </div>
                           

                          <?php endif;
                                  endforeach; ?>

                                  <?php  else:?>
                            <div class="room-box">
                              <div class="alert alert-primary">Não há nenhum ticket aberto. Deseja abrir um? <a href="#" data-toggle="modal" data-target="#novoTicket" >Clique aqui</a></div>
                            </div><?php endif;?>
                                
                      </div>

                  </aside>
                  <aside class="right-side">
                      <div class="user-head">
                          <a href="#" class="chat-tools btn-theme"><i class="fa fa-cog"></i> </a>
                          <a href="#" class="chat-tools btn-theme03"><i class="fa fa-key"></i> </a>
                      </div>
                      <div class="invite-row">
                          <h4 class="pull-left">Tickets Fechados</h4>
                      </div>
                      <ul class="chat-available-user">


                         <?php if($fechados !== false):
                              foreach($fechados as $fechado):?>
                              <li>
                                  <a href="<?php echo base_url();?>backoffice/tickets/visualizar/<?php echo $fechado->id;?>">
                                      <!-- <img class="img-circle" src="assets/img/friends/fr-02.jpg" width="32"> -->
                                       <?php echo $fechado->titulo;?>
                                      <span class="text-muted"> <?php echo converter_data($fechado->data, "-", "/");?></span>
                                  </a>
                              </li>
                           <?php endforeach;
                             else: ?>
                            <div class="room-box">
                              <div class="alert alert-info">Não há nenhum ticket fechado.</div>
                            </div>

                       <?php endif; ?>
                          
                      </ul>
                  </aside>
              </div>
              <!-- page end-->			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->