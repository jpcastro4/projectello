      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="chat-room mt">
                  <aside class="mid-side">
                    <?php
                            if($ticket !== false){
                            ?>
                      <div class="chat-room-head">
                          <h3>Ticket: <?php echo $ticket->titulo;?></h3>
                          <!-- <form action="#" class="pull-right position">
                              <input type="text" placeholder="Search" class="form-control search-btn ">
                          </form> -->
                      </div>

                      <?php
                            foreach($ticket_mensagens as $mensagem){
                        ?>
                      
                      <div class="group-rom">
                          <div class="first-part <?php echo ($mensagem->user == 1) ? 'out' : 'odd';?> "><?php echo ($mensagem->user == 1) ? 'Você' : 'Administração';?> </a></div>
                          <div class="second-part"><?php echo $mensagem->mensagem; ?></div>
                          <div class="third-part"><?php echo date('d/m/Y H:i:s', $mensagem->data);?></div>
                      </div>
                      <?php
                            }
                        ?>

                      <?php
                        }else{
                            echo '<div class="alert alert-danger text-center">Você não tem acesso a esse ticket ou ele não existe.</div>';
                        }
                        ?>

                      <footer>
                      <form action="" method="post">
                          <div class="chat-txt">
                              <input type="text" name="resposta" class="form-control">
                          </div>
                          <div class="btn-group hidden-sm hidden-xs">
                              <!-- <button type="button" class="btn btn-white"><i class="fa fa-meh-o"></i></button>
                              <button type="button" class="btn btn-white"><i class=" fa fa-paperclip"></i></button> -->
                          </div>
                          <input type="submit" name="submit" class="btn btn-theme" value="Enviar">
                      </footer>
                      </form>
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
