<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_about extends CI_Controller {

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

 // Mengedit data about yang sudah ada
public function edit($id) {
    // Set aturan validasi untuk field 'tentang_kami'
    $this->form_validation->set_rules('tentang_kami', 'Tentang Kami', 'required');
    
    // Ambil data about berdasarkan parameter id
    $data['tb_about'] = $this->about_model->get_about_by_id($id);
    if (empty($data['tb_about'])) {
        show_404();
    }
    
    // Ambil data tambahan untuk header/footer jika diperlukan
    $data['kurs']      = $this->kurs_model->get_all_kurs();
    $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
    // Perhatikan: $data['about'] di sini diambil dengan id 1 sesuai kebutuhan header/footer
    $data['about']     = $this->about_model->get_about_by_id(1);
    $data['owner']     = $this->owner_model->get_owner_by_id(1);
    $data['toko']      = $this->toko_model->get_toko_by_id(1);
    $data['wa']        = $this->wa_model->get_all_wa();
    
    if ($this->form_validation->run() === FALSE) {
        // Tampilkan form edit dengan data yang ada
        $this->load->view('header', $data);
        $this->load->view('admin/about/update', $data);
        $this->load->view('footer', $data);
    } else {
        // Ambil data dari input form
        $data_update = array(
            'tentang_kami' => $this->input->post('tentang_kami')
        );
        // Update data about berdasarkan id
        $this->about_model->update($id, $data_update);
        
        // Tambahkan pesan alert untuk update sukses
        $data['alert'] = 'Data berhasil diupdate.';
        // Refresh data setelah update
        $data['tb_about'] = $this->about_model->get_about_by_id($id);
        
        // Tampilkan kembali form edit dengan alert sukses
        $this->load->view('header', $data);
        $this->load->view('admin/about/update', $data);
        $this->load->view('footer', $data);
    }
}



}
        
