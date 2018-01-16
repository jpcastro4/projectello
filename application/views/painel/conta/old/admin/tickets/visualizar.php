<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/tickets');?>">Tickets</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Visualizar Ticket
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-ticket font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                #<?php echo $ticket->id;?> - <?php echo $ticket->titulo;?>
                                </span>
                            </div>
                            <div class="pull-right">
                            <?php if($ticket->status != 2){ ?>
                            <a href="<?php echo base_url('backoffice/geadmin/tickets/fechar/'.$ticket->id);?>">Fechar Ticket</a>
                            <?php }elseif($ticket->status == 2){ ?>
                            <a href="<?php echo base_url('backoffice/geadmin/tickets/reabrir/'.$ticket->id);?>">Re-abrir Ticket</a>
                            <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portlet-body" id="chats">


                        <div class="scroller" style="height: 353px;" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="chats">

                                        <?php
                                        if($mensagens_ticket !== false){

                                            foreach($mensagens_ticket as $mensagem){
                                        ?>
                                        <li class="<?php echo ($mensagem->user == 0) ? 'out' : 'in';?>">
                                            <div class="message">
                                                <span class="arrow">
                                                </span>
                                                <a href="#" class="name">
                                                <?php echo ($mensagem->user == 0) ? 'Você' : $mensagem->nome;?> </a>
                                                <span class="datetime">
                                                em <?php echo date('d/m/Y H:i:s', $mensagem->data);?></span>
                                                <span class="body">
                                                <?php echo $mensagem->mensagem;?>
                                                </span>
                                            </div>
                                        </li>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <?php
                                if($ticket->status != 2){
                                ?>
                                <div class="chat-form">
                                <form action="" method="post">
                                    <div class="input-cont">
                                        <input class="form-control" name="resposta" type="text" placeholder="Escreva sua mensagem" style="width:97% !important"/>
                                    </div>
                                    <div class="btn-cont" style="margin-right:27px;">
                                        <span class="arrow">
                                        </span>
                                        <input type="submit" name="submit" class="btn blue icn-only" value="Enviar">
                                    </div>
                                    </form>
                                </div>

                                <?php } ?>

                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>