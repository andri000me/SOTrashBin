<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->username)) {
			redirect('auth/login');
		}
	}
	
	public function index()
	{
		$wadah = $this->aktifitas_model->count_wadah();
		$wadah_info = $this->aktifitas_model->count_wadah_info();
		$wadah_aktif = $this->aktifitas_model->count_wadah_aktif();
		$aktifitas_log = $this->aktifitas_model->count_aktifitas();
		$data_get = $this->aktifitas_model->get_list();
		$data = array(
			'wadah' => $wadah,
			'wadah_aktif' => $wadah_aktif,
			'wadah_info' => $wadah_info,
			'aktifitas_log' => $aktifitas_log,
			'info' => $data_get,
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('pages.beranda', $data);
	}
	
	public function info_wadah()
	{
		$data_get = $this->aktifitas_model->get_list_info_wadah();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'beranda',
            'title' => 'Info Wadah Aktif'
        );
		$this->slice->view('pages.aktifitas.info', $data);
	}

	public function info_show_wadah($info)
	{
		$data_get = $this->aktifitas_model->get_data_info_wadah($info);
		$data_get2 = $this->aktifitas_model->get_list_data_info_wadah($info);
		$data = array(
			'info' => $data_get,
			'info2' => $data_get2,
			'activeMenu' => 'beranda',
            'title' => 'Tampil Info Wadah Aktif #'.$info
        );
		$this->slice->view('pages.aktifitas.show', $data);
	}
}
