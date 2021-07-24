<?php
class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }
    function user_login()
    {
        $this->ci->load->model('M_login');
        $id = $this->ci->session->userdata('id');
        $userdata = $this->ci->M_login->get($id)->row();
        return $userdata;
    }
    public function count_penduduk()
    {
        $this->ci->load->model('M_penyewa');
        return $this->ci->M_penyewa->db->get('penduduk')->num_rows();
    }

    public function count_tanah()
    {
        $this->ci->load->model('M_tanah');
        return $this->ci->M_tanah->db->get('tanah')->num_rows();
    }
}
