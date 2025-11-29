<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Catinserts_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('catinserts_m');
    }

    public function ins_usuario($aDatos){
        //campos de la tabla
        $data = array(
            'eCodEmpresa'       =>   $aDatos['eCodEmpresa'],
            'eCodDepartamento'  =>   $aDatos['eCodDepartamento'],
            'eCodPerfil'        =>   $aDatos['eCodPerfil'],
            'tNombre'           =>   $aDatos['tNombre'],
            'tCorreo'           =>   $aDatos['tCorreo'],
            'tTelefono'         =>   $aDatos['tTelefono'],
            'tUsuario'          =>   $aDatos['tUsuario'],
            'tPassword'         =>   $aDatos['tPassword'],
            'tPuesto'           =>   $aDatos['tPuesto'],
            'tImagen'           =>   $aDatos['tImagen'],
            'fhFechaRegistro'   =>   $aDatos['fhFechaRegistro'],
            'tCodEstatus'       =>   $aDatos['tCodEstatus']
            );
        $this->db->insert('cat_usuarios',$data);

        $aRes['eExito']         = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodUsuario']    = $this->db->insert_id();

        return $aRes;
    }

    public function ins_mascota($aDatos){
        $data = array(
            'tNombre'         => $aDatos['tNombre'],
            'eEdad'           => $aDatos['eEdad'],
            'dPeso'           => $aDatos['dPeso'],
            'tEnfermedad'     => $aDatos['tEnfermedad'],
            'tDescripcion'    => $aDatos['tDescripcion'],
            'tFoto'           => $aDatos['tFoto'],
            'eCodEspecie'     => $aDatos['eCodEspecie'],
            'eCodRaza'        => $aDatos['eCodRaza'],
            'tCodEstatus'     => $aDatos['tCodEstatus']
        );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();*/

        $this->db->insert('cat_mascotas', $data); 

        $aRes['eExito']      = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodMascota'] = $this->db->insert_id();

        if ($aRes['eExito']) {
            $aDataLog['eCodEvento']    = 1;
            $aDataLog['tEvento']       = 'La mascota: '.$aDatos['tNombre']. ' fue registrada con éxito';
            
            $this->catinserts_m->ins_log_catalogos($aDataLog);
        }

        return $aRes;

    }

    public function ins_producto($aDatos){
        $data = array(
            'tNombre'         => $aDatos['tNombre'],
            'tDescripcion'           => $aDatos['tDescripcion'],
            'eCodCategoriaProductos'           => $aDatos['eCodCategoriaProductos'],
            'eCodProveedor'     => $aDatos['eCodProveedor'],
            'eCodMarca'    => $aDatos['eCodMarca'],
            'tUnidad'           => $aDatos['tUnidad'],
            'nPrecioCompra'     => $aDatos['nPrecioCompra'],
            'nStockMinimo'        => $aDatos['nStockMinimo'],
            'tCodEstatus'     => $aDatos['tCodEstatus'],
            'fRegistro'     => $aDatos['fRegistro']
        );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();*/

        $this->db->insert('cat_productos', $data); 

        $aRes['eExito']      = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodProducto'] = $this->db->insert_id();

        if ($aRes['eExito']) {
            $aDataLog['eCodEvento']    = 1;
            $aDataLog['tEvento']       = 'El producto: '.$aDatos['tNombre']. ' fue registrado con éxito';
            
            $this->catinserts_m->ins_log_catalogos($aDataLog);
        }

        return $aRes;

    }

    public function ins_movimiento($aDatos){
        $data = array(
            'eCodProducto'         => $aDatos['eCodProducto'],
            'tTipoMovimiento'           => $aDatos['tTipoMovimiento'],
            'nCantidad'           => $aDatos['nCantidad'],
            'eCodMotivo'     => $aDatos['eCodMotivo'],
            'tOrigenDestino'     => $aDatos['tOrigenDestino'],
            'eCodUsuario'          => $aDatos['eCodUsuario'],
            'tObservaciones'          => $aDatos['tObservaciones'],
            'fhFecha'     => $aDatos['fhFecha']
        );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();*/

        $this->db->insert('pro_movimientosinventario', $data); 

        $aRes['eExito']      = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodMovimiento'] = $this->db->insert_id();

        if ($aRes['eExito']) {
            $aDataLog['eCodEvento']    = 1;
            $aDataLog['tEvento']       = 'Movimiento: '.$aDatos['tTipoMovimiento']. ' fue registrado con éxito';
            
            $this->catinserts_m->ins_log_catalogos($aDataLog);
        }

        return $aRes;

    }

    public function upd_usuario($aDatos){
        //campos de la tabla
        $data = array(
            'eCodEmpresa'       =>   $aDatos['eCodEmpresa'],
            'eCodDepartamento'  =>   $aDatos['eCodDepartamento'],
            'eCodPerfil'        =>   $aDatos['eCodPerfil'],
            'tNombre'           =>   $aDatos['tNombre'],
            'tCorreo'           =>   $aDatos['tCorreo'],
            'tTelefono'         =>   $aDatos['tTelefono'],
            'tUsuario'          =>   $aDatos['tUsuario'],
            'tPuesto'           =>   $aDatos['tPuesto'],
            'tImagen'           =>   $aDatos['tImagen'],
            'fhFechaActualizacion'  =>   $aDatos['fhFechaActualizacion']
            );
        $this->db->where('eCodUsuario', $aDatos['eCodUsuario']);

        $aRes['eExito']         = ($this->db->update('cat_usuarios',$data) ? true : false);
        $aRes['eCodUsuario']    = $aDatos['eCodUsuario'];

        return $aRes;
    }

    public function upd_usuario_password($aDatos){
        //campos de la tabla
        $data = array(
            'tPassword'             =>   $aDatos['tPassword'],
            'fhFechaActualizacion'  =>   $aDatos['fhFechaActualizacion']
            );
       //print_r($data);
       $this->db->where('eCodUsuario', $aDatos['eCodUsuario']);
        
        $aRes['eExito']         = ($this->db->update('cat_usuarios',$data) ? true : false);
        $aRes['eCodUsuario']    = $aDatos['eCodUsuario'];

        return $aRes;
    }

    public function upd_usuario_estatus($aDatos){
        //campos de la tabla
        $data = array(
            'tCodEstatus'       =>   $aDatos['tCodEstatus'],
            'fhFechaActualizacion'  =>   $aDatos['fhFechaActualizacion']
            );
        $this->db->where('eCodUsuario', $aDatos['eCodUsuario']);

        $aRes['eExito']         = ($this->db->update('cat_usuarios',$data) ? true : false);
        $aRes['eCodUsuario']    = $aDatos['eCodUsuario'];

        return $aRes;
    }


    public function ins_item($aDatos){
        $data = array(
            'tNombre'           =>   $aDatos['tNombre'],
            'eCodTipoItem'      =>   $aDatos['eCodTipoItem'],
            'tDescripcion'      =>   $aDatos['tDescripcion'],
            'dPrecio'           =>   $aDatos['dPrecio'],
            'fhFechaRegistro'   =>   $aDatos['fhFechaRegistro'],
            'tCodEstatus'       =>   $aDatos['tCodEstatus']
            );
        $this->db->insert('cat_items',$data);

        $aRes['eExito']         = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodItem']       = $this->db->insert_id();

        return $aRes;
    }

    public function upd_item($aDatos){
        $data = array(
            'eCodItem'      =>   $aDatos['eCodItem'],
            'tNombre'       =>   $aDatos['tNombre'],
            'eCodTipoItem'  =>   $aDatos['eCodTipoItem'],
            'tDescripcion'  =>   $aDatos['tDescripcion'],
            'dPrecio'       =>   $aDatos['dPrecio'],
            'tCodEstatus'   =>   $aDatos['tCodEstatus']
            );
        $this->db->where('eCodItem', $aDatos['eCodItem']);

        $aRes['eExito']         = ($this->db->update('cat_items',$data) ? true : false);
        $aRes['eCodItem']    = $aDatos['eCodItem'];

        return $aRes;
    }

    public function upd_eliminaritem($aDatos){
        $data = array('tCodEstatus' => 'EL');
        $this->db->where('eCodItem', $aDatos['eCodItem']);

        $aRes['eExito']      = ($this->db->update('cat_items',$data) ? true : false);
        $aRes['eCodItem']    = $aDatos['eCodItem'];

        return $aRes;
    }

    public function ins_perfil($aDatos) {
        //campos de la tabla
        $data = array(
            'tNombre'       =>   $aDatos['tNombre'],
            'tCodEstatus'   =>   $aDatos['tCodEstatus']
            );
        $this->db->insert('cat_perfiles',$data);

        $aRes['eExito']       = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodPerfil']   = $this->db->insert_id();

        return $aRes;
    }

    public function upd_perfil($aDatos) {
        //campos de la tabla
        $data = array(
            'tNombre'     =>   $aDatos['tNombre']
            );
        $this->db->where('eCodPerfil', $aDatos['eCodPerfil']);

        $aRes['eExito']       = ($this->db->update('cat_perfiles',$data) ? true : false);
        $aRes['eCodPerfil']   = $this->db->insert_id();

        return $aRes;
    }

    public function ins_perfilpermiso($aDatos) {
        //campos de la tabla
        $data = array(
            'eCodPerfil'    =>   $aDatos['eCodPerfil'],
            'eCodPermiso'   =>   $aDatos['eCodPermiso']
            );
        $this->db->insert('rel_perfilespermisos',$data);

        $aRes['eExito']             = ($this->db->affected_rows() != 1) ? false : true;
        $aRes['eCodPerfilPermiso']  = $this->db->insert_id();

        return $aRes;
    }

    public function del_perfilpermiso($aDatos) {
        //campos de la tabla
        $data = array(
            'eCodPerfil' => $aDatos['eCodPerfil']
            );
        $this->db->where('eCodPerfil', $aDatos['eCodPerfil']);

        $aRes['eExito'] = ($this->db->delete('rel_perfilespermisos',$data) ? true : false);

        return $aRes;
    }

    public function ins_log_catalogos($aDatos) {
        //campos de la tabla
        $data = array(
            'eCodUsuario'       =>  ($this->session->userdata('eCodUsuario')  ? $this->session->userdata('eCodUsuario') : $aDatos['eCodUsuario']),
            'eCodEvento'        =>  ($aDatos['eCodEvento']  ? $aDatos['eCodEvento'] : NULL),
            'tEvento'           =>  ($aDatos['tEvento']     ? $aDatos['tEvento']    : NULL),
            'fhFechaRegistro'   =>  mdate('%Y/%m/%d %H:%i:%s', time()),
            'tCodEstatus'       =>  "AC"
            );

        $this->db->insert('pro_logseventos',$data);

        $aRes['eExito']         = ($this->db->affected_rows() != 1) ? 0 : 1;
        $aRes['eCodLogEvento']  = $this->db->insert_id();

        return $aRes;
    }

}
?>