<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inserts_m extends CI_Model {

	function __construct(){
		parent::__construct();
	}

    public function ins_log($aDatos) {
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

        public function upd_mascota_estatus($aDatos) {
        //campos de la tabla
        $data = array(
            'tCodEstatus'           =>  "CA",
            );
        $this->db->where('eCodMascota', $aDatos['eCodMascota']);

        $aRes['eExito']         = ($this->db->update('cat_mascotas',$data) ? true : false);
        $aRes['eCodMascota']    = $aDatos['eCodMascota'];
        $aRes['aError']         = $this->db->error();

        $aData['tEvento']       = "Se actualizó la Mascota con Id #".$aRes['eCodMascota'];
        $aData['eCodEvento']    = 2;
        $this->ins_log($aData);

        return $aRes;
    }

}
?>