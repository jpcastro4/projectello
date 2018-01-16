
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Bilhetes</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-smile-o"></i>
                            <a href="#">Bilhetes</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet form">


                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-smile-o"></i>Compre seu número da sorte
                                </div>
                            </div>
                            <div class="portlet-body">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <form action="<?php echo base_url('bilhetes/comprar');?>" method="post">
                                <p class="text-center">Segue abaixo o bilhete sorteado para você, faça sua compra agora mesmo e garanta-o já!</p>

                                <h1 class="text-center"><?php echo $numero_sorte;?></h1>
                                <input type="hidden" name="numero" value="<?php echo $numero_sorte;?>">
                                <p align="center"><input type="submit" name="submit" value="Reservar!" class="btn btn-primary"></p>

                            </form>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>


                </div>
                 <!-- PORTLET LIGHT -->


                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!--Cooming Soon...-->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
