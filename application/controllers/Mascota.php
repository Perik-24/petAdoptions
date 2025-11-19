<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->seguridad();
		$this->load->model('secciones_m');
		$this->load->model('consultas_m');
		$this->load->model('catalogos_m');
		$this->load->model('catinserts_m');
		$this->load->model('inserts_m');
		$this->load->helper('date_helper');
		date_default_timezone_set('America/Mexico_City');

	}

	function seguridad() {
		if (!$this->session->userdata('bSesion')) {
			redirect(base_url());
		}
	}

	public function m3_s1() { // Mascota Nuevo

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m3_s1");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m3_s1");
		$data['con_razas']			= $this->catalogos_m->con_razas("AC");
		$data['con_especies']		= $this->catalogos_m->con_especies("AC");

		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Mascota/mascota_nuevo', $data);

	}

	public function m3_s2() { // Listado de Mascotas

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m3_s2");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m3_s2");
		$data['con_razas']			= $this->catalogos_m->con_razas("AC");
		$data['con_especies']		= $this->catalogos_m->con_especies("AC");
		$data['con_mascotas']		= $this->catalogos_m->con_mascotas("AC");


		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Mascota/mascota', $data);

	}

	public function m2_s3() { // Perfil

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m2_s3");
		$data['con_menu']			= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m2_s3");
		$data['con_perfiles']		= $this->catalogos_m->con_perfiles();

		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Intranet/usuario_perfil', $data);

	}

	public function editar($eCodUsuario = false) {
		
		if (!$eCodUsuario){
			redirect(site_url("Mascota/m3_s2"));
		} else {
		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m3_s1");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m3_s1");
		$data['con_razas']			= $this->catalogos_m->con_razas("AC");
		$data['con_especies']		= $this->catalogos_m->con_especies("AC");

			$this->load->view('Encabezado/header', $data);
			$this->load->view('Encabezado/menu');
			$this->load->view('Mascota/mascota_editar', $data);
		}

	}

	public function detalle() {
		/*echo "<pre>";
        print_r("Hola detalle");
        echo "</pre>";
        die();*/
		$con_mascotas = $this->catalogos_m->con_mascotas(false,$this->input->post("eCodMascota"));
		foreach ($con_mascotas as $cm) { 
echo  "<div class=\"panel-body\">
          <div class=\"modal-icon\">
            <div class=\"thumb-info mb-md\">
              <img id=\"imgPerfil\" src=\"".base_url().($cm->tFoto ? $cm->tFoto : 'assets/images/placeholder.png')."\" class=\"rounded img-responsive\">
            </div>
          </div>
          <div class=\"modal-text\">
            <blockquote class=\"primary\">
              <h3> ".$cm->tMascota."</h3>
            </blockquote>
            <div >
            <table width=\"100%\" class=\"table table-striped mb-none\">
              <tbody>
                <tr>
                  <th colspan=\"2\" width=\"50%\">Especie:</th>
                  <th colspan=\"2\" width=\"50%\">Raza:</th>
                </tr>
                <tr>
                  <td width=\"5%\"></td>
                  <td>".$cm->tEspecie."</td>
                  <td width=\"5%\"></td>
                  <td>".$cm->tRaza."</td>
                </tr>
                <tr>
                  <th colspan=\"2\" width=\"50%\">Edad:</th>
                  <th colspan=\"2\" width=\"50%\">Peso:</th>
                </tr>
                <tr>
                  <td width=\"5%\"></td>
                  <td>".$cm->eEdad." año(s)</td>
                  <td width=\"5%\"></td>
                  <td>".$cm->dPeso." kg</td>
                </tr>
                <tr>
                  <th colspan=\"2\" width=\"30%\">Enfermedad:</th>
                  <th colspan=\"2\" width=\"30%\">Descripción:</th>
                </tr>
                <tr>
                  <td width=\"5%\"></td>
                  <td>".$cm->tEnfermedad."</td>
                  <td width=\"5%\"></td>
                  <td>".$cm->tDescripcion."</td>
                </tr>
                <tr>
                  <th colspan=\"2\" width=\"30%\">Estatus:</th>
                  <th colspan=\"2\" width=\"30%\"></th>
                </tr>
                <tr>
                  <td width=\"5%\"></td>
                  <td><span class=\"".$cm->tClase."\">".$cm->tEstatus."</span></td>
                  <td width=\"5%\"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <br>";
echo      "</div>
          </div>
        </div>";
		}

	}

	public function detalle_perfil() {
		$aPermisos			= '';
		$eCodPerfil			= $this->input->post("eCodPerfil");
		$bHabilitar			= ($this->input->post("bHabilitar") ? $this->input->post("bHabilitar") : 0);
		$con_perfilpermiso	= $this->secciones_m->con_perfilpermiso($eCodPerfil);

		$con_modulos = $this->secciones_m->con_modulos();
		foreach ($con_modulos as $cm) {
			echo "<li>
					<label>
						<div class=\"checkbox-custom checkbox-primary\">
							<input type=\"checkbox\" id=\"m-".$cm->tCodModulo."\">
							<label for=\"m-".$cm->tCodModulo."\">
								<i class=\"".$cm->tIcono."\"></i> ".$cm->tNombre."
							</label>
						</div>
					</label>";
				$con_secciones = $this->secciones_m->con_secciones(false, $cm->eCodModulo);
				if (isset($con_secciones)){ 
					echo "<ul>";
					foreach ($con_secciones as $cs) {
						echo "<li>
								<label>
									<div class=\"checkbox-custom checkbox-primary\">
										<input type=\"checkbox\" id=\"s-".$cs->tCodSeccion."\"/> 
										<label for=\"s-".$cs->tCodSeccion."\">
											".$cs->tSeccion."
										</label>
									</div>
								</label>";
							$con_permisos = $this->secciones_m->con_permisos(false, $cs->eCodSeccion);
							if (isset($con_permisos)){ 
								echo "<ul>";
								foreach ($con_permisos as $cp) { 
									echo "<li>
											<input type=\"checkbox\" id=\"p-".$cp->eCodPermiso."\" value=\"".$cp->eCodPermiso."\"/> 
											<label for=\"p-".$cp->eCodPermiso."\">
												".$cp->tNombre."
											</label>
										</li>";
								}
								echo "</ul>";
							}
						echo "</li>";
					}
					echo "</ul>";
				}
			echo "</li>";
		}

		if (isset($con_perfilpermiso)){
			foreach ($con_perfilpermiso as $cpp) {
				$aPermisos .= ($aPermisos=='' ? $cpp->eCodPermiso : ','.$cpp->eCodPermiso);
			}
		}

		echo "<input type=\"hidden\" id=\"aPermisos\" name=\"aPermisos\" value=\"".$aPermisos."\">";

	}

	public function guardar() {

		/*echo "<pre>";
    print_r($this->input->post());
    echo "</pre>";
    die();*/

		$aDatos['tNombre']        = ($this->input->post("tNombre")      ? $this->input->post("tNombre")      : NULL);
		$aDatos['eEdad']          = ($this->input->post("edadVal")      ? $this->input->post("edadVal")      : NULL);
		$aDatos['dPeso'] 					= ($this->input->post("pesoVal") ? str_replace(',', '.', $this->input->post("pesoVal")) : NULL);
		$aDatos['tEnfermedad']    = ($this->input->post("tEnfermedad")  ? $this->input->post("tEnfermedad")  : NULL);
		$aDatos['tDescripcion']   = ($this->input->post("tDescripcion") ? $this->input->post("tDescripcion") : NULL);
		$aDatos['tFoto']          = ($this->input->post("tFoto")        ? $this->input->post("tFoto")        : NULL);
		$aDatos['eCodEspecie']    = ($this->input->post("eCodEspecie")  ? $this->input->post("eCodEspecie")  : NULL);
		$aDatos['eCodRaza']       = ($this->input->post("eCodRaza")     ? $this->input->post("eCodRaza")     : NULL);

		$aDatos['tCodEstatus']			= 'AC';

		/*echo "<pre>";
    print_r($aDatos);
    echo "</pre>";
    die();*/

		$aRes = $this->catinserts_m->ins_mascota($aDatos);

		echo "<input type=\"hidden\" id=\"eCodUsuario\" name=\"eCodMascota\" value=\"".$aRes['eCodMascota']."\">";
		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
		echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Registro de Mascota existoso,</strong> redireccionando al listado de mascotas</div>";

	}

	public function actualizar() {
		$aDatos['eCodUsuario'] 			= ($this->input->post("eCodUsuario")		? $this->input->post("eCodUsuario") 		: NULL);
		$aDatos['eCodEmpresa'] 			= ($this->input->post("eCodEmpresa")		? $this->input->post("eCodEmpresa") 		: NULL);
		$aDatos['eCodPerfil'] 			= ($this->input->post("eCodPerfil")			? $this->input->post("eCodPerfil") 			: NULL);
		$aDatos['eCodDepartamento'] 	= ($this->input->post("eCodDepartamento")	? $this->input->post("eCodDepartamento") 	: NULL);
		$aDatos['tNombre'] 				= ($this->input->post("tNombre")			? $this->input->post("tNombre") 			: NULL);
		$aDatos['tCorreo'] 				= ($this->input->post("tCorreo")			? $this->input->post("tCorreo") 			: NULL);
		$aDatos['tTelefono'] 			= ($this->input->post("tTelefono")			? $this->input->post("tTelefono") 			: NULL);
		$aDatos['tUsuario'] 			= ($this->input->post("tUsuario")			? $this->input->post("tUsuario") 			: NULL);
		$aDatos['tPuesto'] 				= ($this->input->post("tPuesto")			? $this->input->post("tPuesto") 			: NULL);
		$aDatos['tImagen'] 				= ($this->input->post("tImagen")			? $this->input->post("tImagen") 			: NULL);
		$aDatos['fhFechaActualizacion'] = mdate('%Y/%m/%d %H:%i:%s', time());
		
		$aRes = $this->catinserts_m->upd_usuario($aDatos);

		echo "<input type=\"hidden\" id=\"eCodUsuario\" name=\"eCodUsuario\" value=\"".$aRes['eCodUsuario']."\">";
		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
		echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Usuario actualizado,</strong> redireccionando al listado de usuarios</div>";
		// ----- EMAIL 
		//$correo = $this->correos->nuevo_usuario($aRes['eCodUsuario']);
		// ------ END DE MAIL
	
	}

	public function guardar_password() {
		$aDatos['eCodUsuario']			= ($this->input->post("eCodUsuario")		? $this->input->post("eCodUsuario") 		: NULL);
		$aDatos['tPassword']			= ($this->input->post("tPassword")			? sha1($this->input->post("tPassword")) 	: NULL);
		$aDatos['tPasswordN']			= ($this->input->post("tPassword")			? $this->input->post("tPassword") 			: NULL);
		$aDatos['fhFechaActualizacion'] = mdate('%Y-%m-%d %H:%i:%s', time());

		$aRes = $this->catinserts_m->upd_usuario_password($aDatos);

		echo "<input type=\"hidden\" id=\"eCodUsuario\" name=\"eCodUsuario\" value=\"".$aRes['eCodUsuario']."\">";
		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
		echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Usuario actualizado,</strong> redireccionando al listado de usuarios</div>";
		// ----- EMAIL 
		//$correo = $this->correos->nuevo_usuario($aRes['eCodUsuario']);
		// ------ END DE MAIL
	
	}

	public function guardar_perfil() {
		$aDatos['tNombre']		= ($this->input->post("tNombre")	? $this->input->post("tNombre") 	: NULL);
		$aDatos['aPermisos']	= ($this->input->post("aPermisos")	? $this->input->post("aPermisos")	: NULL);
		$aDatos['tCodEstatus']	= "AC";

		$aRes = $this->catinserts_m->ins_perfil($aDatos);
		
		if ($aRes['eExito']){

			for ($i=0; $i < sizeof($aDatos['aPermisos']); $i++) { 

				$aDatos1['eCodPerfil'] 	= $aRes['eCodPerfil'];
				$aDatos1['eCodPermiso'] = $aDatos['aPermisos'][$i]['eCodPermiso'];

				$aRes1 = $this->catinserts_m->ins_perfilpermiso($aDatos1);
			}

			echo "<input type=\"hidden\" id=\"eCodPerfil\" name=\"eCodPerfil\" value=\"".$aRes['eCodPerfil']."\">";
			echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
			echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Perfil guardado con éxito,</strong> redireccionando página</div>";
			// ----- EMAIL 
			//$correo = $this->correos->nuevo_usuario($aRes['eCodUsuario']);
			// ------ END DE MAIL
		}

	}

	public function actualizar_perfil() {
		$aDatos['eCodPerfil']	= ($this->input->post("eCodPerfil")	? $this->input->post("eCodPerfil") 	: NULL);
		$aDatos['tNombre']		= ($this->input->post("tNombre")	? $this->input->post("tNombre") 	: NULL);
		$aDatos['aPermisos']	= ($this->input->post("aPermisos")	? $this->input->post("aPermisos")	: NULL);

		$aRes = $this->catinserts_m->upd_perfil($aDatos);

		if ($aRes['eExito']){

			$aDel = $this->catinserts_m->del_perfilpermiso($aDatos);

			for ($i=0; $i < sizeof($aDatos['aPermisos']); $i++) { 

				$aDatos1['eCodPerfil']	= $aDatos['eCodPerfil'];
				$aDatos1['eCodPermiso'] = $aDatos['aPermisos'][$i]['eCodPermiso'];

				$aRes1 = $this->catinserts_m->ins_perfilpermiso($aDatos1);
			}

			echo "<input type=\"hidden\" id=\"eCodPerfil\" name=\"eCodPerfil\" value=\"".$aRes['eCodPerfil']."\">";
			echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
			echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Perfil actualizado,</strong> redireccionando al listado de perfiles</div>";
			// ----- EMAIL 
			//$correo = $this->correos->nuevo_usuario($aRes['eCodUsuario']);
			// ------ END DE MAIL
		}

	}

	public function eliminar_mascota() {

		$aDatos['eCodMascota']			= ($this->input->post("eCodMascota")	? $this->input->post("eCodMascota")	: NULL);

		$aRes = $this->inserts_m->upd_mascota_estatus($aDatos);

		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";

		if ($aRes['eExito']==1) {

			echo "<input type=\"hidden\" id=\"eCodMascota\" name=\"eCodMascota\" value=\"".$aRes['eCodMascota']."\">";
			echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Datos de mascota actualizados con éxito! </strong> redireccionando el listado..</div>";
		} else {
			echo "<div class=\"alert alert-danger\"><strong><i class=\"fa fa-times\"></i> ¡Error Inesperado, Cod. 101! </strong>, intente más tarde, si persiste el error llame a soporte.</div>";
		}

	}

	public function filtro_usuario(){
		
		$eCodDepartamento	= ($this->input->post("eCodDepartamento")	? $this->input->post("eCodDepartamento") : false);

		$con_permisos	= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m2_s2");
		$con_usuarios	= $this->catalogos_m->con_usuarios(false, false, $eCodDepartamento);
		

		echo 	"<table class=\"table table-bordered table-striped mb-none\" id=\"datatable-default\">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Departamento</th>
							<th>Correo</th>
							<th>Usuario</th>
							<th>Perfil Usuario</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>";

		if (isset($con_usuarios)){
			foreach ($con_usuarios as $dato) {
				echo 	"<tr>
							<td>".$dato->tNombre."</td>
							<td>".$dato->tDepartamento."</td>
							<td>".$dato->tCorreo."</td>
							<td>".$dato->tUsuario."</td>
							<td>".$dato->tPerfil."</td>
							<td>
								<div id=\"".$dato->eCodUsuario."\" class=\"btn-group\">";
									foreach ($con_permisos as $cp) { 
										if (strrpos($cp->aEstatus, $dato->tCodEstatus)!==false) { 
											echo $cp->tBoton;
										}	
									}
				echo			"</div>
							</td>
						</tr>";
			}

		}

		echo		"</tbody>
				</table>";

	}

	public function subirArchivo() {

		// Asegurar que la carpeta de destino existe
		$upload_path = './images/mascotas';
		if (!is_dir($upload_path)) {
			@mkdir($upload_path, 0755, true);
		}

		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size'] = '50000';

		$this->load->library('upload', $config);

		// Nombre del campo en FormData: 'userfile'
		if ( ! $this->upload->do_upload('userfile')) {
			$error_msg = $this->upload->display_errors('', '');
			$response = array(
				'success' => false,
				'message' => $error_msg,
				'path' => ''
			);
		} else {
			$data = $this->upload->data();
			$response = array(
				'success' => true,
				'message' => 'Archivo subido correctamente',
				'path' => 'images/mascotas/' . $data['file_name']
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);

	}

	public function ver_correofirma($eCodUsuario){
		if (!$eCodUsuario) {
			echo "";
		} else {
			$con_usuario 	= $this->catalogos_m->con_usuarios($eCodUsuario);
			$fFirma			= imagecreatefromjpeg('./images/usuarios/firma/Ayuntamiento de Manzanillo_navidad.jpg');
			//$tFontRegular	= './images/usuarios/font/arialnarrow.otf';
			$tFontBold		= './images/usuarios/font/arialnarrow-bold.ttf';
			$tFontItalic	= './images/usuarios/font/arialnarrow-bolditalic.ttf';
			$tColorBlanco	= imagecolorallocate($fFirma, 255, 255, 255);
			$tColorNegro	= imagecolorallocate($fFirma, 0, 0, 0);

			foreach ($con_usuario as $dato) {
				$tNombre	= trim($dato->tNombre);
				$tPuesto	= trim($dato->tPuesto);
				$tCorreo	= trim($dato->tCorreo);
				$tCelular	= ($dato->tTelefono ? "Cel: ".trim($dato->tTelefono) : "");
				$tTelefono	= "Tel: 01 (314) 138 46 62 / 63";

				$aDimension	= imagettfbbox((strlen($tNombre)>30 ? 35 : 45), 0, $tFontBold, $tNombre);
				$eTextWidth	= abs($aDimension[4] - $aDimension[0]);
				$x			= imagesx($fFirma) - $eTextWidth;
				imagettftext($fFirma, (strlen($tNombre)>30 ? 35 : 45), 0, $x-580, 80, $tColorNegro, $tFontBold, $tNombre);

				$aDimension	= imagettfbbox((strlen($tPuesto)>35 ? 25 : 35), 0, $tFontBold, $tPuesto);
				$eTextWidth	= abs($aDimension[4] - $aDimension[0]);
				$x			= imagesx($fFirma) - $eTextWidth;
				imagettftext($fFirma, (strlen($tPuesto)>35 ? 25 : 35), 0, $x-580, 125, $tColorBlanco, $tFontBold, $tPuesto);

				$aDimension	= imagettfbbox((strlen($tCorreo)>35 ? 25 : 35), 0, $tFontItalic, $tCorreo);
				$eTextWidth	= abs($aDimension[4] - $aDimension[0]);
				$x			= imagesx($fFirma) - $eTextWidth;
				imagettftext($fFirma, (strlen($tCorreo)>35 ? 25 : 35), 0, $x-580, 165, $tColorBlanco, $tFontItalic, $tCorreo);

				$aDimension	= imagettfbbox(35, 0, $tFontBold, $tTelefono);
				$eTextWidth	= abs($aDimension[4] - $aDimension[0]);
				$x			= imagesx($fFirma) - $eTextWidth;
				imagettftext($fFirma, 35, 0, $x-580, 250, $tColorBlanco, $tFontBold, $tTelefono);

				$aDimension	= imagettfbbox(35, 0, $tFontBold, $tCelular);
				$eTextWidth	= abs($aDimension[4] - $aDimension[0]);
				$x			= imagesx($fFirma) - $eTextWidth;
				imagettftext($fFirma, 35, 0, $x-580, 300, $tColorBlanco, $tFontBold, $tCelular);
			}

			imagejpeg($fFirma,'./images/usuarios/firma/'.$dato->eCodUsuario.'.jpg');

			echo "<img src='".base_url()."/images/usuarios/firma/".$dato->eCodUsuario.".jpg' width='100%'>";

		}
	}

}
?>