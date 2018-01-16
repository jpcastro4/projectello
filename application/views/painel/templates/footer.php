    <!-- Start Footer Section -->
    <footer class="main-footer">
      <div class="footer-copyright">
        © 2016 <a href="../dashboard_v1.html">Porish</a>
      </div>
      <div class="footer-right-text">
        All Rights Reserved.
      </div>
    </footer>
    <!--  Start Site Right Setting Section -->
    <div class="right-side-setting">
      <div class="icon-setting">
        <div class="icon-mainten icon-in-setting"><span class="icon_cog hi-icon" aria-hidden="true"></span></div>
      </div>
      <div class="color-change-setting">
        <!--  Color Section -->
        <h3 class="title-color">Colors</h3>
        <div class="border-setting"></div>
        <div class="color-section">
          <div class="both-color site_color_default active_color" data-site-color="cyan">
            <div class="first-color bg-cyan-900"> </div>
          </div>
          <div class="both-color" data-site-color="default">
            <div class="first-color bg-info"> </div>
          </div>
          <div class="both-color" data-site-color="deep-orange">
            <div class="first-color bg-deep-orange-900"> </div>
          </div>
          <div class="both-color" data-site-color="orange">
            <div class="first-color bg-orange-700"> </div>
          </div>
          <div class="both-color" data-site-color="dark-green">
            <div class="first-color bg-color-dark-green"> </div>
          </div>
          <div class="both-color" data-site-color="dark-cyan">
            <div class="first-color bg-cyan-800"> </div>
          </div>
          <div class="both-color" data-site-color="pink">
            <div class="first-color bg-pink-700"> </div>
          </div>
          <div class="both-color" data-site-color="gray">
            <div class="first-color bg-grey-500"> </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <!--  Fonts Section -->
        <h3 class="title-color margin-top-30">Fonts</h3>
        <div class="border-setting"></div>
        <div class="fonts-section">
          <div class="both-font site_font_default active_font" data-site-font="">
            <div class="first-font"></div>
          </div>
          <label>Dafault</label>
          <div class="clearfix"></div>
          <div class="both-font" data-site-font="fonts1">
            <div class="first-font"></div>
          </div>
          <label>Lato / Raleway</label>
          <div class="clearfix"></div>
          <div class="both-font" data-site-font="fonts2">
            <div class="first-font"></div>
          </div>
          <label>Source Sans Pro</label>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <h3 class="title-color margin-top-30">Templates</h3>
        <div class="border-setting"></div>
        <div class="darkcolor-section">
          <div class="both-dark active_color" data-dark-color="">
            <div class="first-dark color-light">Light</div>
          </div>
          <div class="both-dark" data-dark-color="gray">
            <div class="first-dark gray">Gray</div>
          </div>
        </div>
        <div class="clearfix"></div>
        <!--  Texture Section -->
        <h3 class="title-color margin-top-30">Background Image</h3>
        <div class="border-setting"></div>
        <div class="texture-section margin-top-30 texture-click">
          <input type="checkbox" id="rtl-checkbox" class="js-switch-small checkbox-texture" data-plugin="switchery" data-size="small"/>
          <label>Texture Background</label>
        </div>
        <div class="image-section">
          <div class="both-image default_texture active_texture" data-image-bg="texture2">
            <div class="first-image bg-texture2"> </div>
          </div>
          <div class="both-image" data-image-bg="texture9">
            <div class="first-image bg-texture9"> </div>
          </div>
          <div class="both-image" data-image-bg="texture1">
            <div class="first-image bg-texture1"> </div>
          </div>
          <div class="both-image" data-image-bg="texture8">
            <div class="first-image bg-texture8"> </div>
          </div>
          <div class="both-image" data-image-bg="texture10">
            <div class="first-image bg-texture10"> </div>
          </div>
          <div class="both-image icon-black" data-image-bg="texture11">
            <div class="first-image bg-texture11"> </div>
          </div>
          <div class="both-image icon-black" data-image-bg="texture5">
            <div class="first-image bg-texture5"> </div>
          </div>
          <div class="both-image icon-black" data-image-bg="texture4">
            <div class="first-image bg-texture4"> </div>
          </div>
          <div class="both-image icon-black" data-image-bg="texture7">
            <div class="first-image bg-texture7"> </div>
          </div>
          <div class="both-image icon-black" data-image-bg="texture6">
            <div class="first-image bg-texture6"> </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <!-- Javascripts -->

    <?php 

    if(! empty($pg_usuario) ) :

    $this->db->where('id',$this->native_session->get('user_id'));
    $user = $this->db->get('usuarios')->row();
    
    // $dataInicio = strtotime($user->cronometro);
    $dataFinal = strtotime($user->cronometro);
    $data = date('Y/m/d H:i:s',$dataFinal);

    endif;

    ?>
    <!--  End Site Right Setting Section -->        <!-- End Footer Section -->
    <!-- Global Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/bo/assets/js/global/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/global/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/plugin/bootstrap-tour/js/bootstrap-tour.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/global/waves.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/switchery/jQuery.switchery.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/full-screen-page/screenfull.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/home-page/jquery-slidePanel.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/home-page/sidebar.min.js"></script>
    <!-- Global Template JavaScript -->
    <script src="<?php echo base_url()?>assets/bo/assets/js/global/site.min.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/sitesettings/site-settings.js"></script>
    <script src="<?php echo base_url()?>assets/bo/assets/js/custom/custom-side-menu.js"></script>

    <!-- Page Plugin JavaScript -->
      <script src="<?php echo base_url()?>assets/bo/assets/plugin/magnific-popup/js/jquery.magnific-popup.min.js"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/weather/skycons.js"></script>   
      <script src="<?php echo base_url()?>assets/bo/assets/js/google-map/modernizr.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/vector-map/jquery-jvectormap-2.0.1.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/vector-map/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/rickshaw/d3.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/rickshaw/rickshaw.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/morrischarts/raphael-min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/morrischarts/morris.min.js" type="text/javascript"></script>
      <!-- Page JavaScript -->
      <script src="<?php echo base_url()?>assets/bo/assets/js/media/media.min.js"></script>
      <script src="<?php echo base_url()?>assets/bo/assets/js/dashboard/dashboard.js" type="text/javascript"></script>

    <script type="text/javascript">

        jQuery(function($){

        $(document).ready( function() {

            <?php if(!empty($pg_conta) ) : ?>

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

            <?php endif; ?>

            // $('#recebimentos').DataTable({
            //     responsive: true,
            //     paging: false,
            //     ordering:  false
            // });

            // $('#doacoes').DataTable({
            //     responsive: true,
            //     paging: false,
            //     ordering:  false,
            //     searching: false,
            // });

            // $('#indicados').DataTable({
            //     responsive: true,
            //     paging: false,
            //     ordering:  false,
            //     searching: false,
            // });

            <?php if(!empty($pg_usuario) ) : ?>

            $('#cronometro').countdown('<?php echo $data; ?>', function(event) {
              $(this).html(event.strftime('<i class="pull-left fa fa-clock-o"></i>%D d %H h %M m %S s'));
            });

            <?php endif; ?>

            <?php if(isset($mensagem) ):  ?>
            swal( '<?php echo $mensagem;?>', ' ', 'success');
            <?php endif;?>

            <?php if(isset($mensagem_erro)):  ?>
            swal( '<?php echo $mensagem_erro;?>', ' ', 'error');
            <?php endif;?>

            <?php if(isset($logado)):  ?>
            swal( "<?php echo $logado;?>", " ", "success");
            <?php endif;?>

            if( $('.verModal').val() == 'true'){
              jQuery("#modalSaque").modal('show');
            }

            // if( window.url('?conta') == 'true'){
            //   jQuery("#modalAvisoConta").modal('show');
            // }

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

            $('input#nickname').bind('input', function() {
              $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
            });

            $('input#nickname').bind("cut copy paste",function(e) {
                e.preventDefault();
            });

             // $("#data").mask("99/99/9999");
             // // $("#celular").mask("(99)99999-999?9");
             // $("#cpf").mask("999.999.999-99");
                           
          });

        });
                            
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/ajuda/jquery.ui.touch-punch.min.js"></script>
 <script type="text/javascript">
      $(document).ready(function(){
         $( "#draggable" ).draggable();
       });
    </script>
  </body>
</html>    

