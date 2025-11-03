	
<aside id="sidebar-left" class="sidebar-left">
				
	<div class="sidebar-header">
		<div class="sidebar-title">
			Men&uacute;
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>
	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li>
						<a href="<?= site_url("Panel");?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Inicio</span>
						</a>
					</li>
					<? 	$eCodSeccionActivo = 0;
						$eCodModuloActivo  = 0;
						if (isset($con_seccion)){
							foreach ($con_seccion as $cs) { 
								$eCodSeccionActivo = $cs->eCodSeccion;
								$eCodModuloActivo  = $cs->eCodModulo;
							} 	
						}	?>
					<? 	if (isset($con_menu)) {
							$eCodModulo = 0; 
					 		foreach ($con_menu as $m) { 
					 			if ($eCodModulo != $m->eCodModulo){ ?>
					 				<?= ($eCodModulo==0 ? "" : "</ul></il>"); ?>
					 				<li class="nav-parent <?= ($m->eCodModulo==$eCodModuloActivo ? 'nav-expanded nav-active' : '');?>">	
										<a>
											<i class="<?= $m->tModuloIcono;?>" aria-hidden="true"></i>
											<span><?= $m->tModuloCorto;?></span>
										</a>
										<ul class="nav nav-children">
											<li class="<?= ($m->eCodSeccion==$eCodSeccionActivo ? 'nav-active' : '');?>">
												<a href="<?= site_url($m->tControlador."/".$m->tCodSeccion);?>">
													<i class="<?= $m->tSeccionIcono;?>"></i><?= $m->tSeccionCorto;?>
												</a>
											</li>
					<?			} else { 	?>
										<li class="<?= ($m->eCodSeccion==$eCodSeccionActivo ? 'nav-active' : '');?>">
											<a href="<?= site_url($m->tControlador."/".$m->tCodSeccion);?>">
												<i class="<?= $m->tSeccionIcono;?>"></i><?= $m->tSeccion;?>
											</a>
										</li>
					<? 			} 	
								$eCodModulo = $m->eCodModulo;
							}
						} 		?>
				</ul>
			</nav>
				
		</div>

	</div>
				
</aside>