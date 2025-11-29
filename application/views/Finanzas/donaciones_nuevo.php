
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
										<label class="control-label">Categoria</label>
										<select data-plugin-selectTwo class="form-control populate" id="eCodCategoriaProductos" name="eCodCategoriaProductos">
											<option value="">- Todas -</option>
											<? // Se asume que el controlador carga $con_categoriasproductos
											foreach ($con_categoriasproductos as $ce) { ?>
													<option value="<?= $ce->eCodCategoriaProductos;?>"><?= $ce->tNombre;?></option>
											<? } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4" align="right">
									<label class="control-label"></label><br>
									<div class="btn-group">
									<?	if ($this->session->userdata("bAdmin")==1){	?>
											<button type="button" class="btn btn-default btn-primary" onclick="filtro();" style="margin-right: 10px;">
											<i class="fa fa-search"></i> Filtrar</button>
											<button type="button" class="btn btn-default btn-primary" onclick="nuevo();">
											<i class="fa fa-plus"></i> Registrar Movimiento</button>
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
	
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Cantidad</th>
										<th>Tipo de Movimiento</th>
										<th>Motivo</th>
										<th>Origen de Motivo</th>
										<th>Usuario</th>
										<th>Observaciones</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<? 	
										if (isset($con_movimientos)) { 
									?>
									<? 		foreach ($con_movimientos as $cm) { ?>
												<tr>
													<td><?= str_pad($cm->eCodMovimiento, 6, "0", STR_PAD_LEFT);?></td>
													<td><?= $cm->tProductos;?></td>
													<td><?= $cm->tMovimientos;?></td> 
													<td><?= $cm->nCantidad;?></td> 
													<td><?= $cm->tMotivos;?></td>
													<td><?= $cm->tOrigenDestino;?></td>
													<td><?= $cm->tUsuarios;?></td>
													<td><?= $cm->tObservaciones;?></td>
													<td><?= $cm->fhFecha;?></td>
													<td><?= $cm->tCodEstatus;?></td>
														<div id="<?= $cm->eCodMovimiento;?>" class="btn-group">
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
				window.location.href = "<?= site_url('Inventario/editar')?>/"+oObjeto.attr('id');
			}

			function nuevo(oObjeto){
				window.location.href = "<?= site_url('Inventario/actualizar')?>/";
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