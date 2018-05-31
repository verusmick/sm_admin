		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/bootstrap.css?1422792965') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/materialadmin.css?1425466319') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/font-awesome.min.css?1422529194') ?> " />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/material-design-iconic-font.min.css?1421434286') ?> " />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/toastr/toastr.css?1425466569') ?> " />
      	<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/nestable/nestable.css?1423393667') ?>" />
        
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989') ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990') ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990') ?>" />
		
		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-1.11.2.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/bootstrap/bootstrap.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/spin.js/spin.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/autosize/jquery.autosize.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/App.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppNavigation.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppOffcanvas.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppCard.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppForm.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppNavSearch.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppVendor.js') ?> "></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/demo/Demo.js') ?> "></script>
        <script src="<?php echo base_url('publico/plantilla/assets/js/libs/toastr/toastr.js') ?> "></script>
        
        
      
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/DataTables/jquery.dataTables.min.js') ?>"></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js') ?>"></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
		<script src="<?php echo base_url('publico/plantilla/assets/js/core/demo/DemoTableDynamic.js') ?>"></script>
        
        <script src="<?php echo base_url('publico/autocomplete/jquery.autocomplete.min.js') ?>"></script>
        
        <script src="<?php echo base_url('publico/mascaras/jquery.maskedinput.js') ?>"></script>
        <script src="<?php echo base_url('publico/mascaras/jquery.maskedinput.min.js') ?>"></script>
        
        <script>
$(document).ready(function() {
   	$('#datatable').DataTable( {
		"language": {
            "url": "<?php echo base_url('publico/datatables/spanish.json'); ?> "
        },
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"ordering": false
	});
} );
</script>

<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
      

		
        
        
    

