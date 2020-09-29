<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_formulir');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	// public function index()
	// {
	// 	$this->load->view('template/v_meta');
	// 	$this->load->view('template/v_header');
	// 	$this->load->view('template/v_menu');
	// 	$this->load->view('content/v_main');
	// 	$this->load->view('template/v_footer');
	// }

	// public function edit()
	// {
	// 	$this->load->view('template/v_meta');
	// 	$this->load->view('template/v_header');
	// 	$this->load->view('template/v_menu');
		
	// 	$data = array(
	// 		'admin' => $this->m_formulir->data_admin($this->session->userdata('admin_id'))->result()
	// 	);

	// 	$this->load->view('content/v_admin', $data);
	// 	$this->load->view('template/v_footer');
	// }
}