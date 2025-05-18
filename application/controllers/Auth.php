<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('kurs_model');
		$this->load->model('jumbotron_model');
		$this->load->model('about_model');
		$this->load->model('owner_model');
        $this->load->model('toko_model');
        $this->load->model('wa_model');
        $this->load->model('media_model');

        // Pastikan library, helper, dan model dimuat
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url']);
        $this->load->model('model_auth');
    }
    
    public function login() {
        $data['kurs'] = $this->kurs_model->get_all_kurs();
		$data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
		$data['about'] = $this->about_model->get_about_by_id(1);
		$data['owner'] = $this->owner_model->get_owner_by_id(1);
        $data['toko'] = $this->toko_model->get_toko_by_id(1);
        $data['wa'] = $this->wa_model->get_all_wa();
        $data['media'] = $this->media_model->get_media_by_id(1);
        // Atur aturan validasi untuk username dan password
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib Di Isi!!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib Di Isi!!!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_login',$data);
        } else {
            // Ambil data pengguna dari model berdasarkan username
            $auth = $this->model_auth->cek_login($this->input->post('username'));
            // Periksa apakah pengguna ditemukan dan password cocok
            if ($auth && password_verify($this->input->post('password'), $auth->password)) {
                // Set data session untuk pengguna yang berhasil login
                $this->session->set_userdata('id', $auth->id);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                // setelah set_userdata untuk id, username, role_id
$this->session->set_userdata('session_login', true);

                
                // Redirect berdasarkan role_id
                switch ($auth->role_id) {
                    case 1:
                        redirect('controller_wa');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        redirect('welcome');
                        break;
                }
            } else {
                // Jika login gagal, set flashdata pesan error dan redirect kembali ke login
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Username atau Password Anda Salah!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('auth/login');
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }


    public function change_password()
{
    // Data untuk header (sesuaikan jika diperlukan)
    $data['kurs']      = $this->kurs_model->get_all_kurs();
    $data['jumbotron'] = $this->jumbotron_model->get_jumbotron_by_id(1);
    $data['about']     = $this->about_model->get_about_by_id(1);
    $data['owner']     = $this->owner_model->get_owner_by_id(1);
    $data['toko']      = $this->toko_model->get_toko_by_id(1);
    $data['wa']        = $this->wa_model->get_all_wa();

    $this->load->view('header', $data);
    $this->load->view('change_password'); // View khusus ubah password
    $this->load->view('footer');
}

public function change_action()
{
    // Aturan validasi untuk masing-masing field
    $this->form_validation->set_rules(
        'current_password', 
        'Password Lama', 
        'required',
        ['required' => '* {field} harus diisi']
    );
    $this->form_validation->set_rules(
        'new_password', 
        'Password Baru', 
        'required',
        ['required' => '* {field} harus diisi']
    );
    $this->form_validation->set_rules(
        'confirm_password', 
        'Konfirmasi Password Baru', 
        'required|matches[new_password]',
        [
            'required' => '* {field} harus diisi', 
            'matches'  => '* {field} tidak sama dengan Password Baru'
        ]
    );

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, muat ulang form
        $this->change_password();
    } else {
        // Ambil ID user dari session (pastikan user telah login)
        $id = $this->session->userdata('id');
        if (!$id) {
            redirect('auth/change_password'); // Redirect ke halaman login bila user belum login
        }
        
        // Ambil data user dari database
        $user = $this->model_auth->getUserById($id);
        if (!$user) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">User tidak ditemukan.</div>');
            redirect('auth/change_password');
        }
        
        // Verifikasi password lama
        if (!password_verify($this->input->post('current_password'), $user->password)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password lama tidak sesuai!</div>');
            redirect('auth/change_password');
        }

        // Hash password baru
        $new_password_hashed = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $data = ['password' => $new_password_hashed];

        // Perbarui password di database melalui model
        $update_success = $this->model_auth->updatePassword($id, $data);

        if ($update_success) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Password berhasil diubah!</div>');
            redirect('auth/change_password');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal diperbarui. Silakan coba lagi.</div>');
            redirect('auth/change_password');
        }
    }
}

}
?>
