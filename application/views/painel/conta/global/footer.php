  <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.css">
    <script src="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('button[name="idUser"]').on('click',function(e){
                e.preventDefault();

                var value = $(this).val();

                $.post('<?php echo base_url("ajax_functions/navegaConta")?>', { user_id : value }, function(data){
                        console.log(data);  
                    if(data.success == 'true'){
                        
                        window.location.href = data.redirect
                    }

                    if(data.success == 'false'){

                        console.log(data);

                        swal('Erro', data.mensagem, 'error');
                    }
                    
                },'json')
               .fail(function(data){

                    swal('Erro', 'Tente novamente mais tarde', 'error');
                    console.log(data.responseText);

               });

            });

            $("#viewPhoto").on('change', function(){

                var value = $(this).val();

                $.post('<?php echo base_url("ajax_functions/viewPhoto")?>', { viewPhoto : value }, function(data){
                    console.log(data);  
                    
                    if(data.success == 'true'){
                        
                        swal('Sucesso', data.mensagem, 'success');
                        if(value == 1){
                            $("#viewPhoto").val('0');
                        }

                        if(value == 0){
                            $("#viewPhoto").val('1');
                        }
                        
                    }

                    if(data.success == 'false'){

                        console.log(data);

                        swal('Erro', data.mensagem, 'error');
                    }
                   
                    
                },'json')
               .fail(function(data){

                    swal('Erro', 'Tente novamente mais tarde', 'error');
                    console.log(data.responseText);

               });
            })
        });
    </script>
      
    </script><script src="<?php echo base_url();?>/assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
