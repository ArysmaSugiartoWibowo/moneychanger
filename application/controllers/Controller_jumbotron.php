<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_jumbotron extends CI_Controller {

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
        // Aturan validasi untuk field teks (contoh: paragraft_1, lokasi, dsb.)
        $this->form_validation->set_rules('paragraft_1', 'Nama Toko', 'required');
        $this->form_validation->set_rules('judul_1', 'Lokasi Toko', 'required');
        $this->form_validation->set_rules('judul_2', 'Lokasi Maps', 'required');

        // Ambil data toko berdasarkan ID
        $data['tb_jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id($id);
        if(empty($data['tb_jumbotron'])){
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
            $this->load->view('admin/jumbotron/update', $data);
            $this->load->view('footer', $data);
        } else {
            // --- Proses Upload File untuk gambar_1 ---
            if (!empty($_FILES['gambar_1']['name'])) {
                // Ambil ekstensi file asli untuk logo
                $ext_logo = pathinfo($_FILES['gambar_1']['name'], PATHINFO_EXTENSION);
                // Buat nama unik untuk logo
                $new_filename_logo = time() . '_logo_' . uniqid() . '.' . $ext_logo;

                // Konfigurasi upload untuk logo
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = $new_filename_logo;
                $config['max_size']      = 2048; // Maksimum 2MB

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar_1')) {
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/jumbotron/update', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    $upload_data_logo = $this->upload->data();
                    $gambar_1 = $upload_data_logo['file_name'];

                    // Hapus file logo lama jika ada
                    if (!empty($data['tb_jumbotron']->gambar_1) && file_exists('./uploads/'.$data['tb_jumbotron']->gambar_1)) {
                        unlink('./uploads/'.$data['tb_jumbotron']->gambar_1);
                    }
                }
            } else {
                // Gunakan file logo lama jika tidak ada upload baru
                $gambar_1 = $data['tb_jumbotron']->gambar_1;
            }

            // --- Proses Upload File untuk gambar_2 ---
            if (!empty($_FILES['gambar_2']['name'])) {
                // Ambil ekstensi file asli untuk izin
                $ext_izin = pathinfo($_FILES['gambar_2']['name'], PATHINFO_EXTENSION);
                // Buat nama unik untuk izin
                $new_filename_izin = time() . '_izin_' . uniqid() . '.' . $ext_izin;

                // Konfigurasi upload untuk izin (Anda bisa menambahkan tipe file lain seperti PDF jika diperlukan)
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['file_name']     = $new_filename_izin;
                $config['max_size']      = 2048; // Maksimum 2MB

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar_2')) {
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/jumbotron/update', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    $upload_data_izin = $this->upload->data();
                    $gambar_2 = $upload_data_izin['file_name'];

                    // Hapus file izin lama jika ada
                    if (!empty($data['tb_jumbotron']->gambar_2) && file_exists('./uploads/'.$data['tb_jumbotron']->gambar_2)) {
                        unlink('./uploads/'.$data['tb_jumbotron']->gambar_2);
                    }
                }
            } else {
                // Gunakan file izin lama jika tidak ada upload baru
                $gambar_2 = $data['tb_jumbotron']->gambar_2;
            }

            // Siapkan data update
            $data_update = array(
                'judul_1' => $this->input->post('judul_1'),
                'judul_2' => $this->input->post('judul_2'),
                'paragraft_1'   => $this->input->post('paragraft_1'),
                'paragraft_2'   => $this->input->post('paragraft_2'),
                'gambar_1'   => $gambar_1,
                'gambar_2'   => $gambar_2
            );

            // Update data toko di database
            $this->jumbotron_model->update($id, $data_update);

            // Pesan sukses
            $this->session->set_flashdata('alert', 'Data berhasil diperbarui.');
            redirect('controller_jumbotron/edit/'.$id);
        }
    }
}
