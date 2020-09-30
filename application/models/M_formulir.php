<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_formulir extends CI_Model {

	public function daftar_jamaah()
	{
		return $this->db->get('sn_jamaah');
	}

	public function daftar_pekerjaan()
	{
		return $this->db->get('sn_pekerjaan');
	}

	public function daftar_pendidikan()
	{
		return $this->db->get('sn_pendidikan');
	}

	public function daftar_pendapatan()
	{
		return $this->db->get('sn_pendapatan');
	}

	public function daftar_tanggungan()
	{
		return $this->db->get('sn_tanggungan');
	}

	public function cek_nomor($nomor)
	{
		$cek_nomor = $this->db->get_where('sn_anggota', array('nomor_anggota' => $nomor));

		return $cek_nomor;
	}

	public function input_anggota($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
}