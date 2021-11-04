<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_usulan_perbaikan_admin extends CI_Model
{ 
 
    public function get($id = null)
    {
       
        $this->db->from('usulan_perbaikan');
        if ($id != null) {
            $this->db->where('usulan_perbaikan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'status_perbaikan' => 0,
            
            
        ];
        $this->db->insert('usulan_perbaikan', $params);
    }
    public function edit($post)
    {
        $params = [
            
            
            'status_perbaikan' => $post['status_perbaikan'],
      
        ];
        $this->db->where('usulan_perbaikan_id', $post['id']);
        $this->db->update('usulan_perbaikan', $params);
    }
    function check_kode($kode, $id = null)
    {
        $this->db->from('usulan_perbaikan');
        $this->db->where('kode_usulan', $kode);
        if($id != null) {
            $this->db->where('usulan_perbaikan_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('usulan_perbaikan_id', $id);
        $this->db->delete('usulan_perbaikan');
    }
    
}
 