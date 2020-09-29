<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_anggota');
		$this->load->model('m_formulir');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->load->view('template/v_meta');
		$this->load->view('template/v_header');
		$this->load->view('template/v_menu');

		$data = array(
			'page' => 'index',
			'anggota' => $this->m_anggota->daftar_anggota()->result()
		);

		$this->load->view('content/v_anggota', $data);
		$this->load->view('template/v_footer');
	}

	public function detail($anggota_id=0)
	{
		$this->load->view('template/v_meta');
		$this->load->view('template/v_header');
		$this->load->view('template/v_menu');

		$data = array(
			'page' => 'detail',
			'jamaah' => $this->m_formulir->daftar_jamaah()->result(),
			'pekerjaan' => $this->m_formulir->daftar_pekerjaan()->result(),
			'pendidikan' => $this->m_formulir->daftar_pendidikan()->result(),
			'pendapatan' => $this->m_formulir->daftar_pendapatan()->result(),
			'tanggungan' => $this->m_formulir->daftar_tanggungan()->result(),
			'riwayat' => $this->m_formulir->daftar_riwayat($anggota_id)->result(),
			'detail' => $this->m_anggota->detail_anggota($anggota_id)->result()
		);

		$this->load->view('content/v_anggota', $data);
		$this->load->view('template/v_footer');
	}

	public function tambah_anggota($anggota_id=0)
	{
		$tingkat = $this->input->post('tingkat');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$jurusan = $this->input->post('jurusan');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$tahun_lulus = $this->input->post('tahun_lulus');

		$data = array(
			'anggota_id' => $anggota_id,
			'pendidikan_id' => $tingkat,
			'nama_sekolah' => $nama_sekolah,
			'jurusan' => $jurusan,
			'tahun_masuk' => $tahun_masuk,
			'tahun_lulus' => $tahun_lulus
		);

		$this->m_anggota->input_anggota('sn_anggota', $data);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Data riwayat pendidikan berhasil ditambahkan.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	public function edit_anggota($riwayat_id=0)
	{
		$tingkat = $this->input->post('tingkat');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$jurusan = $this->input->post('jurusan');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$tahun_lulus = $this->input->post('tahun_lulus');

		$data = array(
			'pendidikan_id' => $tingkat,
			'nama_sekolah' => $nama_sekolah,
			'jurusan' => $jurusan,
			'tahun_masuk' => $tahun_masuk,
			'tahun_lulus' => $tahun_lulus
		);

		$this->m_anggota->update_anggota('sn_anggota', $data, $riwayat_id);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Data riwayat pendidikan berhasil diedit.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	public function hapus_anggota($riwayat_id=0){
		$this->m_anggota->delete_anggota('sn_anggota', $riwayat_id);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Data riwayat pendidikan berhasil dihapus.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}