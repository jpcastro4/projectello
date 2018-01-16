<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/faturas');?>">Faturas</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todas Faturas
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-lg-12">

                
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Cotas </span>
                            </div>
                            <div class="tools"> 
                            </div>

                        </div>

                        <?php if(isset($message)) echo $message; ?>

                        <div class="portlet-body">

                             <form id="corrigeCotas" method="post" action="#">

                              <div class="form-group mt mb">
                                    <input class="btn btn-green" name="submit" type="submit" value="Corrigir selecionados">
                                </div>
                 <!--        <div class="row">
                        <pre>
                            <?php //var_dump($cotas) ?>
                        </pre>
                        </div> -->


                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th></th>
                                <th>
                                    ID
                                </th>
                                <th>
                                     Usuário
                                </th>
                                <th>
                                     Cotas
                                </th>
                             <!--    <th>
                                     Primeiro Recebimento
                                </th>
                                <th>
                                     Utimo recebimento
                                </th>
                                
                                <th>
                                     Indicados Nivel 1/ Saldo
                                </th>
                                <th>
                                     Indicados Nivel 2 / Saldo
                                </th>
                                <th>
                                     Indicados Nivel 3 / Saldo
                                </th>
                                <th>
                                     Indicados Nivel 4 / Saldo
                                </th> -->
                                <th>
                                     Saldo disp
                                </th>
                                <th>
                                     Saldo bloq
                                </th>
                             <!--    <th>
                                     Valor Pago
                                </th> -->

                                <th>
                                     Rend Errado </br><small>16,17e 19 de Maio</small>
                                </th>
                                <th>
                                     Rend Correto </br><small>16 a 20 de Maio</small>
                                </th>
                                <th>
                                     Novo saldo
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            if( $cotas !== true){
                                foreach($cotas as $cota){

                                //if( $cota->status == 1){ //SOMENTE COTAS ATIVAS

                                    $usuario = $this->admin->InformacaoUsuario( $cota->id_user );

                                    $indicadosNivel1 = $this->admin->ArvoreIndicacao( $cota->id_user, 1);
                                    $indicadosNivel2 = $this->admin->ArvoreIndicacao( $cota->id_user, 2);
                                    $indicadosNivel3 = $this->admin->ArvoreIndicacao( $cota->id_user, 3);
                                    $indicadosNivel4 = $this->admin->ArvoreIndicacao( $cota->id_user, 4);

                                //if ( $cota->primeiro_recebimento >= strtotime('14-05-2016') && $cota->primeiro_recebimento <= strtotime('19-05-2016')){ //SOMENTE COTAS ATIVADAS ANTES DO DIA 05 DE MAIO (CICLO DE 10DIAS)

                            ?>

                            <tr>
                                <td><input class="cotas"type="checkbox" name="cota[]" value="<?php echo $cota->ID;?>" ></td>
                                <td>
                                    #<?php echo $cota->ID;?>
                                </td>
                                <td>
                                     <?php echo '#'.$cota->id_user.' - '.$usuario->nome; ?>
                                </td>
                                <td class="tooltips"  data-container="body" data-placement="top" data-html="true" data-original-title="<?php echo date('d/m/Y', $cota->primeiro_recebimento);?>">
                                     <?php echo $cota->quantidade;?>
                                </td>

                             <!--    <td>
                                     <?php //echo date('d/m/Y', $cota->primeiro_recebimento);?>
                                </td>
                                <td>
                                     <?php //echo date('d/m/Y', $cota->ultimo_recebimento); ?>
                                </td>
                                <td>
                                     <?php //echo $indicadosNivel1; ?>
                                </td>
                                <td>
                                     <?php //echo $indicadosNivel2; ?>
                                </td>
                                <td>
                                     <?php //echo $indicadosNivel3; ?>
                                </td>
                                <td>
                                     <?php //echo $indicadosNivel4; ?>
                                </td> -->
                                <td>
                                     <?php echo $usuario->saldo_disponivel; ?>
                                </td>
                                <td>
                                     <?php echo $usuario->saldo_bloqueado; ?>
                                </td>
                              <!--   <td>
                                     <?php //echo $cota->valor_pago; ?>
                                </td> -->

                                <?php 

                                     $rend_ant_diario = ( $cota->quantidade * 133);
                                     $total_errado = $rend_ant_diario * 3 ;

                                ?>
                                <td class="tooltips"  data-container="body" data-placement="top" data-html="true" data-original-title="O desconto é <?php echo $cota->quantidade?> x 133 x 3 dias (16 a 20 de maio)">
                                     <?php
                                        echo  $total_errado;
                                     ?>
                                </td>

                                <?php 

                                     $rendimento_correto = ( $cota->quantidade * randomWithDecimal(13.33, 13.33, 2));
                                     $total_correcao = $rendimento_correto * 5;

                                     $novo_saldo = ( $usuario->saldo_disponivel - $total_errado ) + $total_correcao; 
                                ?>

                                <td >
                                     <?php
                                        echo  $total_correcao;
                                     ?>
                                </td>
                                <td class="tooltips" data-container="body" data-placement="top" data-html="true" data-original-title=" Rendimento Correto é <?php echo $cota->quantidade?> x 13,33 x 5 dias (16 a 20 de maio) ### O novo saldo é <?php echo $usuario->saldo_disponivel?> - <?php echo $total_errado; ?> + <?php echo $total_correcao; ?> ">
                                     <?php 
                                        echo $novo_saldo; 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($cota->status == 1){
                                    ?>
                                     <a href="<?php echo base_url('geadmin/usuarios/visualizar/'.$cota->id_user);?>" target="_blank">Ver</a>
                                    <?php } ?>

                                </td>
                            </tr>
                                                        
                            <?php

                                    //}
                                //}

                                }
                            }
                            ?>

                            
                            </tbody>

                             </table>

                        </div>
                    </div>
                    </form>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
