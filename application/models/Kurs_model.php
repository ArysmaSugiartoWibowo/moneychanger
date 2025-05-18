<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurs_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    // Ambil semua data item
    public function get_all_kurs() {
        $query = $this->db->get('tb_kurs');
        return $query->result();
    }

    // Ambil data item berdasarkan ID
    public function get_kurs_by_id($id) {
        $query = $this->db->get_where('tb_kurs', array('id_kurs' => $id));
        return $query->row();
    }

        // Update data berdasarkan id
        public function update($id, $data){
            $this->db->where('id_kurs', $id);
            return $this->db->update('tb_kurs', $data);
        }


        public function insert($data_insert){
            return $this->db->insert('tb_kurs', $data_insert);
        }


        // Hapus data berdasarkan id
    public function delete($id){
        return $this->db->delete('tb_kurs', array('id_kurs' => $id));
    }
}
