<?php

class Aktifitas_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('aktifitas');
			return $query->result();
		}
		// BELUM JADI
		$this->db->like('kode_seri', $search);
		$query = $this->db->get('aktifitas');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('aktifitas', array('id' => $info));
		return $query->row();
	}

	public function update($id)
	{
		$data = array(
			'jarak' => $this->input->post('jarak'),
			'level' => $this->input->post('level'),
			'kelembapan' => $this->input->post('kelembapan'),
			'suhu' => $this->input->post('suhu'),
			'berat' => $this->input->post('berat')
		);
		$this->db->where('id', $id);
		return $this->db->update('aktifitas', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('aktifitas');
		return true;
	}
	
}
