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
}