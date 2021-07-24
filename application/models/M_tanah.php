<?php

class M_tanah extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by('id', 'ASC')->where('status', '0');
        return $this->db->from('tanah')
            ->get()
            ->result();
    }
    function tampil_data($limit, $star)
    {
        $query = $this->db->get('tanah', $limit, $star);
        return $query;
    }
    function input_data($data)
    {
        $this->db->insert('tanah', $data);
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
        $this->db->from('tanah');
        $this->db->like('id', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('ukuran', $keyword);
        $this->db->or_like('biaya', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get()->result();
    }
    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tanah', array('id' => $id))->row();
        return $query;
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tanah');

        return $this->db->get();
    }
}
