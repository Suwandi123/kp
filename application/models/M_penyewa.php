<?php

class M_penyewa extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->from('penduduk')
            ->get()
            ->result();
    }
    function tampil_data($limit, $star)
    {
        $query = $this->db->get('penduduk', $limit, $star);
        return $query;
    }
    function input_data($data)
    {
        $this->db->insert('penduduk', $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->like('id', $keyword);
        $this->db->or_like('nik', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('ttl', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('kedusunan', $keyword);
        return $this->db->get()->result();
    }
    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('penduduk', array('id' => $id))->row();
        return $query;
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('penduduk');

        return $this->db->get();
    }
}
