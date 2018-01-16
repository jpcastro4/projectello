<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('geadmin/usuarios');?>">Ciclos</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos os ciclos de cotas ativas
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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Ciclos </span>
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
                                <th>
                                     Primeiro Recebimento
                                </th>
                                <th>
                                     Utimo recebimento
                                </th>
                                <th>
                                     Valor pago
                                </th>
                                <th>
                                     Percentual
                                </th>
                                <th>
                                    Saldo Disponivel
                                </th>
                                <th>
                                     Conf
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
                                   
                                //if(  <= 15 ){ //SOMENTE COTAS ATIVAS

                                $usuario = $this->admin->InformacaoUsuario( $cota->id_user );


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

                                 <td>
                                     <?php echo date('d/m/Y', $cota->primeiro_recebimento);?>
                                </td>
                                <td>
                                     <?php echo date('d/m/Y', $cota->ultimo_recebimento); ?>
                                </td>
                                <td>
                                    <?php 

                                    //$dias = Recebimentos( date('Y-m-d', $cota->primeiro_recebimento - (60*60*24*8)/*-8dias*/ ) , config_site('validade_cotas')); //

                                    //echo $dias['ultimo_recebimento'] ;

                                    echo $cota->valor_pago; ?>
                                </td>

                                <td>
                                    <?php  

                                    $investido = (config_site('valor_cota')  * $cota->quantidade );
                                    $total_rendimento = ($investido * 2)*2;

                                    $total_bilhetes = ($cota->quantidade * 10.00)*2;

                                    $taxa_renovacao = $total_rendimento * (2.5 / 100);

                                    $taxa_saque = $total_rendimento * (10 / 100);

                                    $valor_a_pagar = $total_rendimento - $taxa_saque - $taxa_renovacao - $total_bilhetes;

                                    echo $valor_a_pagar;

                                    ;?>
                                </td>
                                <td>
                                    <?php echo $usuario->saldo_disponivel; ?>
                                </td>
                                <td>
                                    <?php
                                        echo $cota->expirada_conf;
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
