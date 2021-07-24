<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		check_not_login();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templet/footer');
	}
}
