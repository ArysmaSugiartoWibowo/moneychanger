<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_toko extends CI_Controller {

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

    public function edit($id) {
        // Aturan validasi untuk field teks (contoh: nama_toko, lokasi, dsb.)
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('lokasi_toko', 'Lokasi Toko', 'required');
        $this->form_validation->set_rules('lokasi_maps', 'Lokasi Maps', 'required');

        // Ambil data toko berdasarkan ID
        $data['tb_toko'] = $this->toko_model->get_toko_by_id($id);
        if(empty($data['tb_toko'])){
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
            $this->load->view('admin/toko/update', $data);
            $this->load->view('footer', $data);
        } else {
            // --- Proses Upload File untuk logo_toko ---
            if (!empty($_FILES['logo_toko']['name'])) {
                // Ambil ekstensi file asli untuk logo
                $ext_logo = pathinfo($_FILES['logo_toko']['name'], PATHINFO_EXTENSION);
                // Buat nama unik untuk logo
                $new_filename_logo = time() . '_logo_' . uniqid() . '.' . $ext_logo;

                // Konfigurasi upload untuk logo
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = $new_filename_logo;
                $config['max_size']      = 2048; // Maksimum 2MB

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('logo_toko')) {
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/toko/update', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    $upload_data_logo = $this->upload->data();
                    $logo_toko = $upload_data_logo['file_name'];

                    // Hapus file logo lama jika ada
                    if (!empty($data['tb_toko']->logo_toko) && file_exists('./uploads/'.$data['tb_toko']->logo_toko)) {
                        unlink('./uploads/'.$data['tb_toko']->logo_toko);
                    }
                }
            } else {
                // Gunakan file logo lama jika tidak ada upload baru
                $logo_toko = $data['tb_toko']->logo_toko;
            }

            // --- Proses Upload File untuk izin_toko ---
            if (!empty($_FILES['izin_toko']['name'])) {
                // Ambil ekstensi file asli untuk izin
                $ext_izin = pathinfo($_FILES['izin_toko']['name'], PATHINFO_EXTENSION);
                // Buat nama unik untuk izin
                $new_filename_izin = time() . '_izin_' . uniqid() . '.' . $ext_izin;

                // Konfigurasi upload untuk izin (Anda bisa menambahkan tipe file lain seperti PDF jika diperlukan)
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['file_name']     = $new_filename_izin;
                $config['max_size']      = 2048; // Maksimum 2MB

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('izin_toko')) {
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/toko/update', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    $upload_data_izin = $this->upload->data();
                    $izin_toko = $upload_data_izin['file_name'];

                    // Hapus file izin lama jika ada
                    if (!empty($data['tb_toko']->izin_toko) && file_exists('./uploads/'.$data['tb_toko']->izin_toko)) {
                        unlink('./uploads/'.$data['tb_toko']->izin_toko);
                    }
                }
            } else {
                // Gunakan file izin lama jika tidak ada upload baru
                $izin_toko = $data['tb_toko']->izin_toko;
            }

            // Siapkan data update
            $data_update = array(
                'lokasi_toko' => $this->input->post('lokasi_toko'),
                'lokasi_maps' => $this->input->post('lokasi_maps'),
                'nama_toko'   => $this->input->post('nama_toko'),
                'logo_toko'   => $logo_toko,
                'izin_toko'   => $izin_toko
            );

            // Update data toko di database
            $this->toko_model->update($id, $data_update);

            // Pesan sukses
            $this->session->set_flashdata('alert', 'Data berhasil diperbarui.');
            redirect('controller_toko/edit/'.$id);
        }
    }
}
