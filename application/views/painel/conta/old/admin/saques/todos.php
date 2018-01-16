<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/saques');?>">Saques</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Todos os saques
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Todos os pedidos de saques</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">

                            <form action="" method="post">

                                <div class="row static-info">
                                    <div class="col-md-5 name">
                                         <select name="tf" class="form-control" required>
                                            <option value="1" selected>Somente pagos</option>
                                            <option value="2">Somente não pagos</option>
                                            <option value="4">Estornados</option>
                                            <option value="3">Todos</option>
                                         </select>
                                    </div>
                                    <div class="col-md-7 value">
                                         <input type="submit" name="submit" value="Filtrar" class="btn btn-primary">
                                    </div>
                                </div>


                            </form>

                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    Banco
                                </th>
                                <th>
                                    Agência
                                </th>
                                <th>
                                     Conta
                                </th>
                                <th>
                                     Tipo de conta
                                </th>
                                <th>
                                     Titular
                                </th>
                                <th>
                                     CPF
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                Bilhetes comprados
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                     Ação
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($saques !== false){
                                foreach($saques as $saque){
                            ?>
                            <tr>
                                <td>
                                    <?php echo BancoPorID($saque->banco);?>
                                </td>
                                <td>
                                    <?php echo $saque->agencia;?>
                                </td>
                                <td>
                                    <?php echo $saque->conta;?>
                                </td>
                                <td>
                                    <?php echo $saque->tipo_conta;?>
                                </td>
                                <td>
                                    <?php echo $saque->titular;?>
                                </td>
                                <td>
                                    <?php echo $saque->cpf;?>
                                </td>
                                <td>
                                     <?php echo $saque->valor;?>
                                </td>

                                <td>
                                    <?php echo $this->admin->TotalBilhetesComprados($saque->id_user); ?> bilhete(s)
                                </td>

                                <td>
                                    <?php
                                    if($saque->status == 0){
                                       echo '<font color="orange">Pendente</font>';
                                    }elseif($saque->status == 1){
                                        echo '<font color="green">Pago</font>';
                                    }else{
                                        echo '<font color="red">Estornado</font>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('backoffice/geadmin/saques/visualizar/'.$saque->id);?>">Visualizar</a>
                                    <?php
                                    if($saque->status == 0){
                                    ?>
                                    |
                                     <a href="<?php echo base_url('backoffice/geadmin/saques/pago/'.$saque->id);?>" onclick="if(!confirm('Caso continue, o pagamento será marcado como pago no B.O do afiliado. Tem certeza ?')) return false;">Marcar como pago</a>
                                    |
                                    <a href="<?php echo base_url('backoffice/geadmin/saques/estornar/'.$saque->id);?>">Estornar</a>
                                    <?php } ?>


                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
