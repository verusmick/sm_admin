<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../publico/plantilla/html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary "> = SICIV = </span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">
						<!-- FUNCIONARIO -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-account-child"></i></div>
								<span class="title">FUNCIONARIO</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Funcionario/Nuevo'); ?>" ><span class="title">NUEVO</span></a></li>
								<li><a href="<?php echo base_url('Funcionario/Lista'); ?>" ><span class="title">LISTA</span></a></li>
							</ul>
						</li>
						<!-- FIN FUNCIONARIO -->
                        
                        <!-- USUARIO -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-account-child"></i></div>
								<span class="title">USUARIOS</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Usuario/Nuevo'); ?>" ><span class="title">NUEVO</span></a></li>
								<li><a href="<?php echo base_url('Usuario/Lista_usuarios'); ?>" ><span class="title">LISTA</span></a></li>
							</ul>
						</li>
						<!-- FIN USUARIO -->
                        
                        <!-- LABORATORIO -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-store"></i></div>
								<span class="title">LABORATORIO</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Laboratorio/Nuevo'); ?>" ><span class="title">NUEVO</span></a></li>
								<li><a href="<?php echo base_url('Laboratorio/Lista'); ?>" ><span class="title">LISTA</span></a></li>
							</ul>
						</li>
						<!-- FIN LABORATORIO -->
                        
                        <!-- CLIENTE -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-assignment-ind"></i></div>
								<span class="title">CLIENTE</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Cliente/Nuevo'); ?>" ><span class="title">NUEVO</span></a></li>
								<li><a href="<?php echo base_url('Cliente/Lista'); ?>" ><span class="title">LISTA</span></a></li>
							</ul>
						</li>
						<!-- FIN CLIENTE -->
                        
                        <!-- INGRESOS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-view-list"></i></div>
								<span class="title">INGRESOS</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Ingreso/Nuevo'); ?>" ><span class="title">NUEVO</span></a></li>
								<li><a href="<?php echo base_url('Ingreso/Lista_ingresos'); ?>" ><span class="title">LISTA DE INGRESOS</span></a></li>
                                <li><a href="<?php echo base_url('Ingreso/Lista_productos'); ?>" ><span class="title">LISTA DE PRODUCTOS</span></a></li>
                                <li><a href="<?php echo base_url('Ingreso/Nuevo_pago'); ?>" ><span class="title">PAGO DE NOTAS DE INGRESO</span></a></li>
							</ul>
						</li>
						<!-- FIN INGRESOS -->
                        
                        <!-- VENTA -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-view-list"></i></div>
								<span class="title">VENTA</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Venta/Nueva_venta'); ?>" ><span class="title">NUEVA VENTA</span></a></li>
                                <li><a href="<?php echo base_url('Venta/Lista_venta'); ?>" ><span class="title">LISTA VENTA</span></a></li>
								
							</ul>
						</li>
						<!-- FIN VENTA -->
                        
                        <!-- RECIBOS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-local-atm"></i></div>
								<span class="title">RECIBOS</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Recibo/Lista_venta'); ?>" ><span class="title">LISTA DE VENTAS</span></a></li>
							</ul>
						</li>
						<!-- FIN RECIBOS -->
                        
                         <!-- REPORTES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-local-atm"></i></div>
								<span class="title">REPORTES</span>
							</a>
							
							<ul>
								<li><a href="<?php echo base_url('Reporte/Producto'); ?>" ><span class="title">REPORTE PRODUCTOS</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Tipo_nota'); ?>" ><span class="title">REPORTE POR TIPO NOTA</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Ingresos'); ?>" ><span class="title">REPORTE DE INGRESOS</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Ingresos_de_productos'); ?>" ><span class="title">INGRESO PRODUCTOS</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Ventas_por_producto'); ?>" ><span class="title">VENTAS POR PRODUCTO</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Ventas_por_laboratorio'); ?>" ><span class="title">VENTAS POR LABORATORIO</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Reporte_recibos'); ?>" ><span class="title">RECIBOS</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Cliente_cupo'); ?>" ><span class="title">CUPO CLIENTE</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Lista_precios'); ?>" ><span class="title">LISTA DE PRECIOS</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Nota_con_factura'); ?>" ><span class="title">NOTA CON FACTURA</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/por_vendedor'); ?>" ><span class="title">VENDEDOR</span></a></li>
                                <li><a href="<?php echo base_url('Reporte/Ventas_a_cliente'); ?>" ><span class="title">VENTAS CLIENTE</span></a></li>
                                
                                
                                
							</ul>
						</li>
						<!-- FIN REPORTES -->
                        
                        

						
                        
					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div>
            
</body>
</html>