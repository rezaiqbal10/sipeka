<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_perpanjangan_stnk_admin extends CI_Model
{ 
 
    public function get($id = null)
    {
       
        $this->db->from('perpanjangan_stnk');
        if ($id != null) {
            $this->db->where('perpanjangan_stnk_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    { 
        $params = [
            'status_perpanjangan' => 0,
            
            
        ];
        $this->db->insert('perpanjangan_stnk', $params);
    }
    public function edit($post)
    {
        $params = [
            
            
            'status_perpanjangan' => $post['status_perpanjangan'],
      
        ];
        $this->db->where('perpanjangan_stnk_id', $post['id']);
        $this->db->update('perpanjangan_stnk', $params);
    }
    function check_kode($kode, $id = null)
    {
        $this->db->from('perpanjangan_stnk');
        $this->db->where('kode_perpanjangan', $kode);
        if($id != null) {
            $this->db->where('perpanjangan_stnk_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('perpanjangan_stnk_id', $id);
        $this->db->delete('perpanjangan_stnk');
    }
}
 