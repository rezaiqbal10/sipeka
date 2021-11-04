<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyedia_jasa extends CI_Model
{

    public function get($id = null)
    { 
        $this->db->from('penyedia_jasa');
        if ($id != null) {
            $this->db->where('penyedia_jasa_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
            'phone' => $post['phone'],
            'alamat' => $post['alamat'],
        ];
        $this->db->insert('penyedia_jasa', $params);
    }
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'phone' => $post['phone'],
            'alamat' => $post['alamat'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('penyedia_jasa_id', $post['id']);
        $this->db->update('penyedia_jasa', $params);
    }
    public function delete($id)
    {
        $this->db->where('penyedia_jasa_id', $id);
        $this->db->delete('penyedia_jasa');
    }
}
