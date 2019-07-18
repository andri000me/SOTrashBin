<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		$data = array(
            'title' => 'Login'
        );
		$this->slice->view('pages.auth.login', $data);
	}

	public function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$login = $this->pengguna_model->do_login();
		if ($login > 0) {
			$data_session = array(
				'username' => $login->username
			);
			$this->session->set_userdata($data_session);
			redirect('beranda');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
