<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

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

	public function m8_s1() { // Mascota Nuevo

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m8_s1");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m8_s1");

		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Inventario/inventario_producto', $data);
	}

    public function m8_s2() { // Listado de Mascotas

		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m8_s2");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m8_s2");
		$data['con_productos']		= $this->catalogos_m->con_productos();


		$this->load->view('Encabezado/header', $data);
		$this->load->view('Encabezado/menu');
		$this->load->view('Inventario/inventario_producto', $data);

	}

	public function nuevo() {
		//echo "Nuevo Producto";
		//if (!$eCodUsuario){
		//	redirect(site_url("Inventario/m8_s2"));
		//} else {
		$data['con_seccion']		= $this->secciones_m->con_secciones(false, false, "m8_s3");
		$data['con_menu']				= $this->secciones_m->con_menu($this->session->userdata("eCodPerfil"));
		$data['con_permisos']		= $this->secciones_m->con_perfilpermiso($this->session->userdata("eCodPerfil"), "m8_s3");
		$data['con_categoriasproductos']			= $this->catalogos_m->con_categoriasproductos();
		$data['con_marcas']		= $this->catalogos_m->con_marcas("AC");
		$data['con_proveedores']		= $this->catalogos_m->con_proveedores("AC");
		

			$this->load->view('Encabezado/header', $data);
			$this->load->view('Encabezado/menu');
			$this->load->view('Inventario/inventario_nuevo', $data);
		//}

	}

	public function guardar() {

		/*echo "<pre>";
    print_r($this->input->post());
    echo "</pre>";
    die();*/

		$aDatos['tNombre']        = ($this->input->post("tNombre")      ? $this->input->post("tNombre")      : NULL);
		$aDatos['tDescripcion']   = ($this->input->post("tDescripcion") ? $this->input->post("tDescripcion") : NULL);
		$aDatos['eCodCategoriaProductos']    = ($this->input->post("eCodCategoriaProductos")  ? $this->input->post("eCodCategoriaProductos")  : NULL);
		$aDatos['eCodProveedor']       = ($this->input->post("eCodProveedor")     ? $this->input->post("eCodProveedor")     : NULL);
		$aDatos['eCodMarca']       = ($this->input->post("eCodMarca")     ? $this->input->post("eCodMarca")     : NULL);
		$aDatos['tUnidad']          = ($this->input->post("unidadesVal")      ? $this->input->post("unidadesVal")      : NULL);
		$aDatos['nPrecioCompra']          = ($this->input->post("precioVal")      ? $this->input->post("precioVal")      : NULL);
		$aDatos['nStockMinimo']    = ($this->input->post("nStockMinimo")  ? $this->input->post("nStockMinimo")  : NULL);
		$aDatos['tCodEstatus']			= 'AC';
		$aDatos['fRegistro']			= date('Y/m/d H:i:s');

		// Log the data being sent to the model for easier debugging
		//log_message('debug', 'Inventario::guardar - aDatos: '.print_r($aDatos, true));

		/*echo "<pre>";
    print_r($aDatos);
    echo "</pre>";
    die();*/

		$aRes = $this->catinserts_m->ins_producto($aDatos);

		echo "<input type=\"hidden\" id=\"eCodUsuario\" name=\"eCodProducto\" value=\"".$aRes['eCodProducto']."\">";
		echo "<input type=\"hidden\" id=\"eExito\" name=\"eExito\" value=\"".$aRes['eExito']."\">";
		echo "<div class=\"alert alert-success\"><strong><i class=\"fa fa-check\"></i> Registro de Producto existoso,</strong> redireccionando al listado de productos</div>";

	}

    }
?>
