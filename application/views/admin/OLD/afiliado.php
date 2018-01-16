        

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Usuários
                                <small>perfil & estatísticas</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('boadmin/setBlocks');?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url('boadmin/usuarios');?>">Usuários</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Home</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PROFILE SIDEBAR -->
                                    <div class="profile-sidebar">
                                        <!-- PORTLET MAIN -->
                                        <div class="portlet light profile-sidebar-portlet ">
                                            <!-- SIDEBAR USERPIC -->
                                            <div class="profile-userpic " >
                                                <img style="border: 3px solid <?php echo ( $usuario->validado == 0 )? 'red': 'green'; ?>" src="<?php echo base_url();?>assets/admin/assets/pages/media/profile/avatar.png" class="img-responsive" alt=""> </div>
                                            <!-- END SIDEBAR USERPIC -->
                                            <!-- SIDEBAR USER TITLE -->
                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name"> <?php echo $usuario->id; ?> - <?php echo $usuario->nome; ?> </div>
                                                <div class="profile-usertitle-job"><a target="_blank" href="<?php echo base_url() ?>linkunico/amigo/<?php echo $usuario->login; ?>"> <?php echo $usuario->login; ?> </a></div>
                                            </div>
                                            <!-- END SIDEBAR USER TITLE -->
                                            <!-- SIDEBAR BUTTONS -->
                                            <div class="profile-userbuttons">
                                                <button type="button" class="btn btn-circle green btn-sm">Nível <?php echo $usuario->nivel; ?></button>
                                                <button type="button" class="btn btn-circle red btn-sm">Ciclo <?php echo $usuario->ciclo; ?></button>
                                            </div>
                                            <!-- END SIDEBAR BUTTONS -->
                                            <!-- SIDEBAR MENU -->
                                            <div class="profile-usermenu">
                                                <ul class="nav">
                                                    <li class="<?php if(!empty($pg_usuario) ){ echo 'active'; } ?>">
                                                        <a href="<?php echo base_url(); ?>boadmin/usuario/<?php echo $usuario->id; ?>">
                                                            <i class="icon-home"></i> Geral </a>
                                                    </li>
                                                    <li class="<?php if(!empty($pg_editausuario) ){ echo 'active'; } ?>">
                                                        <a href="<?php echo base_url(); ?>boadmin/usuario/editar/<?php echo $usuario->id; ?>">
                                                            <i class="icon-settings"></i> Conta </a>
                                                    </li>
                                                    <li class="<?php if(!empty($pg_redeusuario) ){ echo 'active'; } ?>">
                                                        <a href="<?php echo base_url(); ?>boadmin/usuario/rede/<?php echo $usuario->id; ?>">
                                                            <i class="icon-info"></i> Rede </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- END MENU -->
                                        </div>
                                        <!-- END PORTLET MAIN -->
                                        <!-- PORTLET MAIN -->
                                                <div class="portlet light ">
                                                    <div class="portlet-body">
                                                        <div class="margin-20 profile-desc-link">
                                                            <i class="fa fa-calendar"></i>
                                                            <a href="#">Desde <?php echo date('d/m/Y',strtotime($usuario->data_cadastro)); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portlet light ">
                                                    <div class="portlet-body">
                                                        <!-- <div class="margin-20 profile-desc-link">
                                                            <i class="fa fa-group"></i>
                                                            <a href="<?php echo base_url()?>boadmin/usuario/<?php echo $this->admin->indicador($usuario->id); ?>"><?php echo $this->admin->indicador($usuario->id).' - '.$this->admin->infoUser($this->admin->indicador($usuario->id))->nome; ?></a>
                                                        </div> -->
                                                        <div class="margin-20 profile-desc-link">
                                                            <div class="profile-usertitle-job">Uplines</div>

                                                            <!-- <pre> -->
                                                                <?php //echo var_dump($this->admin->Uplines($usuario->id));?>
                                                            <!-- </pre> -->

                                                            <?php $uplines = $this->admin->Uplines($usuario->id); ?>

                                                            <?php foreach ($uplines as $upline): ?>
                                                                 <p><a href="<?php echo base_url()?>boadmin/usuario/<?php echo $upline; ?>"><?php echo $upline.' - '.$this->admin->infoUser($upline)->nome; ?></a></p>
                                                            <?php endforeach;?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- BEGIN PORTLET -->
                                    </div>
                                    <!-- END BEGIN PROFILE SIDEBAR -->
                                    <!-- BEGIN PROFILE CONTENT -->
                                    <div class="profile-content">
                                        <div class="row">
                                            
                                            <!-- END PORTLET MAIN -->
                                            <div class="col-md-7">
                                                
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Atividade</span>
                                                            <span class="caption-helper ">  <?php $dia = $this->admin->extraInfoUser($usuario->id)->ultima_atvidade; echo date('d/m/Y H:i',strtotime($dia)); ?></span>
                                                        </div>
                                                        <!-- <div class="actions">
                                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                                    <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                                    <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                                    <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="portlet-body margin-bottom-30">
                                                        <div class="row number-stats margin-bottom-30">
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <div class="stat-left">
                                                                    <div class="stat-chart">
                                                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                                        <div id="sparkline_bar"></div>
                                                                    </div>
                                                                    <div class="stat-number">
                                                                        <div class="title"> Doado </div>
                                                                        <div class="number"> <?php echo $this->admin->extraInfoUser($usuario->id)->total_doado; ?> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <div class="stat-right">
                                                                    <div class="stat-chart">
                                                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                                        <div id="sparkline_bar2"></div>
                                                                    </div>
                                                                    <div class="stat-number">
                                                                        <div class="title"> Recebido </div>
                                                                        <div class="number"> <?php echo $this->admin->extraInfoUser($usuario->id)->total_recebido; ?> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $doacoes = $this->admin->doacoesRecebidas($usuario->id);

                                                                if($doacoes != false): ?>
                                                        <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
                                                            
                                                            <table class="table table-hover table-light">
                                                                <thead>
                                                                    <tr class="uppercase">
                                                                        <th colspan="2"> DOADOR </th>
                                                                        <th> DIA </th>
                                                                        <th> VALOR </th>
                                                                    </tr>
                                                                </thead>

                                                                
                                                                <?php foreach($doacoes as $doacao): ?>
                                                               
                                                               <tr>
                                                                    <td class="fit">
                                                                        <img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"> </td>
                                                                    <td>
                                                                        <?php echo $this->admin->infoUser($doacao->id_doador)->nome; ?> #<?php echo $doacao->id_doador; ?>
                                                                    </td>
                                                                    <td> <?php echo date('d/m H:i', strtotime($doacao->data_envio)); ?> </td>
                                                                    <td><a href="<?php echo base_url()?>uploads/comprovantes/<?php echo $doacao->comprovante; ?>" target="_blank" class="primary-link">  <?php echo $doacao->valor; ?> </a></td>
                                                                </tr>

                                                                <?php endforeach; ?>
                                                                    
                                                            </table>
                                                                
                                                        </div>
                                                        <?php else: ?>
                                                                    
                                                            <span class="alert alert-info btn-block text-center">Nenhuma doação recebida</span>

                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END PORTLET -->
                                            </div>
                                            <div class="col-md-5">
                                                <!-- BEGIN PORTLET -->
                                                <div class="portlet light ">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption caption-md">
                                                            <i class="icon-globe theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Extrato</span>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_1_1" data-toggle="tab"> System </a>
                                                            </li>
                                                            <!-- <li>
                                                                <a href="#tab_1_2" data-toggle="tab"> Activities </a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <!--BEGIN TABS-->
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_1_1">
                                                                <div class="scroller" style="height: 450px;" data-always-visible="1" data-rail-visible="0">
                                                                    <ul class="feeds">
                                                                    <?php $extrato = $this->admin->ExtratoUsuario($usuario->id);

                                                                    foreach($extrato as $atividade): 
                                                                        $user = $this->admin->infoUser($atividade->id_user); ?>
                                                                        <li>
                                                                            <div class="col1">
                                                                                <div class="cont">
                                                                                    <div class="cont-col1">
                                                                                        <div class="label label-sm label-success">
                                                                                            <small><?php echo $atividade->id;?></small>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="cont-col2">
                                                                                        <div class="desc"><small><?php echo $user->nome; ?> <?php echo $atividade->descricao;?></small>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col2">
                                                                                <div class="date"> <?php echo date('d/m',strtotime($atividade->data));?></div>
                                                                            </div>
                                                                        </li>
                                                                    <?php endforeach;?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="tab-pane" id="tab_1_2">
                                                                <div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                                    <ul class="feeds">
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New order received </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> 10 mins </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <div class="col1">
                                                                                <div class="cont">
                                                                                    <div class="cont-col1">
                                                                                        <div class="label label-sm label-danger">
                                                                                            <i class="fa fa-bolt"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="cont-col2">
                                                                                        <div class="desc"> Order #24DOP4 has been rejected.
                                                                                            <span class="label label-sm label-danger "> Take action
                                                                                                <i class="fa fa-share"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col2">
                                                                                <div class="date"> 24 mins </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:;">
                                                                                <div class="col1">
                                                                                    <div class="cont">
                                                                                        <div class="cont-col1">
                                                                                            <div class="label label-sm label-success">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cont-col2">
                                                                                            <div class="desc"> New user registered </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col2">
                                                                                    <div class="date"> Just now </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <!--END TABS-->
                                                    </div>
                                                </div>
                                                <!-- END PORTLET -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROFILE CONTENT -->
                                </div>
                            </div>
                            <div class="row ">
                                

                                <div class="clearfix">
                                  
                                      <div class="tree-responsive zoomViewport" >
                                         
                                      <?php $indicados = $this->admin->Familia( $usuario->id ); ?>

                                      <?php if(!empty($indicados) ):  ?>

                                        <div class="tree row zoomContainer" id="draggable">
                                          <ul>
                                          <?php foreach($indicados as $indicador => $filho): ?>
                                              <li class="indicador" ><div class="avatar-frame"><img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png"></div><a href="#"><?php //echo $indicador; ?><?php echo $this->admin->infoUser($indicador)->nome ?></a>
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
                                                                       <?php endif;?>" href="#"><?php echo $filhoId; ?> - <?php echo $this->admin->infoUser($filhoId)->nome; ?></a>
                                                      
                                                      <?php $indicadosNetos = $this->admin->RedeNetos( $filhoId ); ?>
                                                          
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
                                                                       <?php endif;?>" href="#"><?php echo $neto; ?> - <?php echo $this->admin->infoUser($neto)->nome; ?></a>
                                                                
                                                                <?php $indicadosBisnetos = $this->admin->RedeBisnetos( $neto ); ?>
                                                          
                                                                <?php  if($indicadosBisnetos == null) :  ?>

                                                                <?php else:?>
                                                                <ul class="ciclo3" >
                                                                <?php foreach($indicadosBisnetos as $bisneto): ?>

                                                                  <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($bisneto); ?>
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
                                                                       <?php endif;?>" href="#"><?php echo $bisneto; ?> - <?php echo $this->admin->infoUser($bisneto)->nome; ?></a>

                                                                        <?php $indicadosTataranetos = $this->admin->RedeTataranetos( $bisneto ); ?>
                                                                  
                                                                        <?php  if($indicadosTataranetos == null) :  ?>

                                                                        <?php else:?>
                                                                        <ul class="ciclo4" >
                                                                        <?php foreach($indicadosTataranetos as $tataraneto): ?>
                                                                            <?php $doacaoDownline = $this->painel_model->verificaDoacaoDownline($tataraneto); ?>
                                                                            <li >
                                                                            <div class="avatar-frame">
                                                                            <img class="user-pic" src="<?php echo base_url('assets/admin'); ?>/assets/pages/media/profile/avatar.png">
                                                                            </div>

                                                                            <a class="<?php if(!empty($doacaoDownline) ) : 

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
                                                                       <?php endif;?>" href="#"><?php echo $tataraneto; ?> - <?php echo $this->admin->infoUser($tataraneto)->nome; ?></a>
                                                                                    </li>
                                                                        <?php endforeach;?> 
                                                                        </ul>
                                                                        <?php endif;?>

                                                                    </li>
                                                                <?php endforeach;?> 
                                                                </ul>
                                                                <?php endif;?>
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
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>


        </div>
        <!-- END CONTAINER -->
