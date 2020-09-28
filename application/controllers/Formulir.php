<?php
defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Formulir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_formulir');
	}

	public function index()
	{
		$this->load->view('template/v_meta');
		
		$data = array(
			'jamaah' => $this->m_formulir->daftar_jamaah()->result(),
			'pekerjaan' => $this->m_formulir->daftar_pekerjaan()->result(),
			'pendidikan' => $this->m_formulir->daftar_pendidikan()->result(),
			'pendapatan' => $this->m_formulir->daftar_pendapatan()->result(),
			'tanggungan' => $this->m_formulir->daftar_tanggungan()->result()
		);

		$this->load->view('content/v_formulir', $data);
		$this->load->view('template/v_footer');
	}

	public function tambah_anggota()
	{
		$nomor_anggota = $this->input->post('nomor_anggota');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$status_nikah = $this->input->post('status_nikah');
		$golongan_darah = $this->input->post('golongan_darah');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$whatsapp = $this->input->post('whatsapp');
		$alamat = $this->input->post('alamat');
		$nomor_ktp = $this->input->post('nomor_ktp');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$jamaah = $this->input->post('jamaah');
		$hobi = $this->input->post('hobi');
		$keahlian = $this->input->post('keahlian');
		$pekerjaan = $this->input->post('pekerjaan');
		$pekerjaan_lain = $this->input->post('pekerjaan_lain');
		$nama_instansi = $this->input->post('nama_instansi');
		$sampingan = $this->input->post('sampingan');
		$pekerjaan_sampingan = $this->input->post('pekerjaan_sampingan');
		$pendidikan = $this->input->post('pendidikan');
		$pendapatan = $this->input->post('pendapatan');
		$tanggungan = $this->input->post('tanggungan');
		$organisasi_lain = $this->input->post('organisasi_lain');
		$nama_organisasi = $this->input->post('nama_organisasi');
		$nama_istri = $this->input->post('nama_istri');
		$anggota_otonom = $this->input->post('anggota_otonom');
		$jumlah_anak = $this->input->post('jumlah_anak');

		$cek_nomor = $this->m_formulir->cek_nomor($nomor_anggota);
		if($cek_nomor > 0){
			$_SESSION['notify']['type'] = 'danger';
			$_SESSION['notify']['message'] = 'Nomor anggota sudah dipakai, silakan cek kembali.';

			header('location:'.$_SERVER['HTTP_REFERER']); die();
		}

		$config['upload_path'] = './media/foto/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = true;
		 
		$this->load->library('upload', $config);
		 
		if ( ! $this->upload->do_upload('foto')){
			$_SESSION['notify']['type'] = 'danger';
			$_SESSION['notify']['message'] = 'Terjadi kesalahan saat upload foto, silakan ulangi lagi.';

			header('location:'.$_SERVER['HTTP_REFERER']);
		}else{
			$foto = $this->upload->data('file_name');

			$data = array(
				'nomor_anggota' => $nomor_anggota,
				'nama_lengkap' => $nama_lengkap,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'status_nikah' => $status_nikah,
				'golongan_darah' => $golongan_darah,
				'email' => $email,
				'telepon' => $telepon,
				'whatsapp' => $whatsapp,
				'alamat' => $alamat,
				'nomor_ktp' => $nomor_ktp,
				'tahun_masuk' => $tahun_masuk,
				'jamaah_id' => $jamaah,
				'hobi' => $hobi,
				'keahlian' => $keahlian,
				'pekerjaan_id' => $pekerjaan,
				'pekerjaan_lain' => $pekerjaan_lain,
				'nama_instansi' => $nama_instansi,
				'sampingan' => $sampingan,
				'pekerjaan_sampingan' => $pekerjaan_sampingan,
				'pendidikan_id' => $pendidikan,
				'pendapatan_id' => $pendapatan,
				'tanggungan_id' => $tanggungan,
				'organisasi_lain' => $organisasi_lain,
				'nama_organisasi' => $nama_organisasi,
				'nama_istri' => $nama_istri,
				'anggota_otonom' => $anggota_otonom,
				'jumlah_anak' => $jumlah_anak,
				'foto' => $foto
			);

			$anggota_id = $this->m_formulir->input_anggota('sn_anggota', $data);

			redirect('formulir/riwayat/index/'.$anggota_id);
		}
	}

	public function riwayat()
	{
		$this->load->view('template/v_meta');

		$anggota_id = $this->uri->segment('4');
		$riwayat_id = $this->uri->segment('5');

		$data = array(
			'riwayat' => $this->m_formulir->daftar_riwayat($anggota_id)->result(),
			'pendidikan' => $this->m_formulir->daftar_pendidikan()->result(),
			'edit' => $this->m_formulir->edit_riwayat($riwayat_id)->result()
		);

		$this->load->view('content/v_riwayat', $data);
		$this->load->view('template/v_footer');
	}

	public function tambah_riwayat($anggota_id=0)
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

		$this->m_formulir->input_riwayat('sn_riwayat', $data);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Riwayat pendidikan berhasil ditambahkan.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	public function edit_riwayat($riwayat_id=0)
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

		$this->m_formulir->update_riwayat('sn_riwayat', $data, $riwayat_id);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Riwayat pendidikan berhasil diedit.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	public function hapus_riwayat($riwayat_id=0){
		$this->m_formulir->delete_riwayat('sn_riwayat', $riwayat_id);

		$_SESSION['notify']['type'] = 'success';
		$_SESSION['notify']['message'] = 'Riwayat pendidikan berhasil dihapus.';

		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}
