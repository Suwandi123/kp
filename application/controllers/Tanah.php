<?php
defined('BASEPATH') or exit('No direct script access allowed');
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Tanah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tanah');
    }
    public function index()
    {
        $config['base_url']     = site_url('Tanah/index');
        $config['total_rows']   = $this->db->count_all('tanah');
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


        $data['tanah'] = $this->M_tanah->tampil_data($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/data_tanah', $data);
        $this->load->view('templet/footer');
    }
    public function tambah_aksi()
    {
        $lokasi             = $this->input->post('lokasi');
        $ukuran            = $this->input->post('ukuran');
        $biaya          = $this->input->post('biaya');



        $data = array(
            'lokasi'          => $lokasi,
            'ukuran'         => $ukuran,
            'biaya' => $biaya,
            'status' => '0'

        );

        $this->M_tanah->input_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan
      </div>');
        redirect('Tanah/index');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['tanah'] = $this->M_tanah->get_keyword($keyword);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/data_tanah', $data);
        $this->load->view('templet/footer');
    }

    public function edit_tanah($id)
    {
        $where = array('id' => $id);
        $data['tanah'] = $this->M_tanah->edit_data($where, 'tanah')->result();

        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('edit/edit_tanah', $data);
        $this->load->view('templet/footer');
    }
    public function update()
    {
        $id                      = $this->input->post('id');
        $lokasi                  = $this->input->post('lokasi');
        $ukuran                  = $this->input->post('ukuran');
        $biaya                   = $this->input->post('biaya');
        $status                  = $this->input->post('status');



        $data = array(
            'lokasi'              => $lokasi,
            'ukuran'              => $ukuran,
            'biaya'               => $biaya,
            'status'               => $status,
        );
        $where = array(
            'id' => $id
        );
        $this->M_tanah->update_data($where, $data, 'tanah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Diedit
      </div>');
        redirect('Tanah/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_tanah->hapus_data($where, 'tanah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus
      </div>');
        redirect('Tanah/index');
    }
    public function excel()
    {
        $semua_pengguna = $this->M_tanah->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'LOKASI')
            ->setCellValue('C1', 'UKURAN')
            ->setCellValue('D1', 'HARGA SEWA')
            ->setCellValue('E1', 'STATUS');

        $kolom = 2;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->lokasi)
                ->setCellValue('C' . $kolom, $pengguna->ukuran)
                ->setCellValue('D' . $kolom, $pengguna->biaya)
                ->setCellValue('E' . $kolom, $pengguna->status);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Tanah Tersedia.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
