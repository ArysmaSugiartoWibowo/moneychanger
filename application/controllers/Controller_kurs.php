<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_kurs extends CI_Controller {

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
        $this->load->view('admin/kurs/list', $data);
        $this->load->view('footer', $data);
    }

    public function create() {
        // Tetapkan aturan validasi, misalnya field 'valas' wajib diisi
        $this->form_validation->set_rules('valas', 'Valas', 'required');
        
        // Data tambahan untuk header/footer
        $data['kurs']      = $this->kurs_model->get_all_kurs();
        $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
        $data['about']     = $this->about_model->get_about_by_id(1);
        $data['owner']     = $this->owner_model->get_owner_by_id(1);
        $data['toko']      = $this->toko_model->get_toko_by_id(1);
        $data['wa']        = $this->wa_model->get_all_wa();
        
        if($this->form_validation->run() === FALSE) {
            // Tampilkan form create jika validasi gagal
            $this->load->view('header', $data);
            $this->load->view('admin/kurs/create', $data);
            $this->load->view('footer', $data);
        } else {
            // Periksa apakah ada file yang diupload untuk flag
            if (!empty($_FILES['flag']['name'])) {
                // Ambil ekstensi file asli
                $file_ext = pathinfo($_FILES['flag']['name'], PATHINFO_EXTENSION);
    
                // Buat nama unik dengan timestamp + uniqid()
                $new_filename = time() . '_' . uniqid() . '.' . $file_ext;
    
                // Konfigurasi upload
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = $new_filename;
                $config['max_size']      = 2048; // Maksimum 2MB
    
                // Inisialisasi ulang upload
                $this->upload->initialize($config);
    
                if (!$this->upload->do_upload('flag')) {
                    // Jika upload gagal, tampilkan error
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/kurs/create', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    // Ambil data file yang diupload
                    $upload_data = $this->upload->data();
                    $flag = $upload_data['file_name'];
                }
            } else {
                // Jika tidak ada file diupload, biarkan flag kosong atau isi default
                $flag = '';
            }
    
            // Siapkan data untuk diinsert
            $data_insert = array(
                'valas'    => $this->input->post('valas'),
                'pecahan'  => $this->input->post('pecahan'),
                'fisik'    => $this->input->post('fisik'),
                'th'       => $this->input->post('th'),
                'beli'     => $this->input->post('beli'),
                'jual'     => $this->input->post('jual'),
                'beli_m'     => $this->input->post('beli_m'),
                'jual_m'     => $this->input->post('jual_m'),
                'flag'     => $flag,
                'tanggal'  => date('Y-m-d H:i:s')
            );
    
            // Insert data ke database
            $this->kurs_model->insert($data_insert);
    
            // Set flashdata dan redirect
            $this->session->set_flashdata('alert', 'Data berhasil ditambahkan.');
            redirect('controller_kurs');
        }
    }
    

public function edit($id) {

    $this->form_validation->set_rules('valas', 'Valas', 'required');

                

    // Ambil data owner berdasarkan ID
    $data['tb_kurs'] = $this->kurs_model->get_kurs_by_id($id);
    if(empty($data['tb_kurs'])){
        show_404();
    }
    
    // Data tambahan untuk header/footer
    $data['kurs']      = $this->kurs_model->get_all_kurs();
    $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
    $data['about']     = $this->about_model->get_about_by_id(1);
    $data['owner']     = $this->owner_model->get_owner_by_id(1);
    $data['toko']      = $this->toko_model->get_toko_by_id(1);
    $data['wa']        = $this->wa_model->get_all_wa();

    if($this->form_validation->run() === FALSE) {
        // Tampilkan form edit dengan data yang ada
        $this->load->view('header', $data);
        $this->load->view('admin/kurs/update', $data);
        $this->load->view('footer', $data);
    } else {
        // Periksa apakah ada file yang diupload
        if (!empty($_FILES['flag']['name'])) {
            // Ambil ekstensi file asli
            $file_ext = pathinfo($_FILES['flag']['name'], PATHINFO_EXTENSION);

            // Buat nama unik dengan timestamp + uniqid()
            $new_filename = time() . '_' . uniqid() . '.' . $file_ext;

            // Konfigurasi upload
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name']     = $new_filename;
            $config['max_size']      = 2048; // Maksimum 2MB

            // Inisialisasi ulang upload
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('flag')) {
                // Jika upload gagal, tampilkan error
                $data['alert'] = $this->upload->display_errors();
                $this->load->view('header', $data);
                $this->load->view('admin/kurs/update', $data);
                $this->load->view('footer', $data);
                return;
            } else {
                // Ambil data file yang diupload
                $upload_data = $this->upload->data();
                $flag = $upload_data['file_name'];

                // Hapus flag lama jika ada
                if (!empty($data['tb_kurs']->flag) && file_exists('./uploads/'.$data['tb_kurs']->flag)) {
                    unlink('./uploads/'.$data['tb_kurs']->flag);
                }
            }
        } else {
            // Jika tidak ada file yang diupload, gunakan flag lama
            $flag = $data['tb_kurs']->flag;
        }

        $data_update = array(
            'valas' => $this->input->post('valas'),
            'pecahan' => $this->input->post('pecahan'),
            'fisik' => $this->input->post('fisik'),
            'th' => $this->input->post('th'),
            'beli' => $this->input->post('beli'),
            'jual' => $this->input->post('jual'),
            'beli_m'     => $this->input->post('beli_m'),
                'jual_m'     => $this->input->post('jual_m'),
            'tanggal'  => date('Y-m-d H:i:s'),
            'flag' => $flag
                      
        );

        // Update data kurs di database
        $this->kurs_model->update($id, $data_update);

        // Pesan sukses
        $this->session->set_flashdata('alert', 'Data berhasil diperbarui.');
        redirect('controller_kurs');
    }
}
    
        // Menghapus data
        public function delete($id){
            $this->kurs_model->delete($id);
            redirect('controller_kurs');
        }
    }