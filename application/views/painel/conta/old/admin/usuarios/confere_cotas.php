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
                                <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Cotas </span>
                            </div>
                            <div class="tools"> 
                            </div>

                        </div>

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


                            
                            </form>
                        </div>
                        <?php if(isset($message)) echo $message; ?>
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
