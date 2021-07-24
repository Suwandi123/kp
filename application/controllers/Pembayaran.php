<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
		$this->load->model('M_tanah');
		$this->load->model('M_penyewa');
	}

	public function ajax($id)
	{
		$data = $this->M_pembayaran->tampil_data3($id);

		echo json_encode($data);
	}

	public function index()
	{
		$config['base_url']     = site_url('Pembayaran/index');
		$config['total_rows']   = $this->db->count_all('pembayaran');
		$config['per_page']     = 10;
		$config['url_segment']  = 3;
		$choice = $config["total_rows"] / $config['per_page'];
		$config["num_links"]    = floor($choice);

		$config['first_link']   = 'First';
		$config['last_link']    = 'Last';
		$config['next_link']    = 'Selanjutnya';
		$config['prev_link']    = 'Sebelumnya';

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';

		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '</span></li>';

		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo</span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';

		$config['first_tag_open']   = '<li class="page-item"><span class="page-link ">';
		$config['first_tagl_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['page']   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['belum'] = $this->M_pembayaran->tampil_data2();
		$data['pembayaran'] = $this->M_pembayaran->tampil_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$data['pembayaran'] = $this->M_pembayaran->tampil_data();
		$data['tanah'] = $this->M_tanah->tampil();

		$data['penduduk'] = $this->M_penyewa->tampil();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/sisa_pembayaran', $data);
		$this->load->view('templet/footer');
	}

	public function hitung($lama, $lokasi)
	{
		$db = $this->db;

		$query = $db->select('biaya')
			->from('tanah')
			->where('id', $lokasi)
			->get();

		if ($query) {
			$result = $query->row_array();
			echo $result['biaya'] * $lama;
		}
	}

	public function tambah_aksi($data)
	{
		$nama               = $this->input->post('nama');
		$lokasi             = $this->input->post('lokasi');
		$pembayaran         = $this->input->post('pembayaran');
		$tgl_awal           = $this->input->post('tgl_awal');
		$uang               = $data;

		$tgl_akhir          = date('y-m-d', strtotime('+' . $this->input->post('lama_sewa') . ' month', strtotime($this->input->post('tgl_awal'))));
		$data = array(
			'id_penduduk'    => $nama,
			'id_tanah'       => $lokasi,
			'pembayaran'     => $uang,
			'tgl_awal'       => $tgl_awal,
			'tgl_akhir'      => $tgl_akhir,
			'sisa'           => $uang - $pembayaran,
		);

		$this->M_pembayaran->input_data($data, 'pembayaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan
      </div>');
		redirect('Pembayaran/index');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['pembayaran'] = $this->M_pembayaran->get_keyword($keyword);
		if ($data['pembayaran'] == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error" role="alert">
        Maaf Data Yang Anda Cari Tidak Ada
      </div>');
			redirect('Pembayaran/index');
		}
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/sisa_pembayaran', $data);
		$this->load->view('templet/footer');
	}

	public function hapus($id)
	{
		$data = $this->db->query('DELETE FROM pembayaran where id_pembayaran=' . $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus
      </div>');
		redirect('Pembayaran/index');
	}

	public function edit_sisa($id)
	{
		$where = array('id_pembayaran' => $id);
		$data['pembayaran'] = $this->M_pembayaran->edit_data($where, 'pembayaran')->result();

		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('edit/edit_sisa', $data);
		$this->load->view('templet/footer');
	}
	public function bayar($id)
	{
		$uang = $this->db->query('select pembayaran.pembayaran , pembayaran.sisa from pembayaran where id_pembayaran=' . $id);
		$uang2 = $uang->result_array();


		if ($uang2[0]['sisa'] < $this->input->post('uang') == true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error" role="alert">
            Pembayaran anda terlalu besar
          </div>');
			redirect('Pembayaran/index');
		}
		$sisa = $uang2[0]['sisa'] - $this->input->post('uang');
		$total = $uang2[0]['pembayaran'] + $this->input->post('uang');
		$update = $this->db->query('UPDATE  Pembayaran SET pembayaran="' . $total . '" , sisa="' . $sisa . '" WHERE id_pembayaran=' . $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Proses Pembayaran Behasil
      </div>');
		redirect('Pembayaran/index');
	}
}
