				<style>
					:root {
    				--color-brand-blue: #007bff; /* Azul del botón */
    				--color-brand-purple: #6a1b9a; /* Morado de acento */
    				--color-text-dark: #333333;
    				--color-border-light: #dddddd;
    				--color-background-soft: #f9f9f9;
						}

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
					h3 {
						font-family: 'Montserrat', sans-serif;
    					color: var(--color-brand-purple);
    					font-size: 1.8em;
    					border-bottom: 2px solid var(--color-background-soft);
    					padding-bottom: 10px;
					}
 					.btn-lg {
 							padding: 10px 16px;
 							font-size: 18px;
 							line-height: 1.3333333;
 							border-radius: 6px;
 						}
					.btn-success {
 						width: 25%;
    					background-color: ;
    					color: white;
    					border: none;
    					border-radius: 8px;
    					cursor: pointer;
    					transition: background-color 0.3s ease, transform 0.1s;
    					box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
 						}
					.btn-success:hover {
    					background-color: #0056b3; /* Azul más oscuro */
    					transform: translateY(-2px);
    					box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
						}
					.btn-default {
						width: 25%;
 						color: #000;
 						background-color: #ED2100;
 						border-color: #ddd;
 						}
					.btn-default:hover {
 						background-color: #ED2100;
 						transform: translateY(-2px);
    					box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
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
							<h3>Datos Personales</h3>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Nombre</label>
										<input type="text" id="tNombre" name="tNombre" class="form-control" onkeyup="javascript:$('#txtNombre').html($(this).val());">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Apellido</label>
										<input type="text" id="tApellido" name="tApellido" class="form-control" onkeyup="javascript:$('#txtNombre').html($(this).val());">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Correo Electronico</label>
										<input type="email" id="tCorreo" name="tCorreo" class="form-control">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Telefono</label>
										<input type="text" id="tTelefono" name="tTelefono" data-plugin-masked-input data-input-mask="(999) 99 99999" placeholder="(___) __ _____" class="form-control">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Tipo de Donador</label>
										<select name="tTipoDonador" id="tTipoDonador" class="form-control">
											<option value="Individual">Individual</option>
											<option value="Empresa">Empresa</option>
											<option value="Asociacion">Asociacion</option>
										</select>
									</div>
								</div>
							</div>
							<h3>Ubicacion</h3>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Estado</label>
										<select id="eCodEstado" name="eCodEstado" data-plugin-selectTwo class="form-control populate">
											<? 	foreach ($con_estados as $ce) { ?>
												<option value="<?= $ce->eCodEstado?>"><?= $ce->tNombre;?></option>	
											<? 	} ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Ciudad</label>
										<select id="eCodCiudad" name="eCodCiudad" data-plugin-selectTwo class="form-control populate">
											<? 	foreach ($con_ciudades as $cc) { ?>
												<option value="<?= $cc->eCodCiudad?>"><?= $cc->tNombre;?></option>	
											<? 	} ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Direccion</label>
										<input type="text" id="tDireccion" name="tDireccion" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Codigo Postal</label>
										<input type="text" id="tCodigoPostal" name="tCodigoPostal" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label" style="padding: 3px;">Notas</label>
										<textarea id="tNotas" name="tNotas" class="form-control" rows="4"></textarea>
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
						</div>
					</div>
				</section>
		</section>
		<!-- end: page -->

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
				window.location.href = "<?= site_url('Finanza/m9_s1'); ?>";
			}

			function guardar(oObjeto){
				var eError = 0;
				var mensaje = "<div class=\"col-md-12 alert alert-danger\">";
				var regexEntero = /^\d+$/;
				var regexDecimal = /^\d{1,3}([.,]\d{1,2})?$/;

				/*var mensajeDebug = "--- DATOS A ENVIAR --- \n" + // \n crea un salto de línea
					"tNombre: " + $("#tNombre").val().trim() + "\n" +
					"tApellido: " + $("#tApellido").val().trim() + "\n" +
					"tCorreo: " + $("#tCorreo").val().trim() + "\n" +
					"eCodEstado: " + $("#eCodEstado").val() + "\n" +
					"eCodCiudad: " + $("#eCodCiudad").val() + "\n" +
					"tDireccion: " + $("#tDireccion").val().trim() + "\n" +
					"tCodigoPostal: " + $("#tCodigoPostal").val().trim() + "\n" +
					"tTelefono: " + $("#tTelefono").val().trim() + "\n" +
					"tNotas: " + $("#tNotas").val().trim() + "\n";

				alert(mensajeDebug);*/
				
				if ($("#tNombre").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i>Falta Poner Nombre</span><br>";
					eError++;
				}
				if ($("#tCorreo").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Falta Poner Correo</span><br>";
					eError++;
				}
				if ($("#eCodEstado").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione el estado</span><br>";
					eError++;
				}
				if ($("#eCodCiudad").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Seleccione la ciudad</span><br>";
					eError++;
				}
				if ($("#tDireccion").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Falta Poner Dirección</span><br>";
					eError++;
				}
				if ($("#tCodigoPostal").val()==''){
					mensaje += "<span><i class=\"fa fa-times\"></i> Falta Poner Código Postal</span><br>";
					eError++;
				}
				if ($("#tTelefono").val()=='') { 
					mensaje += "<span><i class=\"fa fa-times\"></i> Falta Poner Teléfono</span><br>";
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
					$.post('<?= site_url("Finanza/guardar"); ?>',{
							tNombre: $("#tNombre").val(),
							tApellido: $("#tApellido").val(),
							tCorreo: $("#tCorreo").val(),
							tTelefono: $("#tTelefono").val(),
							tTipoDonador: $("#tTipoDonador").val(),
							tDireccion: $("#tDireccion").val(),
							eCodCiudad: $("#eCodCiudad").val(),
							eCodEstado: $("#eCodEstado").val(),
							tCodigoPostal: $("#tCodigoPostal").val(),
							tNotas: $("#tNotas").val()
							
						}, 
						function(data){
							// respuesta
							$('#divRespuestaGuardar').html(data); $('#divRespuestaGuardar').slideDown(300);
							setTimeout(function() {
								if ($('#eExito').val()==1){
									window.location.href = "<?= site_url('Finanza/m9_s1'); ?>";
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