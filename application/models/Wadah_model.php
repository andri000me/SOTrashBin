<?php

class Wadah_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('wadah');
			return $query->result();
		}
		$this->db->like('kode_seri', $search);
		$query = $this->db->get('wadah');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('wadah', array('kode_seri' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'kode_seri' => $this->input->post('kode_seri'),
			'ukuran' => $this->input->post('ukuran'),
			'kapasitas' => $this->input->post('kapasitas'),
			'lokasi' => $this->input->post('lokasi'),
			'status' => $this->input->post('status'),
			'info_tambahan' => $this->input->post('info_tambahan')
		);
		return $this->db->insert('wadah', $data);
	}

	public function update($id)
	{
		$data = array(
			'kode_seri' => $this->input->post('kode_seri'),
			'ukuran' => $this->input->post('ukuran'),
			'kapasitas' => $this->input->post('kapasitas'),
			'lokasi' => $this->input->post('lokasi'),
			'status' => $this->input->post('status'),
			'info_tambahan' => $this->input->post('info_tambahan')
		);
		$this->db->where('kode_seri', $id);
		return $this->db->update('wadah', $data);
	}

	public function destroy($id)
	{
		$this->db->where('kode_seri', $id);
		$this->db->delete('wadah');
		return true;
	}
}
