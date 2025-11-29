				<style>
 					.form-group {
 						margin-bottom: 15px;
 					}
 					.form-group label {
 						font-weight: bold;
 					}
 					.form-control {
 						height: 35px;
 					}
					.row{
						margin-bottom: 10px;
						color: #555;
					}
 					.btn-lg {
 							padding: 10px 16px;
 							font-size: 18px;
 							line-height: 1.3333333;
 							border-radius: 6px;
 						}
					.btn-default {
 						color: #000;
 						background-color: #ED2100;
 						border-color: #ddd;
 						}
						
 					.panel-heading {
 						color: #000;
 						background-color: #5CE65C;
						font-weight: bold;
 						}
 					.control-label {
 						font-size: 18px;
						font-weight: bold;
						}
					.form-control {
						font-size: 16px;
						height: 35px;
						padding: 6px 12px;
						border: 1px solid #ccc;
						border-radius: 4px;
						box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
						transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
					}
					
				</style>
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
								<div class="col-sm-11">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Información del producto</label>
												<select id="eCodProducto" name="eCodProducto" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_productos as $ce) { ?>
														<option value="<?= $ce->eCodProducto?>"><?= $ce->tProductos;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Tipo de Movimiento</label>
												<select id="tTipoMovimiento" name="tTipoMovimiento" data-plugin-selectTwo class="form-control populate">
													<option value="ENTRADA">ENTRADA</option>
													<option value="SALIDA">SALIDA</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">	
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Cantidad</label>
												<input type="number" id="nCantidad" name="nCantidad" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Origen de Destino</label>
												<input type="text" id="tOrigenDestino" name="tOrigenDestino" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Motivo</label>
												<select id="eCodMotivo" name="eCodMotivo" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_motivos_movimiento as $cm) { ?>
														<option value="<?= $cm->eCodMotivo?>"><?= $cm->tMotivo;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label class="control-label" style="padding: 3px;">Usuario</label>
												<select id="eCodUsuario" name="eCodUsuario" data-plugin-selectTwo class="form-control populate">
													<? 	foreach ($con_usuarios as $cu) { ?>
														<option value="<?= $cu->eCodUsuario?>"><?= $cu->tUsuario;?></option>	
													<? 	} ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Observaciones</label>
										<textarea name="tObservaciones" id="tObservaciones" class="form-control" rows="4"></textarea>
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
								<!-- page </div>
								<div class="col-md-4">-->
									<button type='button' class='btn btn-lg btn-success' onclick='guardar(this);'><i class='fa fa-save'></i> Guardar</button>
									<button type='button' class='btn btn-lg btn-default' onclick='cancelar(this);'><i class='fa fa-times'></i> Cancelar</button>
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

			function cancelar(oObjeto){
				$(oObjeto).prop('disabled', true);
				window.location.href = "<?= site_url('Inventario/m8_s1'); ?>";
			}

			function guardar(oObjeto){
				var eError = 0;
				var mensaje = "<div class=\"col-md-12 alert alert-danger\">";
				var regexEntero = /^\d+$/;
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
				
				if ($("#eCodProducto").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione el producto</span><br>";
					eError++;
				}
				if ($("#tTipoMovimiento").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione el tipo de movimiento</span><br>";
					eError++;
				}
				if ($("#eCodMotivo").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Motivo del movimiento</span><br>";
					eError++;
				}
				if ($("#tOrigenDestino").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Poner descripción del origen o destino</span><br>";
					eError++;
				}
				if ($("#eCodUsuario").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione el usuario</span><br>";
					eError++;
				}
				if ($("#nCantidad").val()=='') { 
					mensaje += "<span><i class=\"fa fa-times\"></i> La cantidad no puede ir vacío</span><br>";
					eError++;
				} else if (!regexEntero.test($("#nCantidad").val().trim())) { 
					mensaje += "<span><i class=\"fa fa-times\"></i> La cantidad solo debe contener números enteros</span><br>";
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
					$.post('<?= site_url("Inventario/guardarMovimiento"); ?>',{
							eCodProducto: $("#eCodProducto").val().trim(),
							tTipoMovimiento: $("#tTipoMovimiento").val().trim(),
							nCantidad: $("#nCantidad").val().trim(),
							eCodMotivo: $("#eCodMotivo").val().trim(),
							tOrigenDestino: $("#tOrigenDestino").val().trim(),
							eCodUsuario: $("#eCodUsuario").val().trim(),
							tObservaciones: $("#tObservaciones").val().trim()
							
						}, 
						function(data){
							// respuesta
							$('#divRespuestaGuardar').html(data); $('#divRespuestaGuardar').slideDown(300);
							setTimeout(function() {
								if ($('#eExito').val()==1){
									window.location.href = "<?= site_url('Inventario/m8_s1'); ?>";
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