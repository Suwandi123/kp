<?php

class M_login extends CI_Model
{
    function cek_login($post)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('username', $post['username']);
        $this->db->where('password', MD5($post['password']));
        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {
        $this->db->from('login');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
