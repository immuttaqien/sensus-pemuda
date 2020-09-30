<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public function daftar_anggota()
	{
		return $this->db->select('a.*, b.nama AS jamaah')->from('sn_anggota a')->join('sn_jamaah b', 'b.jamaah_id = a.jamaah_id')->get();
	}

	public function detail_anggota($anggota_id)
	{
		return $this->db->select('a.*, b.nama AS jamaah')->from('sn_anggota a')->join('sn_jamaah b', 'b.jamaah_id = a.jamaah_id')->where('a.anggota_id', $anggota_id)->get();
	}

	public function cek_nomor($nomor, $anggota_id)
	{
		$cek_nomor = $this->db->get_where('sn_anggota', array('nomor_anggota' => $nomor, 'anggota_id !=' => $anggota_id))->num_rows();

		return $cek_nomor;
	}

	public function update_anggota($table, $data, $anggota_id)
	{
		$this->db->update($table, $data, array('anggota_id' => $anggota_id));
	}

	public function get_foto($anggota_id)
	{
		return $this->db->select('foto')->from('sn_anggota')->where('anggota_id', $anggota_id)->get()->row();
	}

	public function delete_anggota($table, $anggota_id){
		$this->db->delete($table, array('anggota_id' => $anggota_id));
	}

	public function delete_riwayat($table, $anggota_id){
		$this->db->delete($table, array('anggota_id' => $anggota_id));
	}
}