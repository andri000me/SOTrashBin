<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wadah extends CI_Controller {
	
	public function index()
	{
		$data_get = $this->wadah_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'wadah',
            'title' => 'Wadah'
        );
		$this->slice->view('pages.wadah.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Tambah Wadah'
        );
		$this->slice->view('pages.wadah.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('kode_seri', 'Kode Seri', 'required');
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('info_tambahan', 'Informasi Tambahan', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('wadah/create');
		} else {
			$this->wadah_model->store();
			$this->session->set_flashdata('success', 'Wadah Sampah baru telah ditambahkan');
			redirect('wadah');
		}
	}

	public function show($id) {
		$data_get = $this->wadah_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Tampil Wadah #'.$id
        );
		$this->slice->view('entities.manager.pages.menu.show', $data);
	}

	public function edit($id) {
		$data_get = $this->wadah_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Wadah #'.$id
        );
		$this->slice->view('pages.wadah.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('info_tambahan', 'Informasi Tambahan', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('wadah/edit/'.$id);
		} else {
			$this->wadah_model->update($id);
			$this->session->set_flashdata('success', 'Wadah Sampah '.$id.' telah diperbaharui');
			redirect('wadah');
		}
	}

	public function destroy($id)
	{
		$this->wadah_model->destroy($id);
		$this->session->set_flashdata('success', 'Wadah Sampah '.$id.' telah dihapus');
		redirect('wadah');
	}
}
