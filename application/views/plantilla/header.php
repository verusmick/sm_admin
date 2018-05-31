<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $titulo; ?></title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

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
        
        <!-- PARA EXPORTAR -->
		<script src="<?php echo base_url('publico/plugin_export/tableExport.js'); ?>"></script>
        <script src="<?php echo base_url('publico/plugin_export/jquery.base64.js'); ?>"></script>
        <script src="<?php echo base_url('publico/plugin_export/jspdf/libs/sprintf.js'); ?>"></script>
        <script src="<?php echo base_url('publico/plugin_export/jspdf/jspdf.js'); ?>"></script>
        <script src="<?php echo base_url('publico/plugin_export/jspdf/libs/base64.js'); ?>"></script>
        <!-- PARA EXPORTAR -->
        
        
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
      
		<!-- END JAVASCRIPT -->
	</head>
    <body class="menubar-hoverable header-fixed menubar-pin ">
		
		<header id="header" ><!-- BEGIN HEADER-->
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="<?php echo base_url('Login/Verificado');?>">
									<span class="text-lg text-bold text-primary"><?php echo $this->session->userdata('tipo_de_usuario'); ?></span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
				
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="<?php echo base_url('publico/plantilla/assets/img/avatar1.jpg?1403934956') ?>" alt="" />
								<span class="profile-info">
									<?php echo $this->session->userdata('usuario'); ?>
									<small><?php echo $this->session->userdata('tipo_de_usuario'); ?></small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">DATOS</li>
								<li><a href="#"><?php echo "Cargo: ".$this->session->userdata('cargo'); ?></a></li>
                                <li><a href="#"><?php echo "CI: ".$this->session->userdata('ci'); ?></a></li>
                                <li><a href="#"><?php echo "ID Usuario: ".$this->session->userdata('id_usuario'); ?></a></li>
								<li><a href="<?php echo base_url('Login/Salir'); ?>"><i class="fa fa-fw fa-power-off text-danger"></i> Salir del Sistema</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header><!-- END HEADER-->
		
        
        
    

