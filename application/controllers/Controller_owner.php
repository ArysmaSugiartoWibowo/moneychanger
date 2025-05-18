<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_owner extends CI_Controller {

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
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama Owner', 'required');

        // Ambil data owner berdasarkan ID
        $data['tb_owner'] = $this->owner_model->get_owner_by_id($id);
        if(empty($data['tb_owner'])){
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
            $this->load->view('admin/owner/update', $data);
            $this->load->view('footer', $data);
        } else {
            // Periksa apakah ada file yang diupload
            if (!empty($_FILES['foto']['name'])) {
                // Ambil ekstensi file asli
                $file_ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                // Buat nama unik dengan timestamp + uniqid()
                $new_filename = time() . '_' . uniqid() . '.' . $file_ext;

                // Konfigurasi upload
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = $new_filename;
                $config['max_size']      = 2048; // Maksimum 2MB

                // Inisialisasi ulang upload
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    // Jika upload gagal, tampilkan error
                    $data['alert'] = $this->upload->display_errors();
                    $this->load->view('header', $data);
                    $this->load->view('admin/owner/update', $data);
                    $this->load->view('footer', $data);
                    return;
                } else {
                    // Ambil data file yang diupload
                    $upload_data = $this->upload->data();
                    $foto = $upload_data['file_name'];

                    // Hapus foto lama jika ada
                    if (!empty($data['tb_owner']->foto) && file_exists('./uploads/'.$data['tb_owner']->foto)) {
                        unlink('./uploads/'.$data['tb_owner']->foto);
                    }
                }
            } else {
                // Jika tidak ada file yang diupload, gunakan foto lama
                $foto = $data['tb_owner']->foto;
            }

            // Siapkan data update
            $data_update = array(
                'nama' => $this->input->post('nama'),
                'foto' => $foto
            );

            // Update data owner di database
            $this->owner_model->update($id, $data_update);

            // Pesan sukses
            $this->session->set_flashdata('alert', 'Data berhasil diperbarui.');
            redirect('controller_owner/edit/'.$id);
        }
    }
}
