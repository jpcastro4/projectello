
    <!-- Footer -->
    <!-- Javascripts -->

    <?php 

    $this->db->where('id',$this->native_session->get('user_id'));
    $user = $this->db->get('usuarios')->row();
    
    // $dataInicio = strtotime($user->cronometro);
    $dataFinal = strtotime($user->cronometro);
    $data = date('Y/m/d H:i:s',$dataFinal);

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    <script src="<?php echo base_url();?>assets/ajuda/javascripts/jquery.countdown.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/vendor/jquery.scrollTo.min.js"></script>

    <script src="<?php echo base_url();?>assets/ajuda/javascripts/vendor/url.min.js"></script> 

    <script src="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        jQuery(function($){

          $(document).ready( function(){

            $('.modal-trigger').leanModal();

            $('#cronometro').countdown('<?php echo $data; ?>', function(event) {
              $(this).html(event.strftime('%D d %H h %M m %S s'));
            });

            $('.userGet').on('click', function(e){ 
              e.preventDefault();
              //$(this).attr('data-tooltip','194');
              console.log( $(this).data('get') );
              $.get('<?php echo base_url("retorno/ajaxGetDownline") ?>', { id:$(this).data('get')}, function(data){
                $('#modalDownline').openModal();
                console.log('sucesso '+data.mensagem);
                $('#modalDownline #iduser').html(data.mensagem);

              },'json' )
              .fail(function(){
                console.log('fail');
                
              });
            });

            <?php if(isset($mensagem)):  ?>
            swal( "<?php echo $mensagem;?>", " ", "success");
            <?php endif;?>

            $('#modalDoacao #comprovante').click(function(e){
                e.preventDefault();

                swal({
                    title: "Você confirma o envio?",
                    text: "O comprovante será anexado a doação!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim!",
                    closeOnConfirm: true
                }, function(){

                  $('#modalDoacao form').submit();
                    
                });
                
            });  

            if( $('.verModal').val() == 'true'){
              jQuery("#modalSaque").modal('show');
            }

            if( window.url('?conta') == 'true'){
              jQuery("#modalAvisoConta").modal('show');
            }

            // $('#modalConfirmaDoacao').on('show.bs.modal', function (event) {
            //   var button = $(event.relatedTarget); // Button that triggered the modal
            //   var iddoacao = button.data('iddoacao'),
            //       comprovante = button.data('comprovante'); // Extract info from data-* attributes
            //   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            //   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            //   var modal = $(this);
            //       modal.find('.modal-body a#comprovante').attr('href', '<?php echo base_url('/uploads/comprovantes')?>/'+comprovante);
            //       modal.find('.modal-body a#comprovante img').attr('src','<?php echo base_url('/uploads/comprovantes')?>/'+comprovante);
            //       modal.find('.modal-body input#id_doacao').val(iddoacao);
            // });

            $('.menu-icon-mob-open').on('click', function(){
                var sidebar = $('#sidebar');   
                sidebar.addClass('open');
            });

            $('.menu-icon-mob-close').on('click', function(){
                var sidebar = $('#sidebar');   
                sidebar.removeClass('open');

            });

                           
          });

        });
                            
    </script> 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $( "#draggable" ).draggable();
      });
    </script>


    <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
-->

  <script>    
  // $('.contact-map').click(function(){
  
  //     //google map in tab click initialize
  //     function initialize() {
  //         var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
  //         var mapOptions = {
  //             zoom: 11,
  //             scrollwheel: false,
  //             center: myLatlng,
  //             mapTypeId: google.maps.MapTypeId.ROADMAP
  //         }
  //         var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  //         var marker = new google.maps.Marker({
  //             position: myLatlng,
  //             map: map,
  //             title: 'DashGum Admin Theme!'
  //         });
  //     }
  //     google.maps.event.addDomListener(window, 'click', initialize);
  // });

  function searchZip(){

            var siteUrl = 'http://correiosapi.apphb.com/cep/',
                cep = $('input[name="cep"]').val();

            // alert(cep);

            $.ajax({
                url: siteUrl+cep,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                statusCode: {
                    200: function(data) { 
                        //console.log(data);
                        $('input[name="rua"]').val(data.logradouro);
                        $('input[name="bairro"]').val(data.bairro);
                        $('input[name="cidade"]').val(data.cidade);
                        $('input[name="estado"]').val(data.estado);
                     } // Ok
                    ,400: function(msg) { 
                        console.log(msg);
                        //alert(msg);
                    } // Bad Request
                    ,404: function(msg) {
                        console.log("CEP não encontrado!!");
                        //alert("CEP não encontrado!!");
                    } // Not Found
                }

            });

        }

  </script> 

  <script src="<?php echo base_url();?>/assets/ajuda/javascripts/vendor/jquery.maskedinput.min.js" type="text/javascript"></script>
  <script>
    jQuery(function($){
      $("#data").mask("99/99/9999");
      $("#celular").mask("(99) 99999-999?9");
      $("#cpf").mask("999.999.999-99");
  });
  </script> 

<script>

 $(document).ready(function(){

    $('input.dia-check').on('change', function (e) {
        if ($('input.dia-check:checked').length > 3) {
            $(this).prop('checked', false);
            alert("Escolha apenas 3");
        }
    });

    $('input.hora-check').on('change', function (e) {
        if ($('input.hora-check:checked').length > 3) {
            $(this).prop('checked', false);
            alert("Escolha apenas 3");
        }
    });

});
</script>


    
  

  </body>
</html>