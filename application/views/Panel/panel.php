				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Inicio</h2>
						<h2><div class="search-filter-wrapper" style="display: inline-block; margin-left: 20px;">
							<input type="text" 
                       name="q" 
                       id="searchInput" 
                       placeholder="Buscar..." 
                       class="form-control" 
                       style="min-width: 250px;">
                <span class="input-group-btn">
						</div>
						<div class="search-filter-species" style="display: inline-block; margin-left: 20px;">
						<select name="speciesFilter" id="speciesFilter" class="form-control">
							<option value="">- Todas las Especies -</option>
							<? foreach ($con_especies as $ce) { ?>
								<option value="<?= $ce->eCodEspecie;?>"><?= $ce->tNombre;?></option>
							<? } ?>
						</select>
						</div>
						</h2>
						
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inicio</span></li>
							</ol>

							<span style="padding-right: 30px;"></span>
						</div>
					</header>

					</section>
					<!-- start: page -->
					<section role="main" class="body">
					<div id="noResults" style="display: none; width: 100%; text-align: center; padding: 20px; font-size: 1.2em; color: #666;">
						No se encontraron mascotas que coincidan con la búsqueda
					</div>
					<!-- Ejemplo de tarjeta comentado para referencia-->
					<div class="card-animals">
						<div class="card-image">
							<img src="http://money.com/wp-content/uploads/2024/03/Best-Small-Dog-Breeds-Pomeranian.jpg?quality=60"
								alt="Imagen de mascota">
						</div>
						<div class="card-content">
							<h1>Lucky</h1>
							<p class="Description">A very good boi that loves playing fetch and ice-cream! Gentle with everyone.
								Scared of the rain.</p>
							<div class="details">
								<div class="detail-item">
									<span class="label">TYPE</span>
									<span class="value">Puppy</span>
								</div>
								<div class="detail-item">
									<span class="label">SIZE</span>
									<span class="value">Medium</span>
								</div>
								<div class="detail-item">
									<span class="label">WEIGHT</span>
									<span class="value">45.85 lbs</span>
								</div>
							</div>
							<button onclick="">Mas Info</button>
						</div>
					</div>

		<? 	if (isset($con_mascotas)){  ?>
		<? 	foreach ($con_mascotas as $cm) { ?>
			<div class="card-animals">
				<div class="card-image">
					<? if ($cm->tFoto) { ?>
					<img src="<?= base_url($cm->tFoto);?>" alt="<?= $cm->tMascota;?>">
					<? } else { ?>
					<img src="<?= base_url('assets/images/placeholder.png');?>" alt="Sin imagen">
					<? } ?>
				</div>
				<div class="card-content">
					<h1><?= $cm->tMascota; ?></h1>
					<p class="Description"><?= $cm->tDescripcion ? $cm->tDescripcion : 'Sin descripción disponible'; ?></p>
					<div class="details">
						<div class="detail-item">
							<span class="label">RAZA</span>
							<span class="value"><?= $cm->tRaza ? $cm->tRaza : 'No especificada'; ?></span>
						</div>
						<div class="detail-item">
							<span class="label">EDAD</span>
							<span class="value"><?= $cm->eEdad ? $cm->eEdad.' año(s)' : 'No especificada'; ?></span>
						</div>
						<div class="detail-item">
							<span class="label">PESO</span>
							<span class="value"><?= $cm->dPeso ? number_format($cm->dPeso, 2).' kg' : 'No especificado'; ?></span>
						</div>
					</div>
					<button onclick="verDetalle(<?= $cm->eCodMascota; ?>)">Mas Info</button>
				</div>
			</div>
		<? 		}	?>
		<?	}		?>
		<!-- Contenedor modal para cargar el detalle vía AJAX -->
				<div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<!-- El contenido es reemplazado por la respuesta AJAX -->
						</div>
					</div>
				</div>
				</section>
				<!-- Vendor CSS -->
				 <link rel="stylesheet" href="<?= base_url(); ?>assets/stylesheets/styles.css" />
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/font-awesome/css/font-awesome.css" />
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" />
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

				<!-- Specific Page Vendor CSS -->
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
				<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/morris/morris.css" />

				<!-- Vendor -->
				<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

				<!-- Specific Page Vendor -->
				<script src="<?= base_url(); ?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-appear/jquery.appear.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.pie.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.categories.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.resize.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/raphael/raphael.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/morris/morris.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/gauge/gauge.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/snap-svg/snap.svg.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/liquid-meter/liquid.meter.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/jquery.vmap.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

				<!-- Specific Page Vendor -->
				<script src="<?= base_url(); ?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/pnotify/pnotify.custom.js"></script>

				<!-- Theme Base, Components and Settings -->
				<script src="<?= base_url(); ?>assets/javascripts/theme.js"></script>

				<!-- Theme Custom -->
				<script src="<?= base_url(); ?>assets/javascripts/theme.custom.js"></script>
				<!--<script src="<?= base_url(); ?>assets/javascripts/theme.notification.js"></script>-->

				<!-- Theme Initialization Files -->
				<script src="<?= base_url(); ?>assets/javascripts/theme.init.js"></script>

				<!-- Examples -->
				<script src="<?= base_url(); ?>assets/javascripts/tables/examples.datatables.default.js"></script>
				<script src="<?= base_url(); ?>assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
				<script src="<?= base_url(); ?>assets/javascripts/tables/examples.datatables.tabletools.js"></script>
				<script src="<?= base_url(); ?>assets/javascripts/ui-elements/examples.modals.js"></script>
				<script src="<?= base_url(); ?>assets/vendor/jquery-idletimer/dist/idle-timer.js"></script>

				<script type="text/javascript">
					function verDetalle(eCodMascota) {
						// Mostrar un indicador de carga en el modal y abrirlo inmediatamente
						var loadingHtml = '<div class="modal-dialog modal-lg" role="document">'
							+ '<div class="modal-content">'
							+ '<div class="modal-body text-center" style="padding:40px;">'
							+ '<i class="fa fa-spinner fa-spin fa-2x" aria-hidden="true"></i>'
							+ '<p style="margin-top:10px;">Cargando detalles...</p>'
							+ '</div></div></div>';
						$("#ajax-modal").html(loadingHtml);
						$("#ajax-modal").modal({show:true});

						$.post('<?= site_url("Mascota/detalle");?>', { eCodMascota: eCodMascota })
							.done(function(data) {
								// Reemplazamos solo el contenido interior del modal para mantener la estructura
								$("#ajax-modal .modal-content").html(data);
							})
							.fail(function(jqXHR, textStatus, errorThrown) {
								var errHtml = '<div class="modal-dialog" role="document">'
									+ '<div class="modal-content">'
									+ '<div class="modal-body text-center text-danger" style="padding:30px;">'
									+ '<p>Error al cargar el detalle. Intente de nuevo.</p>'
									+ '</div></div></div>';
								$("#ajax-modal .modal-content").replaceWith($(errHtml).find('.modal-content'));
								console.error('AJAX error:', textStatus, errorThrown);
							});
					}

					$(document).ready(function() {
						$("#searchInput").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							var visibleCards = 0;
							
							$(".card-animals").each(function() {
								var petName = $(this).find("h1").text().toLowerCase();
								var matches = petName.indexOf(value) > -1;
								$(this).toggle(matches);
								if (matches) visibleCards++;
							});
							
							// Show/hide no results message
							$("#noResults").toggle(visibleCards === 0);
						});
						$("#speciesFilter").on("change", function() {
							var selectedSpecies = $(this).val().toLowerCase();
							var visibleCards = 0;

							$(".card-animals").each(function() {
								var petSpecies = $(this).data("species").toLowerCase();
								var matches = selectedSpecies === "" || petSpecies === selectedSpecies;
								$(this).toggle(matches);
								if (matches) visibleCards++;
							});

							// Show/hide no results message
							$("#noResults").toggle(visibleCards === 0);
						});
					});
				</script>
				</body>
				</html>