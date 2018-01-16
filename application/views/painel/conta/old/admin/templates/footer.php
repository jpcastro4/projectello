<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="container">
         <?php echo date('Y');?> &copy; <?php echo config_site('nome_site');?>. All Rights Reserved.
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script>
<![endif]-->

<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script src="<?php echo base_url();?>assets/admin/layout2/scripts/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/leilao/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  jQuery(function($){
   $("#data").mask("99/99/9999");
   $("#data_hora1").mask("99/99/9999 99:99");
   $("#data_hora2").mask("99/99/9999 99:99");
   $("#data_hora3").mask("99/99/9999 99:99:99");
   $("#celular").mask("(99) 99999-999?9");
   $("#cpf").mask("999.999.999-99");
   $("#hora").mask("99:99");
   $("#dd1").mask("99?9");
   $("#dd2").mask("99?9");
   $("#datacron").mask("99/99/9999");

});
</script>

<script>
$(document).ready(function(){

  $("a#deletarFoto").on('click', function(){

    var id = $(this).attr('ref');

    if(confirm('Tem certeza que deseja apagar essa foto ? Após apagar ela não poderá ser recuperada')){

      $.ajax({
        url:'<?php echo base_url('geadmin/excluir_foto');?>',
        type: 'POST',
        data: {id:id},

        success: function(callback){

          if(callback == 'true'){

            $("#img_"+id).fadeOut('slow');

          }else{

            alert('Ocorreu um erro: '+callback);
          }
        }
      });

    }else{
      return false;
    }
  })
})
</script>

<script>
CKEDITOR.replace( 'editorck' );
</script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   TableAdvanced.init();
   Index.init(); // init index page
});
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>