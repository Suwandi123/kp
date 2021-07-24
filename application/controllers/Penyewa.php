<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penyewa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penyewa');
    }
    public function index()
    {
        $config['base_url']     = site_url('Penyewa/index');
        $config['total_rows']   = $this->db->count_all('penduduk');
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


        $data['penduduk'] = $this->M_penyewa->tampil_data($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/data_penyewa', $data);
        $this->load->view('templet/footer');
    }
    public function tambah_aksi()
    {
        $nik             = $this->input->post('nik');
        $nama            = $this->input->post('nama');
        $alamat          = $this->input->post('alamat');
        $ttl             = $this->input->post('ttl');
        $kedusunan       = $this->input->post('kedusunan');

        $data = array(
            'nik'          => $nik,
            'nama'         => $nama,
            'alamat'       => $alamat,
            'ttl'          => $ttl,
            'kedusunan'    => $kedusunan,
        );

        $insert = $this->M_penyewa->input_data($data);

        if ($insert) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan
      </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan
          </div>');
        }

        redirect('Penyewa/index');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['penduduk'] = $this->M_penyewa->get_keyword($keyword);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/data_penyewa', $data);
        $this->load->view('templet/footer');
    }
    public function detail_penyewa($id)
    {
        $this->load->model('M_penyewa');
        $detail = $this->M_penyewa->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('detail/detail_penyewa', $data);
        $this->load->view('templet/footer');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_penyewa->hapus_data($where, 'penduduk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus
      </div>');
        redirect('Penyewa/index');
    }

    public function edit_penyewa($id)
    {
        $where = array('id' => $id);
        $data['penduduk'] = $this->M_penyewa->edit_data($where, 'penduduk')->result();

        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('edit/edit_penyewa', $data);
        $this->load->view('templet/footer');
    }
    public function update()
    {
        $id                      = $this->input->post('id');
        $nik                     = $this->input->post('nik');
        $nama                    = $this->input->post('nama');
        $ttl                     = $this->input->post('ttl');
        $alamat                  = $this->input->post('alamat');
        $kedusunan               = $this->input->post('kedusunan');



        $data = array(
            'nik'                => $nik,
            'nama'               => $nama,
            'alamat'             => $alamat,
            'ttl'                => $ttl,
            'kedusunan'          => $kedusunan,

        );
        $where = array(
            'id' => $id
        );

        $this->M_penyewa->update_data($where, $data, 'penduduk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Diedit
      </div>');
        redirect('Penyewa/index');
    }

    public function excel()
    {
        $semua_pengguna = $this->M_penyewa->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'NAMA')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'ALAMAT')
            ->setCellValue('F1', 'KEDUSUNAN');

        $kolom = 2;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->nik)
                ->setCellValue('C' . $kolom, $pengguna->nama)
                ->setCellValue('D' . $kolom, $pengguna->ttl)
                ->setCellValue('E' . $kolom, $pengguna->alamat)
                ->setCellValue('F' . $kolom, $pengguna->kedusunan);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Data Penyewa.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
