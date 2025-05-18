<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_produk extends CI_Controller {

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
        $this->load->library(array('session', 'upload'));
        
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
        $this->load->view('main', $data);
    }
}
