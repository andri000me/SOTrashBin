<?php

class Aktifitas_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	// -------
	// Beranda
	// -------

	public function count_wadah()
	{
		$query = $this->db->count_all_results('wadah');
		return $query;
	}

	public function count_wadah_info()
	{
		$this->db->distinct();
		$this->db->select('wadah.kode_seri AS kode_seri, ukuran, kapasitas, lokasi, status, info_tambahan');
		$this->db->from('aktifitas');
		$this->db->join('wadah', 'wadah.kode_seri = aktifitas.kode_seri');
		$this->db->where('aktifitas.suhu >', '50');
		$this->db->order_by('wadah.kode_seri', 'desc');
		$query = $this->db->count_all_results();
		return $query;
	}

	public function count_wadah_aktif()
	{
		$where = $this->db->where('status', 'Siap');
		$query = $where->count_all_results('wadah');
		return $query;
	}

	public function count_aktifitas()
	{
		$query = $this->db->count_all_results('aktifitas');
		return $query;
	}

	// -------

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('aktifitas');
			return $query->result();
		}
	}

	public function get_list_info_wadah($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->distinct();
			$this->db->select('wadah.kode_seri AS kode_seri, ukuran, kapasitas, lokasi, status, info_tambahan');
			$this->db->from('aktifitas');
			$this->db->join('wadah', 'wadah.kode_seri = aktifitas.kode_seri');
			$this->db->where('aktifitas.suhu >', '50');
			$this->db->order_by('wadah.kode_seri', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function get_data_info_wadah($info)
	{
		$this->db->select('wadah.kode_seri AS kode_seri, ukuran, kapasitas, lokasi, status, info_tambahan');
		$this->db->from('aktifitas');
		$this->db->join('wadah', 'wadah.kode_seri = aktifitas.kode_seri');
		$this->db->where('aktifitas.suhu >', '50');
		$this->db->order_by('wadah.kode_seri', 'desc');
		$this->db->where('wadah.kode_seri =', $info);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_list_data_info_wadah($info, $search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select('aktifitas.kode_seri AS kode_seri, jarak, level, kelembapan, suhu, berat, waktu_daftar');
			$this->db->from('aktifitas');
			$this->db->join('wadah', 'wadah.kode_seri = aktifitas.kode_seri');
			$this->db->where('aktifitas.suhu >', '50');
			$this->db->where('aktifitas.kode_seri =', $info);
			$this->db->order_by('aktifitas.waktu_daftar', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
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
