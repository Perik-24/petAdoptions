
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
							</section>
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