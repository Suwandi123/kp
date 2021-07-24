<?php

class M_pembayaran extends CI_Model
{
    public function tampil_data()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('pembayaran')
            ->join('penduduk', 'penduduk.id=pembayaran.id_penduduk')
            ->join('tanah', 'tanah.id=pembayaran.id_tanah')
            ->get()
            ->result();
    }
    public function tampil_data2()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('pembayaran')->where_not_in('sisa', array(0))
            ->join('penduduk', 'penduduk.id=pembayaran.id_penduduk')
            ->join('tanah', 'tanah.id=pembayaran.id_tanah')
            ->get()
            ->result();
    }

    function input_data($table, $data)
    {
        $this->db->insert('pembayaran', $table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($data, $table);
    }

    public function get_keyword($keyword = null)
    {
        $this->db->select('id');
        $this->db->from('penduduk');
        $data = $this->db->like('nik', $keyword)->or_like('nama', $keyword)->get()->result();
        if (isset($data[0]->id) == false) {
            return false;
        }
        $this->db->select('*');
        $this->db->from('pembayaran');
        return $this->db->like('id_penduduk', $data[0]->id)->join('penduduk', 'penduduk.id=pembayaran.id_penduduk')
            ->join('tanah', 'tanah.id=pembayaran.id_tanah')->get()->result();
    }
    public function tampil_data3($id)
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('pembayaran')->where('id_pembayaran', $id)
            ->join('penduduk', 'penduduk.id=pembayaran.id_penduduk')
            ->join('tanah', 'tanah.id=pembayaran.id_tanah')
            ->get()
            ->result();
    }
}
