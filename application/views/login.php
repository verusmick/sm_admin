<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SICIV</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/bootstrap.css?1422792965');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/materialadmin.css?1425466319');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('publico/plantilla/assets/css/theme-default/libs/toastr/toastr.css?1425466569') ?> " />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="img-backdrop" style="background-image: url('<?php echo base_url('publico/plantilla/assets/img/img16.jpg'); ?>')"></div>
			<div class="spacer"></div>
			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<br/>
							<span class="text-lg text-bold text-primary">SICIV</span>
							<br/><br/>
							<form id="form_ingresar" class="form floating-label" action="" method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="usuario" name="usuario">
									<label for="usuario">USUARIO</label>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="clave" name="clave">
									<label for="clave">CLAVE</label>
									
								</div>
								<br/>
								<input name="url_busca_usuario" id="url_busca_usuario" type="hidden" value="<?php echo base_url('Login/Busca_usuario'); ?>">
									<!--end .col -->
									<div class="col-xs-6 text-right">
										<button id="boton_ingresar" class="btn btn-primary btn-raised" type="button">INGRESAR</button>
									</div><!--end .col -->
								
							</form>
						</div><!--end .col -->
						<!--end .col -->
							</div><!--end .row -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
                <div id="div_busca_usuario"> </div>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-1.11.2.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/bootstrap/bootstrap.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/spin.js/spin.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/App.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppNavigation.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppOffcanvas.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppCard.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppForm.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppNavSearch.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/source/AppVendor.js');?>"></script>
				<script src="<?php echo base_url('publico/plantilla/assets/js/core/demo/Demo.js');?>"></script>
                 <script src="<?php echo base_url('publico/plantilla/assets/js/libs/toastr/toastr.js') ?> "></script>
				<!-- END JAVASCRIPT -->
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<script type="text/javascript">
$(document).ready(function(){
 /*    toastr.error('Are you the 6 fingered man?', "eviosss") */
	
///ingresar
$("#boton_ingresar").click(function(e) {
    $.ajax({
                data:  $("#form_ingresar").serialize(),
                url:   $("#url_busca_usuario").val(),
                type:  'post',
                beforeSend: function () {
                        $("#div_busca_usuario").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#div_busca_usuario").html(response);
                }
	});
});
///FIN ingresar
});
</script>
			</body>
		</html>
