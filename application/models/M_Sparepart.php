<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sparepart extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('sparepart');
        if ($id != null) {
            $this->db->where('sparepart_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->insert('sparepart', $params);
    }
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],

            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('sparepart_id', $post['id']);
        $this->db->update('sparepart', $params);
    }
    public function delete($id)
    {
        $this->db->where('sparepart_id', $id);
        $this->db->delete('sparepart');
    }
}
