<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    // Ambil data item berdasarkan ID
    public function get_media_by_id($id) {
        $query = $this->db->get_where('tb_media', array('id_media' => $id));
        return $query->row();
    }

    // Update data berdasarkan id
    public function update($id, $data){
        $this->db->where('id_media', $id);
        return $this->db->update('tb_media', $data);
    }

    
}
