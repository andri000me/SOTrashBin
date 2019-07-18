<?php

class Pengguna_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('pengguna');
			return $query->result();
		}
		// BELUM JADI
		$this->db->like('username', $search);
		$query = $this->db->get('pengguna');
		return $query->result();
	}

	function do_login()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('pengguna');
		return $query->row();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pengguna', array('username' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama_lengkap' => $this->input->post('nama_lengkap')
		);
		return $this->db->insert('pengguna', $data);
	}

	public function update($id)
	{
		if (empty($this->input->post('password'))) {
			$data = array(
				'nama_lengkap' => $this->input->post('nama')
			);
		} else {
			$data = array(
				'password' => md5($this->input->post('password')),
				'nama_lengkap' => $this->input->post('nama')
			);
		}
		$this->db->where('username', $id);
		return $this->db->update('pengguna', $data);
	}

	public function destroy($id)
	{
		$this->db->where('username', $id);
		$this->db->delete('pengguna');
		return true;
	}
	
}
