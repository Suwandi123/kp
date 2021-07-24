<?php
defined('BASEPATH') or exit('No direct script access allowed');

class L_penyewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyewa');
    }
    public function index()
    {
        $config['base_url']     = site_url('L_penyewa/index');
        $config['total_rows']   = $this->db->count_all('penduduk');
        $config['per_page']     = 20;
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


        $data['penduduk'] = $this->M_penyewa->tampil_data($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('laporan/data_penyewa', $data);
        $this->load->view('templet/footer');
    }
}
