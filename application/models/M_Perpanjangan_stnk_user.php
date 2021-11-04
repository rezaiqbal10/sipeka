<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_perpanjangan_stnk_user extends CI_Model
{ 
  
    public function get($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('perpanjangan_stnk');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = perpanjangan_stnk.data_kendaraan_id');
        if ($id != null) {
            $this->db->where('perpanjangan_stnk_id', $id);
        }
        $this->db->order_by('kode_perpanjangan','asc');
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'kode_perpanjangan' => $post['kode_perpanjangan'],
            'tanggal_perpanjangan' => $post['tanggal_perpanjangan'],
            'nomor_polisi' => $post['nomor_polisi'],
            'pemegang_kendaraan' => $post['pemegang_kendaraan'],
            'jenis_perpanjangan' => $post['jenis_perpanjangan'],
            // 'status_perpanjangan' => $post['status_perpanjangan'],
            'foto' => $post['foto'],
            
        ];
        $this->db->insert('perpanjangan_stnk', $params);
    }
    public function edit($post)
    {
        $params = [
            
            'kode_perpanjangan' =>  $post['kode_perpanjangan'],
            'tanggal_perpanjangan' => $post['tanggal_perpanjangan'],
            'nomor_polisi' => $post['nomor_polisi'],
            'pemegang_kendaraan' => $post['pemegang_kendaraan'],
            'jenis_perpanjangan' => $post['jenis_perpanjangan'],
            // 'status_perpanjangan' => $post['status_perpanjangan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['foto'] != null ) {
            $params['foto'] = $post['foto'];
        }
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
 