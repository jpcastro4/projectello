    </div>
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

    <script src="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/application-985b892b.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/jquery.countdown.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/vendor/jquery.scrollTo.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/toast.css">
    <script src="<?php echo base_url();?>assets/ajuda/toast.js"></script>

    <script src="<?php echo base_url();?>assets/ajuda/javascripts/vendor/url.min.js"></script> 
    <script src="<?php echo base_url();?>assets/ajuda/javascripts/bootstrap-tour.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        jQuery(function($){

          $(document).ready( function() { 

            $('#cronometro').countdown('<?php echo $data; ?>', function(event) {
              $(this).html(event.strftime('<i class="pull-left fa fa-clock-o"></i>%D d %H h %M m %S s'));
            });

          
            <?php if(isset($mensagem)):  ?>
            swal( "<?php echo $mensagem;?>", " ", "success");
            <?php endif;?>

            <?php if(isset($logado)):  ?>
            swal( "<?php echo $logado;?>", " ", "success");
            <?php endif;?>

            
            <?php if(  $this->painel_model->infoUser($this->native_session->get('user_id') )->validado  == 0): ?>
              jQuery("#modalEmail").modal('show');

              $('#modalEmail form').submit(function(e){
                e.preventDefault();

                var email = $('#modalEmail form input#email').val();

                $.post('<?php echo base_url()?>ativacao/<?php echo $this->native_session->get("user_id"); ?> ', { emailPost : email }, function(data){

                    $('.resposta').html('<div class="alert alert-success text-center">Enviamos o email pra você.</div>');
                    toast('Enviado com sucesso', 4000);

                }).done(function(){
                    toast('Acesse seu email para validar', 4000);
                }).fail(function(){
                    toast('Falha. Tente mais tarde', 4000);
                });
            });

            <?php endif;?>
            



            var tour = new Tour({
              steps: [
              {
                element: "#link-direto",
                title: "O seu link antigo ainda funciona",
                content: "Através dele você pode cadastrar especificamente abaixo de você.",
                placement: "auto",
                backdrop: true,
              },
              {
                element: "#link-unico",
                title: "Novo link de cadastro ÚNICO",
                content: "Esse link você pode usar para divulgar sua rede. Através dele o sistema procura uma vaga aberta na sua rede e cadastra seus downlines. Mais simples e mais fácil.",
                placement: "auto",
                backdrop: true,
              },
              {
                element: "#downline-aberto",
                title: "O primeiro da fila",
                content: "Seu link unico forma a fila de vagas abertas. Aqui você verá o seu downline ativo que tem vagas abaixo.",
                placement: "auto",
                backdrop: true,
              }
            ]});

            // Initialize the tour
            tour.init();

            // Start the tour
            tour.start();

            $('#startTour').click(function(e){
                e.preventDefault(); 
                tour.start();
            });


            $('#modalAviso').modal('show');

            $( "#draggable" ).draggable();

            if( $('.verModal').val() == 'true'){
              jQuery("#modalSaque").modal('show');
            }

            if( window.url('?conta') == 'true'){
              jQuery("#modalAvisoConta").modal('show');
            }

            $('#modalConfirmaDoacao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var iddoacao = button.data('iddoacao'),
                comprovante = button.data('comprovante'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
                modal.find('.modal-body a#comprovante').attr('href', '<?php echo base_url('/uploads/comprovantes')?>/'+comprovante);
                modal.find('.modal-body a#comprovante img').attr('src','<?php echo base_url('/uploads/comprovantes')?>/'+comprovante);
                modal.find('.modal-body input#id_doacao').val(iddoacao);
            });

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



  $("a#aba_notificacao").click(function(){

    $.ajax({

      url: "<?php echo base_url('painel/conta/atualiza_notificacao');?>",
      type: 'POST',

      success: function(callback){

        if(callback == 'true' || callback == '1'){

          $("#icone-notificacao").fadeOut();
        }
      }
    });
  });

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