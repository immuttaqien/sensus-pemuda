<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_main extends CI_Model {

	public function jumlah_anggota()
	{
		return $this->db->get('sn_anggota')->num_rows();
	}

	public function jumlah_jamaah()
	{
		return $this->db->get('sn_jamaah')->num_rows();
	}

	public function jumlah_pekerjaan()
	{
		return $this->db->get('sn_pekerjaan')->num_rows();
	}

	public function jumlah_pendidikan()
	{
		return $this->db->get('sn_pendidikan')->num_rows();
	}

	public function jumlah_pendapatan()
	{
		return $this->db->get('sn_pendapatan')->num_rows();
	}

	public function jumlah_tanggungan()
	{
		return $this->db->get('sn_tanggungan')->num_rows();
	}
}