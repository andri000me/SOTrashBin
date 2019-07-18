<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function index()
	{
		$data_get = $this->pengguna_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pengguna',
            'title' => 'Pengguna'
        );
		$this->slice->view('pages.pengguna.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Pengguna Baru'
        );
		$this->slice->view('pages.pengguna.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|max_length[50]');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pengguna/create');
		} else {
			$this->pengguna_model->store();
			$this->session->set_flashdata('success', 'Pengguna baru telah ditambahkan');
			redirect('pengguna');
		}
	}
	
	public function edit($id) {
		$data_get = $this->pengguna_model->get_data($id);
		if (empty($data_get)) {
			redirect('pengguna');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Pengguna #'.$id
        );
		$this->slice->view('pages.pengguna.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|max_length[50]');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pengguna/edit/'.$id);
		} else {
			$this->pengguna_model->update($id);
			$this->session->set_flashdata('success', 'Pengguna '.$id.' telah diperbaharui');
			redirect('pengguna');
		}
	}

	public function destroy($id)
	{
		$this->pengguna_model->destroy($id);
		$this->session->set_flashdata('success', 'Pengguna '.$id.' telah terhapus');
		redirect('pengguna');
	}
}
