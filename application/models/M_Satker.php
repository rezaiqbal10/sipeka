<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_satker extends CI_Model
{
  
    public function get($id = null)
    {
        $this->db->from('satker');
        if ($id != null) {
            $this->db->where('satker_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->insert('satker', $params);
    }
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],

            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('satker_id', $post['id']);
        $this->db->update('satker', $params);
    }
    public function delete($id)
    {
        $this->db->where('satker_id', $id);
        $this->db->delete('satker');
    }
}
