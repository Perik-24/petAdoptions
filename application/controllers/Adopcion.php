<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adopcion extends CI_Controller {

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

	public function m4_s1() { // Adopcion Nuevo

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m4_s1");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m4_s1");

		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('adopciones/adopciones_nuevo', $data);
	}

    public function m4_s2() { // Listado de Adopciones

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m4_s2");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m4_s2");


		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('adopciones/adopciones', $data);

	}

	public function m4_s3() { // Listado de Adopciones

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m4_s2");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m4_s2");


		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('adopciones/adopciones', $data);

	}

    }
	
?>