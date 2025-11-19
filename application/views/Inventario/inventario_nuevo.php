      			<!-- BEGIN BODY -->  
      			<section role="main" class="content-body">
					<? 	foreach ($con_seccion as $sec) { ?>
							<header class="page-header">
								<h2><i class="<?= $sec->tModuloIcono;?>"></i>  <?= $sec->tModulo?></h2>
							
								<div class="right-wrapper pull-right">
									<ol class="breadcrumbs">
										<li><span><?= $sec->tModulo;?></span></li>
										<li><span><?= $sec->tSeccion;?></span></li>
									</ol>
									<? $tTitulo = $sec->tSeccion; ?>
									<span style="padding-right: 30px;"></span>
								</div>
							</header>
					<?	} 	?>

					<!-- start: page -->
					<section class="panel">
						<header class="panel-heading">
							<div class="panel-actions">
							</div>
							<h2 class="panel-title"><?= $tTitulo;?></h2>
						</header>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-9">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Nombre del producto</label>
												<input type="text" id="tNombre" name="tNombre" class="form-control" onkeyup="javascript:$('#txtNombre').html($(this).val());">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Categoria</label>
												<select id="eCodCategoriaProductos" name="eCodCategoriaProductos" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_categoriasproductos as $ce) { ?>
														<option value="<?= $ce->eCodCategoriaProductos?>"><?= $ce->tNombre;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Marca</label>
												<select id="eCodMarca" name="eCodMarca" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_marcas as $cr) { ?>
														<option value="<?= $cr->eCodMarca?>"><?= $cr->tNombre;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Descripción</label>
												<input type="text" id="tDescripcion" name="tDescripcion" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Proveedor</label>
												<select id="eCodProveedor" name="eCodProveedor" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_proveedores as $cp) { ?>
														<option value="<?= $cp->eCodProveedor?>"><?= $cp->tNombre;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Stock</label>
										<input type="txt" name="nStockMinimo" id="nStockMinimo" class="form-control">
									</div>
								</div>
								<div class="col-sm-3">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Unidades</label>
												<input type="text" 
															id="tUnidad" 
															name="tUnidad" 
															class="form-control"
															inputmode="numeric" 
															step="1" 
															min="0">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Precio de Compra</label>
												<input type="number" 
															id="nPrecioCompra" 
															name="nPrecioCompra" 
															class="form-control"
															inputmode="decimal" 
															step="0.01" 
															min="0" 
															placeholder="Ej. 2.50">
											</div>
										</div>
								<div class="col-sm-6">
									<div class="form-group">
										&nbsp;
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-8">
									<div id="divRespuestaGuardar" style="display: none;"></div>
								</div>
								<div class="col-md-4" align="right">
									<button type='button' class='btn btn-lg btn-success' onclick='guardar(this);'><i class='fa fa-save'></i> Guardar</button>
								</div>
							</div>
						</div>
						
					</section>

					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="<?= base_url();?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url();?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="<?= base_url();?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<!-- Specific Page Vendor Form -->
		<script src="<?= base_url();?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?= base_url();?>assets/vendor/select2/select2.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?= base_url();?>assets/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?= base_url();?>assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?= base_url();?>assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?= base_url();?>assets/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<script src="<?= base_url();?>assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="<?= base_url();?>assets/javascripts/forms/examples.advanced.form.js" /></script>
		<script src="<?= base_url();?>assets/vendor/jquery-idletimer/dist/idle-timer.js"></script>
		
  		
		<script type="text/javascript">
			$(document).ready(function(){
				$("input:text:visible:first").focus();
			});

			function guardar(oObjeto){
				var eError = 0;
				var mensaje = "<div class=\"col-md-12 alert alert-danger\">";
				var unidadesVal = $("#tUnidad").val().trim();
				var regexEntero = /^\d+$/;
				var precioVal = $("#nPrecioCompra").val().trim();
				var regexDecimal = /^\d{1,3}([.,]\d{1,2})?$/;

				/*var mensajeDebug = "--- DATOS A ENVIAR --- \n" + // \n crea un salto de línea
					"tNombre: " + $("#tNombre").val().trim() + "\n" +
					"unidadesVal: " + unidadesVal + "\n" +
					"precioVal: " + precioVal + "\n" +
					"tDescripcion: " + $("#tDescripcion").val().trim() + "\n" +
					"tFoto: " + $("#tImagen").val() + "\n" +
					"eCodEspecie: " + $("#eCodEspecie").val() + "\n" +
					"eCodRaza: " + $("#eCodRaza").val();

				alert(mensajeDebug);*/
				
				if ($("#eCodMarca").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione la marca</span><br>";
					eError++;
				}
				if ($("#eCodCategoriaProductos").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione la categoría de producto</span><br>";
					eError++;
				}
				if ($("#eCodProveedor").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione el proveedor</span><br>";
					eError++;
				}
				if ($("#tNombre").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Nombre completo de la mascota</span><br>";
					eError++;
				}
				if ($("#tDescripcion").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Poner Descripción del producto</span><br>";
					eError++;
				}

				if (unidadesVal == '') { 
					mensaje += "<span><i class=\"fa fa-times\"></i> Unidades no puede ir vacía</span><br>";
					eError++;
				}

				if ($("#nStockMinimo").val()=='') { 
					mensaje += "<span><i class=\"fa fa-times\"></i> El Stock Mínimo no puede ir vacío</span><br>";
					eError++;
				} else if (!regexEntero.test($("#nStockMinimo").val().trim())) { 
					mensaje += "<span><i class=\"fa fa-times\"></i> El Stock Mínimo solo debe contener números enteros</span><br>";
					eError++;
				}

				if (precioVal != '' && !regexDecimal.test(precioVal)) { 
					mensaje += "<span><i class=\"fa fa-times\"></i> El Precio debe ser un número válido (ej. 5.50 o 120.75)</span><br>";
					eError++;
				}

				if (eError>0){
					mensaje += "</div>";
					$('#divRespuestaGuardar').html(mensaje); $('#divRespuestaGuardar').slideDown(300);
					return false;
				}else{
					$(oObjeto).prop('disabled', true);
					$('#divRespuestaGuardar').html("<div class=\"alert alert-info\"><img src=\"<?= base_url();?>/assets/images/loader.gif\" width=\"30px\"> <strong> Procesando informaci&oacute;n ...</strong></div>");
					$('#divRespuestaGuardar').slideDown(300);
					$.post('<?= site_url("Inventario/guardar"); ?>',{
							tNombre: $("#tNombre").val().trim(),
							tDescripcion: $("#tDescripcion").val().trim(),
							eCodCategoriaProductos: $("#eCodCategoriaProductos").val(),
							eCodProveedor: $("#eCodProveedor").val(),
							eCodMarca: $("#eCodMarca").val(),
							unidadesVal: unidadesVal,
							precioVal: precioVal,
							nStockMinimo: $("#nStockMinimo").val().trim()
						}, 
						function(data){
							// respuesta
							$('#divRespuestaGuardar').html(data); $('#divRespuestaGuardar').slideDown(300);
							setTimeout(function() {
								if ($('#eExito').val()==1){
									window.location.href = "<?= site_url('Inventario/m8_s2'); ?>";
								}else{
									$('#divRespuestaGuardar').slideUp(300);
									$(oObjeto).prop('disabled', false);
								}
							}, ($('#eExito').val()==1 ? 3000 : 3800));

						}).fail(function() { //en caso de que el POST falle
							alert( "Operación fallida." );
					});
					
				}
			}
		</script>
	</body>
</html>