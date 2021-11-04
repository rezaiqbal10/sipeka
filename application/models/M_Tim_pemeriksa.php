<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tim_pemeriksa extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tim_pemeriksa');
        if ($id != null) {
            $this->db->where('tim_pemeriksa_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
            'npp' => $post['npp'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
        ];
        $this->db->insert('tim_pemeriksa', $params);
    }
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'npp' => $post['npp'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
        ];
        $this->db->where('tim_pemeriksa_id', $post['id']);
        $this->db->update('tim_pemeriksa', $params);
    }
    public function delete($id)
    {
        $this->db->where('tim_pemeriksa_id', $id);
        $this->db->delete('tim_pemeriksa');
    }
}
