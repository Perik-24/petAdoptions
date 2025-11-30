<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finanza extends CI_Controller {

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

	public function m9_s1() { // Listado de Donaciones

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m9_s1");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m9_s1");
		$data['con_donadores']		= $this->catalogos_m->con_donadores();

		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Finanza/donaciones', $data);
	}

    public function nuevo() { // Nueva Donacion 

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m9_s2");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m9_s2");
		$data['con_ciudades']		= $this->catalogos_m->con_ciudades();
		$data['con_estados']		= $this->catalogos_m->con_estados();
		

			$this->load->view('Encabezado/header', $data);
			$this->load->view('Encabezado/menu');
			$this->load->view('Finanza/donaciones_nuevo', $data);
		//}

	}

	public function actualizar() { // Nuevo Movimiento de Inventario

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m8_s4");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m8_s4");
		$data['con_marcas']		= $this->catalogos_m->con_marcas("AC");
		$data['con_proveedores']		= $this->catalogos_m->con_proveedores("AC");
		$data['con_productos']		= $this->catalogos_m->con_productos();
		$data['con_usuarios']		= $this->catalogos_m->con_usuarios();
		$data['con_motivos_movimiento']		= $this->catalogos_m->con_motivos_movimiento("AC");
		
			$this->load->view('Encabezado/header', $data);
			$this->load->view('Encabezado/menu');
			$this->load->view('Inventario/inventario_movimiento_nuevo', $data);
		
	}

	public function guardar() {

		/*echo "<pre>";
    print_r($this->input->post());
    echo "</pre>";
    die();*/

		$aDatos['tNombre']        = ($this->input->post("tNombre")      ? $this->input->post("tNombre")      : NULL);
		$aDatos['tApellido']   = ($this->input->post("tApellido") ? $this->input->post("tApellido") : NULL);
		$aDatos['tCorreo']    = ($this->input->post("tCorreo")  ? $this->input->post("tCorreo")  : NULL);
		$aDatos['tTelefono']       = ($this->input->post("tTelefono")     ? $this->input->post("tTelefono")     : NULL);
		$aDatos['tTipoDonador']       = ($this->input->post("tTipoDonador")     ? $this->input->post("tTipoDonador")     : NULL);
		$aDatos['tDireccion']          = ($this->input->post("tDireccion")      ? $this->input->post("tDireccion")      : NULL);
		$aDatos['eCodCiudad']          = ($this->input->post("eCodCiudad")      ? $this->input->post("eCodCiudad")      : NULL);
		$aDatos['eCodEstado']    = ($this->input->post("eCodEstado")  ? $this->input->post("eCodEstado")  : NULL);
		$aDatos['tCodigoPostal']    = ($this->input->post("tCodigoPostal")  ? $this->input->post("tCodigoPostal")  : NULL);
		$aDatos['tNotas']    = ($this->input->post("tNotas")  ? $this->input->post("tNotas")  : NULL);
		$aDatos['fhRegistro']			= date('Y/m/d H:i:s');

		// Log the data being sent to the model for easier debugging
		//log_message('debug', 'Inventario::guardar - aDatos: '.print_r($aDatos, true));

		/*echo "<pre>";
    print_r($aDatos);
    echo "</pre>";
    die();*/

		$aRes = $this->catinserts_m->ins_donacion($aDatos);

		echo "<input type=\"hidden\" id=\"eCodUsuario\" name=\"eCodDonador\" value=\"".$aRes['eCodMovimiento']."\">";
		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
		echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Registro de Donador existoso,</strong> redireccionando al listado de donadores</div>";

	}

    }
?>
