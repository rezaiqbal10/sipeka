<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login_user extends CI_Model
{
    public function loginuser($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nomor_p', $post['nomor_p']);
        $this->db->where('npp', ($post['npp']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {

        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
