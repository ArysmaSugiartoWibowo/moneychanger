<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wa_model extends CI_Model {

    private $table = 'tb_wa';

    public function __construct(){
        parent::__construct();
    }

   
    // Ambil semua data item
    public function get_all_wa() {
        $query = $this->db->get('tb_wa');
        return $query->result();
    }

     // Ambil data berdasarkan id
     public function get_by_id($id){
        $query = $this->db->get_where($this->table, array('id_wa' => $id));
        return $query->row();
    }

    // Insert data baru
    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    // Update data berdasarkan id
    public function update($id, $data){
        $this->db->where('id_wa', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus data berdasarkan id
    public function delete($id){
        return $this->db->delete($this->table, array('id_wa' => $id));
    }

    
}
