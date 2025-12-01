<!-- BEGIN BODY -->  
<section role="main" class="content-body">
	<? foreach ($con_seccion as $sec) { ?>
		<header class="page-header">
			<h2><i class="<?= $sec->tModuloIcono;?>"></i> <?= $sec->tModulo?></h2>
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li><span><?= $sec->tModulo;?></span></li>
					<li><span><?= $sec->tSeccion;?></span></li>
				</ol>
				<? $tTitulo = $sec->tSeccion; ?>
				<span style="padding-right: 30px;"></span>
			</div>
		</header>
	<? } ?>

	<!-- start: page -->
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title"><?= $tTitulo;?></h2>
		</header>

		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Nombre del Interesado</label>
						<input type="text" id="tNombre" name="tNombre" class="form-control" placeholder="Ej. Juan Pérez">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Contacto</label>
						<input type="text" id="tContacto" name="tContacto" class="form-control" placeholder="Teléfono o correo">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div id="divRespuestaGuardar" style="display: none;"></div>
				</div>
				<div class="col-md-4" align="right">
					<? foreach ($con_permisos as $cp) { ?>
						<?= $cp->tBoton;?>
					<? } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- end: page -->
</section>

<!-- Scripts -->

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
	$("input:text:visible:first").focus();
});

function guardar(oObjeto){
	var eError = 0;
	var mensaje = "<div class='col-md-12 alert alert-danger'>";

	if ($("#tNombre").val().trim() == ''){
		mensaje += "<span><i class='fa fa-times'></i> El nombre no puede estar vacío</span><br>";
		eError++;
	}

	if ($("#tContacto").val().trim() == ''){
		mensaje += "<span><i class='fa fa-times'></i> El contacto no puede estar vacío</span><br>";
		eError++;
	}

	if (eError > 0){
		mensaje += "</div>";
		$('#divRespuestaGuardar').html(mensaje).slideDown(300);
		return false;
	}else{
		$(oObjeto).prop('disabled', true);
		$('#divRespuestaGuardar').html("<div class='alert alert-info'><img src='<?= base_url();?>assets/images/loader.gif' width='30px'> <strong>Procesando...</strong></div>").slideDown(300);

		$.post('<?= site_url("Interesado/guardar"); ?>', {
				tNombre: $("#tNombre").val().trim(),
				tContacto: $("#tContacto").val().trim()
			}, 
			function(data){
				$('#divRespuestaGuardar').html(data).slideDown(300);
				setTimeout(function() {
					if ($('#eExito').val()==1){
						window.location.href = "<?= site_url('Interesado/lista'); ?>";
					}else{
						$('#divRespuestaGuardar').slideUp(300);
						$(oObjeto).prop('disabled', false);
					}
				}, ($('#eExito').val()==1 ? 2000 : 3500));
			}
		).fail(function() {
			alert("Operación fallida.");
		});
	}
}
</script>
