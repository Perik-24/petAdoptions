<style>
	/* Estilos para el contenedor de alertas automáticas */
#alert-container {
  position: fixed;     /* Se queda fijo en la pantalla */
  top: 20px;           /* 20px desde arriba */
  right: 20px;         /* 20px desde la derecha */
  width: 350px;        /* Ancho de la alerta */
  z-index: 9999;       /* Se asegura de que esté por encima de todo */
}

/* Ajuste opcional para que la 'x' de cierre esté bien alineada */
#alert-container .alert {
  margin-bottom: 10px;
}

</style>
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

					<section class="panel">
						<header class="panel-heading">
							<div class="panel-actions">
							</div>
					
							<h2 class="panel-title"><?= $tTitulo;?></h2>
						</header>
						<div class="panel-body">
							<div class="row" style="padding-right: 15px; padding-bottom: 10px;">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Especies</label>
										<select data-plugin-selectTwo class="form-control populate" id="eCodEspecie" name="eCodEspecie">
											<option value="">- Todas -</option>
											<? // Se asume que el controlador carga $con_especies
											foreach ($con_especies as $ce) { ?>
													<option value="<?= $ce->eCodEspecie;?>"><?= $ce->tNombre;?></option>
											<? } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4" align="right">
									<label class="control-label"></label><br>
									<div class="btn-group">
									<?	if ($this->session->userdata("bAdmin")==1){	?>
											<button type="button" class="btn btn-default btn-primary" onclick="filtro();">
											<i class="fa fa-search"></i> Filtrar</button>
									<?	}	?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="divRespuesta" style="display: none;"></div>
								</div>
							</div>
							<div id="divTblMascotas">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
								<thead>
									<tr>
	
										<th>Foto</th>
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Especie</th>
										<th>Raza</th>
										<th>Edad</th>
										<th>Peso (kg)</th>
										<th>Estatus</th>
										<th>Acción</th>
									</tr>
								</thead>
								<tbody>
									<? 	
										if (isset($con_mascotas)){ 
									?>
									<? 		foreach ($con_mascotas as $cm) { ?>
												<tr>
													<td>
														<? if ($cm->tFoto) { ?>
														<img src="<?= base_url($cm->tFoto);?>" width="100" class="img-thumbnail">
														<? } else { ?>
														<img src="<?= base_url('assets/images/placeholder.png');?>" width="50" class="img-thumbnail">
														<? } ?>
													</td>
													<td><?= str_pad($cm->eCodMascota, 6, "0", STR_PAD_LEFT);?></td>
													<td><?= $cm->tMascota;?></td>
													<td><?= $cm->tEspecie;?></td> <td><?= $cm->tRaza;?></td> <td><?= $cm->eEdad;?> año(s)</td>
													<td><?= $cm->dPeso;?></td>
													<td><?= $cm->tEstatus;?></td>
													<td>
														<div id="<?= $cm->eCodMascota;?>" class="btn-group">
															<? 	foreach ($con_permisos as $cp) { ?>
															<? 		if (strrpos($cp->aEstatus, $cm->tCodEstatus)!==false) { ?>
																		<?= $cp->tBoton;?>
															<?		} 	?>
															<?	} ?>
														</div>	
													</td>
												</tr>
									<? 		}	?>
									<?	}		?>
								</tbody>
								</table>
							</div>
						</div>
					</section>
					</section>

			</div>

		</section>

		<div id="divInfo" class="modal-block modal-block-default mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Información de la Mascota <button class="close modal-dismiss"><i class="fa fa-times"></i></button></h2>
				</header>
				<div id="divInfoDetalle" class="panel-body">
					</div>
				<div id="alert-container"></div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-default modal-dismiss">CERRAR</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

		<div id="divCancelar" class="modal-block modal-block-danger mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Desactivar Mascota <button class="close modal-dismiss"><i class="fa fa-times"></i></button></h2>
				</header>
				<div id="divDetalleCancelar" class="panel-body text-center">
					<div class="modal-wrapper">
						<div class="modal-icon center">
							<i class="fa fa-question-circle"></i>
						</div>
						<div class="modal-text">
							<h4>¿Está seguro de desactivar esta mascota?</h4>
							<input type="hidden" id="eCodMascotaCancelar">
						</div>
						<div class="modal-text">
							<div id="divRespuestaCancelar" style="display:none;">
								<div class="alert alert-success"><b>¡Mascota desactivada con éxito!,</b> redireccionando el listado..</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary" onclick="cancelar_guardar(this)">Aceptar</button>
							<button class="btn btn-default modal-dismiss">Cancelar</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

		<div id="divEliminar" class="modal-block modal-block-danger mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Eliminar Mascota <button class="close modal-dismiss"><i class="fa fa-times"></i></button></h2>
				</header>
				<div id="divDetalleCancelar" class="panel-body text-center">
					<div class="modal-wrapper">
						<div class="modal-icon center">
							<i class="fa fa-question-circle"></i>
						</div>
						<div class="modal-text">
							<h4>¿Está seguro de eliminar esta mascota?</h4>
							<p>Esta acción no se puede deshacer.</p>
							<input type="hidden" id="eCodMascotaEliminar">
						</div>
						<div class="modal-text">
							<div id="divRespuestaEliminar" style="display:none;">
								<div class="alert alert-success"><b>¡Mascota eliminada con éxito!,</b> redireccionando el listado..</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary" onclick="eliminar_mascota(this)">Aceptar</button>
							<button class="btn btn-default modal-dismiss">Cancelar</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

		<script src="<?= base_url();?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url();?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<script src="<?= base_url();?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<script src="<?= base_url();?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?= base_url();?>assets/vendor/select2/select2.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="<?= base_url();?>assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?= base_url();?>assets/vendor/ios7-switch/ios7-switch.js"></script>
		
		<script src="<?= base_url();?>assets/javascripts/theme.js"></script>
		
		<script src="<?= base_url();?>assets/javascripts/theme.custom.js"></script>
		
		<script src="<?= base_url();?>assets/javascripts/theme.init.js"></script>

		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?= base_url();?>assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<script src="<?= base_url();?>assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="<?= base_url();?>assets/vendor/jquery-idletimer/dist/idle-timer.js"></script>
		

		<script type="text/javascript">
			$(document).ready(function(){
				  var oTable = $('#datatable-tabletools').dataTable();
				  oTable.fnSort( [ [0,'desc'] ] );
			} );
		
			/**
			 * Muestra una alerta de Bootstrap 3 que se desvanece sola.
			 * @param {string} message - El mensaje a mostrar.
			 * @param {string} type - El tipo de alerta (ej. 'success', 'danger', 'info', 'warning').
			 * @param {int} duration - Cuánto tiempo (en ms) antes de desaparecer (default: 3000ms).
			 */
			function showAutoAlert(message, type, duration) {
					var aDuration = duration || 3000;
					var alertType = type || 'info';

					var alertHtml = '<div class="modal-block modal-block-danger mfp-hide" role="alert" style="display:none;">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							message +
							'</div>';

					var $newAlert = $(alertHtml);
					$('#alert-container').prepend($newAlert);

					$newAlert.fadeIn(500);

					setTimeout(function() {
							$newAlert.fadeOut(500, function() {
									$(this).remove(); 
							});
					}, aDuration);
			}

			function info(oObjeto){
				var eCodMascota = oObjeto.attr('id');
				$.post('<?= site_url("Mascota/detalle"); ?>',{
					eCodMascota: eCodMascota
					}, 
					function(data){
						// respuesta
						$('#divInfoDetalle').html(data);

					}).fail(function() { //en caso de que el POST falle
						alert( "Operación fallida." );
				});
			}

			function editar(oObjeto){
				window.location.href = "<?= site_url('Mascota/editar')?>/"+oObjeto.attr('id');
			}

			function filtro(){
				$('#divRespuesta').html("<div class=\"alert alert-info\"><img src=\"<?= base_url();?>/assets/images/loader.gif\" width=\"30px\"> <strong> Procesando informaci&oacute;n ...</strong></div>");
				$('#divRespuesta').slideDown(300);

				$.post('<?= site_url("Mascota/filtro_mascotas"); ?>',{ // URL actualizada
					eCodEspecie: $("#eCodEspecie").val(), // Parámetro actualizado
					}, 
					function(data){

						$('#divTblMascotas').html(data); // ID de div actualizado
						$("#divRespuesta").slideUp(300);

						var datatableInit = function() {

							$('#datatable-default').dataTable({
								aaSorting: [
									[0, 'desc']
								]
							});
							$('.modal-basic').magnificPopup({
								type: 'inline',
								preloader: false,
								modal: true
							});
						};

						datatableInit();

					}).fail(function() { //en caso de que el POST falle
						alert( "Operación fallida." );
				});
			}

			function eliminar_mascota(oObjeto){
				var eCodMascota = oObjeto.attr('id');
				$.post('<?= site_url("Mascota/eliminar_mascota"); ?>',{
					eCodMascota: eCodMascota
					}, 
					function(data){
						showAutoAlert(data, 'success');
						setTimeout(function() {
								location.reload(); 
						}, 3000);

					}).fail(function() { //en caso de que el POST falle
						alert( "Operación fallida." );
				});
			}

		</script>
	</body>
</html>

	</body>
</html>