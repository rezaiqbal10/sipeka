<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_usulan_perbaikan_user extends CI_Model
{ 
 
    public function get($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('usulan_perbaikan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = usulan_perbaikan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('usulan_perbaikan_id', $id);
        }
        $this->db->order_by('kode_usulan','asc');
        $query = $this->db->get();
        return $query;
    } 
    public function gethistory($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('usulan_perbaikan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = usulan_perbaikan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('data_kendaraan_id', $id);
        }
        $this->db->order_by('kode_usulan','asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'data_kendaraan_id' => $post['nomor_stnk'],
            'kode_usulan' => $post['kode_usulan'],
            'tanggal_usulan' => $post['tanggal_usulan'],
            'nomor_polisi' => $post['nomor_polisi'],
            'pemegang_kendaraan' => $post['pemegang_kendaraan'],
            'jenis_perbaikan' => $post['jenis_perbaikan'],
            'status_perbaikan' => 0,
            'service_rutin' => $post['service_rutin'],
            'catatan_perbaikan' => $post['catatan_perbaikan'],
            'nama_atasan' => $post['nama_atasan'],
            'foto' => $post['foto'],
            
        ];
        $this->db->insert('usulan_perbaikan', $params);
    }
    public function edit($post)
    {
        $params = [
            'data_kendaraan_id' => $post['nomor_stnk'], 
            'kode_usulan' =>  $post['kode_usulan'],
            'tanggal_usulan' => $post['tanggal_usulan'],
            'nomor_polisi' => $post['nomor_polisi'],
            'pemegang_kendaraan' => $post['pemegang_kendaraan'],
            'jenis_perbaikan' => $post['jenis_perbaikan'],
            'status_perbaikan' => $post['status_perbaikan'],
            'service_rutin' => $post['service_rutin'],
            'catatan_perbaikan' => $post['catatan_perbaikan'],
            'nama_atasan' => $post['nama_atasan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['foto'] != null ) {
            $params['foto'] = $post['foto'];
        }
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
    // public function history($id = null)
    // {
    //     $this->db->from('usulan_perbaikan');
        
    //     if($id != null) {
    //         $this->db->where('usulan_perbaikan_id !=', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
        
    // }

}
 