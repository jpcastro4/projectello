<!-- DARK footer
    ================================================== -->

    <footer class="section-footer bg-inverse" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="media">
              <div class="media-left">
                <img width="90" src="<?php echo base_url()?>assets/index/img/logo.png">
              </div>
              <small class="media-body media-bottom">
                &copy; Now X - Ajuda Mútua. <br>
                Doações espontâneas.
              </small>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <ul class="nav nav-inline">
              <!-- <li class="nav-item">
                <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
              <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a></li>
              <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/bootbox-page/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/bo/assets/js/jquery.countdown.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/ajuda/jquery.ui.touch-punch.min.js"></script>

    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>

    <script type="text/javascript">
      
      $(document).ready(function(){

            $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
              $this.html(event.strftime('%H:%M:%S'));
            });
          });


            $( "#draggable" ).draggable();

            <?php if(isset($mensagem) ):  ?>
            //swal( '<?php echo $mensagem;?>', ' ', 'success');
            <?php endif;?>

            <?php if(isset($mensagem_erro)):  ?>
            //swal( '<?php echo $mensagem_erro;?>', ' ', 'error');
            <?php endif;?>

        setTimeout(function() {
            $(".alert").fadeOut();
        }, 3000);

        $('.marcarPresenca').on('click', function(e){
           //alert( $(this).attr('data-idUser') );

          e.preventDefault();

                var value = $(this).attr('data-idUser');

                $.post('<?php echo base_url("ajax_functions/marcarPresenca")?>', { user_id : value }, function(data){
                    console.log(data);  
                    if(data.success == 'true'){
                        
                        swal('Sucesso', data.mensagem, 'success');
                    }

                    if(data.success == 'false'){

                        swal('Erro', data.mensagem, 'error');
                    }
                    
                },'json')
               .fail(function(data){

                    swal('Erro', 'Tente novamente mais tarde', 'error');
                    console.log(data.responseText);

               });
        });

        $('.accessUser').on('click', function(e){
          //alert( $(this).attr('data-idUser') );

          e.preventDefault();

                var value = $(this).attr('data-idUser');

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

        $('#modalConta').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('idbanco'); 

            if( recipient != undefined ){

                var modal = $(this);

                $.get('<?php echo base_url() ?>ajax_functions/getBanco/'+recipient, function(data){

                    

                },'json').done(function(data){

                    modal.find('form').append('<input type="hidden" name="id" id="id" />')
                    modal.find('input#banco').val(data.banco)
                    modal.find('input#agencia').val(data.agencia)
                    modal.find('input#op').val(data.op)
                    modal.find('input#conta').val(data.conta)
                    modal.find('input#titular').val(data.titular)
                    modal.find('input#tipo_conta').val(data.tipo_conta)
                    modal.find('input#cpfTitular').val(data.cpfTitular)
                    modal.find('input#id').val(recipient)

                }).fail(function(data){

                    swal('Erro', 'Tente novamente mais tarde', 'error');
                    console.log(data.responseText);

                });
            }
            
            
         })

        $('#modalConta').on('hide.bs.modal', function (event) {

            var modal = $(this);

            modal.find('input').val('')

         })

        $('#modalSenha').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('#idUser').text('Mudando senha do posicionamento '+recipient)
            modal.find('form').append('<input type="hidden" name="idUser" id="id" />')
            modal.find('input#id').val(recipient)
            
         })

        $('#modalSenha').on('hide.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('input#id').remove()
            modal.find('input#senha').val('')

         })



        $('#modalTelefone').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('#idUser').text('Mudando telefone '+recipient)
            modal.find('form').append('<input type="hidden" name="idUser" id="id" />')
            modal.find('input#id').val(recipient)
            
         })

        $('#modalTelefone').on('hide.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('id');

            var modal = $(this);

            modal.find('input#id').remove()
            modal.find('input#telefone').val('')

         })




        $('#modalDoacao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('iddoacao'); 

            var modal = $(this);

            modal.find('form').append('<input type="hidden" name="idDoacao" id="id" />')
            modal.find('input#id').val(recipient)
            
         })

        $('#modalConfirma').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('iddoacaoconfirma');

            if( recipient != undefined ){

                var modal = $(this);

                modal.find('form').append('<input type="hidden" name="idDoacao" id="id" />')
                modal.find('input#id').val(recipient)

                $.get('<?php echo base_url() ?>ajax_functions/getDoacao/'+recipient, function(data){

                },'json').done(function(data){

                    modal.find('#comprovante').append('<img width="100%" class="responsive" />')
                    var linkComprovante = '<?php echo base_url()?>uploads/comprovantes/'+data.comprovante
                    modal.find('#comprovante img').attr('src',linkComprovante)
                    modal.find('input#id').val(recipient)

                }).fail(function(data){

                    swal('Erro', 'Tente novamente mais tarde', 'error');
                    console.log(data.responseText);

                });
            }             
           
            
         })

        $('#modalConfirma').on('hide.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var recipient = button.data('iddoacaoconfirma');

            var modal = $(this);

            modal.find('#comprovante img').remove()
            modal.find('input#id').remove()            
         })


      });
    </script>

  </body>
</html>