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
		$cek_nomor = $this->db->get_where('sn_anggota', array('nomor_anggota' => $nomor))->num_rows();

		return $cek_nomor;
	}

	public function input_anggota($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function daftar_riwayat($anggota_id){
		return $this->db->select('a.*, b.nama AS tingkat')->from('sn_riwayat a')->join('sn_pendidikan b', 'b.pendidikan_id = a.pendidikan_id')->where('a.anggota_id', $anggota_id)->get();
	}

	public function input_riwayat($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function edit_riwayat($riwayat_id){
		return $this->db->get_where('sn_riwayat', array('riwayat_id' => $riwayat_id));
	}

	public function update_riwayat($table, $data, $riwayat_id)
	{
		$this->db->update($table, $data, array('riwayat_id' => $riwayat_id));
	}

	public function delete_riwayat($table, $riwayat_id){
		$this->db->delete($table, array('riwayat_id' => $riwayat_id));
	}
}