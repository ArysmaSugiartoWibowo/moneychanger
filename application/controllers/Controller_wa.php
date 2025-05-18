<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_wa extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('kurs_model');
		$this->load->model('jumbotron_model');
		$this->load->model('about_model');
		$this->load->model('owner_model');
        $this->load->model('toko_model');
        $this->load->model('wa_model');
        $this->load->model('media_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->library(array('session', 'upload'));
        if (!$this->session->userdata('username')) {
            // Belum login, redirect ke halaman login
            redirect('auth/login');
        } else {
            // Setelah username ada, periksa role_id
            if ($this->session->userdata('role_id') != 1) {
                // Jika role_id bukan admin, redirect atau tampilkan pesan error
                redirect('auth/not_authorized'); // misal, buat halaman not_authorized
            }
        }
    }

	 // Menampilkan daftar item
    public function index() {
        
        
        $data['kurs'] = $this->kurs_model->get_all_kurs();
		$data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
		$data['about'] = $this->about_model->get_about_by_id(1);
		$data['owner'] = $this->owner_model->get_owner_by_id(1);
        $data['toko'] = $this->toko_model->get_toko_by_id(1);
        $data['wa'] = $this->wa_model->get_all_wa();
        $data['media'] = $this->media_model->get_media_by_id(1);

        $this->load->view('header', $data);
        $this->load->view('admin/wa/list', $data);
        $this->load->view('footer', $data);
    }

        // Menambah data baru
public function create(){
    $this->load->model('wa_model');

    $data['kurs'] = $this->kurs_model->get_all_kurs();
    $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
    $data['about'] = $this->about_model->get_about_by_id(1);
    $data['owner'] = $this->owner_model->get_owner_by_id(1);
    $data['toko'] = $this->toko_model->get_toko_by_id(1);
    $data['wa'] = $this->wa_model->get_all_wa();
    $data['media'] = $this->media_model->get_media_by_id(1);

    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    $this->form_validation->set_rules('nomor_wa', 'Nomor WA', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('header', $data);
        $this->load->view('admin/wa/create', $data);
        $this->load->view('footer', $data);
    } else {
        $data_create = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'nomor_wa' => $this->input->post('nomor_wa')
        );
        $this->wa_model->insert($data_create);
        redirect('controller_wa');
    }
}

    
        // Mengedit data yang sudah ada
        public function edit($id){

            
    $data['kurs'] = $this->kurs_model->get_all_kurs();
    $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
    $data['about'] = $this->about_model->get_about_by_id(1);
    $data['owner'] = $this->owner_model->get_owner_by_id(1);
    $data['toko'] = $this->toko_model->get_toko_by_id(1);
    $data['wa'] = $this->wa_model->get_all_wa();
    $data['media'] = $this->media_model->get_media_by_id(1);
            $data['tb_wa'] = $this->wa_model->get_by_id($id);
            if(empty($data['tb_wa'])){
                show_404();
            }
            
            $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
            $this->form_validation->set_rules('nomor_wa', 'Nomor WA', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('header', $data);
        $this->load->view('admin/wa/update', $data);
        $this->load->view('footer', $data);
            } else {
                $data_update = array(
                    'nama_admin' => $this->input->post('nama_admin'),
                    'nomor_wa' => $this->input->post('nomor_wa')
                );
                $this->wa_model->update($id, $data_update);
                redirect('controller_wa');
            }
        }
    
        // Menghapus data
        public function delete($id){
            $this->wa_model->delete($id);
            redirect('controller_wa');
        }
}