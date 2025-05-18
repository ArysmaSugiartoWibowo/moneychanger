<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    // Ambil data item berdasarkan ID
    public function get_toko_by_id($id) {
        $query = $this->db->get_where('tb_toko', array('id_toko' => $id));
        return $query->row();
    }

        // Update data berdasarkan id
        public function update($id, $data){
            $this->db->where('id_toko', $id);
            return $this->db->update('tb_toko', $data);
        }

    
}
