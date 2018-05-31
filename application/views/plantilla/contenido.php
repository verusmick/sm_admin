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
    toastr.error('Are you the 6 fingered man?', "eviosss")
});
</script>

<div id="base"><!-- BEGIN BASE-->
	<div id="content"><!-- BEGIN CONTENT-->

		<div class="col-lg-12"> <!-- col-lg-12 -->
			<form class="form">
				<div class="card"> <!-- card -->
					<div class="card-head style-primary">
						<header>Create an account</header>
					</div>
					
                    <div class="card-body"> <!--card-body -->
                    			
                    	<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Firstname1">
									<label for="Firstname1">Firstname</label>
								</div>
                                <div class="form-group">
									<input type="text" class="form-control" id="Firstname1">
									<label for="Firstname1">Firstname</label>
								</div>
							</div>
					
                    		<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Lastname1">
									<label for="Lastname1">Lastname</label>
								</div>
							</div>
						</div>
						
                        <div class="form-group">
	                        <input type="text" class="form-control" id="Username1">
                            <label for="Username1">Username</label>
						</div>
                        
					</div><!--end .card-body -->
					
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#simpleModal2">Login2</button>
                      
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#simpleModal">Login</button> 
                	</div> <!-- fin boton formulario -->
            	
                </div><!--end card -->
                            
        	</form>
     	</div>	<!-- fin col-lg-12 -->
        
        
        
		
								

<!-- BEGIN SIMPLE MODAL MARKUP -->
<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="simpleModalLabel">Save changes</h4>
			</div>
			<div class="modal-body">
				<p>Do you want to save changes?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->

<!-- BEGIN SIMPLE MODAL MARKUP -->
<div class="modal fade" id="simpleModal2" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
	<div class="col-lg-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="simpleModalLabel">Save changes</h4>
			</div>
			<div class="modal-body">
				<p>Do you want to save changes?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->


        				
	</div><!-- END CONTENT -->
</div><!-- FIN BEGIN BASE-->