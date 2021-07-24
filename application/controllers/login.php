<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('M_login');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('login/v_login');
	}

	public function login_aksi()
	{

		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->M_login->cek_login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id' => $row->id,
					'username' => $row->username,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
                alert('Selamat, Login berhasil');
                window.location='" . site_url('Welcome') . "';
                </script>";
			} else {
				echo "<script>
                alert('Maaf, Login gagal');
                window.location='" . site_url('login/index') . "';
                </script>";
			}
		}
	}
	public function logout()
	{
		$params = array('id', 'level');
		$this->session->unset_userdata($params);
		redirect('login/index');
	}
}
