<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/faturas');?>">Faturas</a>
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Cotas</span>
                            </div>
                            <div class="tools"> 
                            </div>

                        </div>
                        <div class="portlet-body">
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
                                     Qtd. Cotas
                                </th>
                                <th>
                                     Primeiro Recebimento
                                </th>
                                <th>
                                     Utimo recebimento
                                </th>
                                
                             <!--    <th>
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
                                     Saldo disponível
                                </th>
                                <th>
                                     Saldo bloqueado
                                </th>
                                <th>
                                     Valor Pago
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if( $cotas !== false){
                                foreach($cotas as $cota){


                                if( $cota->status == 1){ //SOMENTE COTAS ATIVAS



                                    $usuario = $this->admin->InformacaoUsuario( $cota->id_user );

                                    $indicadosNivel1 = $this->admin->ArvoreIndicacao( $cota->id_user, 1);
                                    $indicadosNivel2 = $this->admin->ArvoreIndicacao( $cota->id_user, 2);
                                    $indicadosNivel3 = $this->admin->ArvoreIndicacao( $cota->id_user, 3);
                                    $indicadosNivel4 = $this->admin->ArvoreIndicacao( $cota->id_user, 4);

                                    if ( $cota->primeiro_recebimento > strtotime('05/05/2016') ){ //SOMENTE COTAS ATIVADAS ANTES DO DIA 05 DE MAIO (CICLO DE 10DIAS)


                                    
                            ?>
                            <tr>
                                <td></td>
                                <td>
                                    #<?php echo $cota->ID;?>
                                </td>
                                <td>
                                     <?php echo '#'.$cota->id_user.' - '.$usuario->nome; ?>
                                </td>
                                <td>
                                     <?php echo $cota->quantidade;?>
                                </td>
                                <td>
                                     <?php echo date('d/m/Y', $cota->primeiro_recebimento);?>
                                </td>
                                <td>
                                     <?php echo date('d/m/Y', $cota->ultimo_recebimento); ?>
                                </td>
                              <!--   <td>
                                     <?php echo $indicadosNivel1; ?>
                                </td>
                                <td>
                                     <?php echo $indicadosNivel2; ?>
                                </td>
                                <td>
                                     <?php echo $indicadosNivel3; ?>
                                </td>
                                <td>
                                     <?php echo $indicadosNivel4; ?>
                                </td> -->
                                <td>
                                     <?php echo $usuario->saldo_disponivel; ?>
                                </td>
                                <td>
                                     <?php echo $usuario->saldo_bloqueado; ?>
                                </td>
                                <td>
                                     <?php echo $cota->valor_pago; ?>
                                </td>
                                <td>
                                    <?php
                                    if($cota->status == 1){
                                    ?>
                                     <a href="<?php echo base_url('backoffice/geadmin/usuarios/visualizar/'.$cota->id_user);?>" target="_blank">Ver usuario</a>
                                    <?php } ?>

                                </td>
                            </tr>
                                                        
                            <?php

                                    }
                                }

                                }
                            }
                            ?>

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#cotas').DataTable( {
                                
                                "pagingType": "full_numbers"
                            } );
                        } );

                    </script>

                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
