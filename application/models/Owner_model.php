<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    // Ambil data item berdasarkan ID
    public function get_owner_by_id($id) {
        $query = $this->db->get_where('tb_owner', array('id_owner' => $id));
        return $query->row();
    }

        // Update data berdasarkan id
        public function update($id, $data){
            $this->db->where('id_owner', $id);
            return $this->db->update('tb_owner', $data);
        }
    

    
}
