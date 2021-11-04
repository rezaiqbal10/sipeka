<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_data_kendaraan_admin extends CI_Model
{ 
 
    public function get($id = null)
    {
        // $this->db->select('*');   
        $this->db->from('data_kendaraan');
        $this->db->join('user', 'user.user_id = data_kendaraan.user_id','left');
        // $this->db->join('usulan_perbaikan', 'usulan_perbaikan.usulan_perbaikan_id = data_kendaraan.data_kendaraan_id');
        
        if ($id != null) {
        $this->db->where('data_kendaraan_id',$id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'user_id' => $post['nomor_p'],
            // 'name' => $post['name'],
            'merk_kendaraan' => $post['merk_kendaraan'],
            'warna_kendaraan' => $post['warna_kendaraan'],
            'nomor_bmn' => $post['nomor_bmn'],
            'nomor_stnk' => $post['nomor_stnk'],
            'nomor_rangka' => $post['nomor_rangka'],
            'tahun_pembuatan' => $post['tahun_pembuatan'],
            'kondisi_kendaraan' => $post['kondisi_kendaraan'],
            'jenis_kendaraan' => $post['jenis_kendaraan'],
            'seri_kendaraan' => $post['seri_kendaraan'],
            'jenis_bbm' => $post['jenis_bbm'],
            'nup' => $post['nup'],
            'nomor_bpkb' => $post['nomor_bpkb'],
            'nomor_mesin' => $post['nomor_mesin'],
            
        ];
        $this->db->insert('data_kendaraan', $params);
    }
    public function edit($post)
    {
        $params = [
             
            'merk_kendaraan' => $post['merk_kendaraan'],
            'warna_kendaraan' => $post['warna_kendaraan'],
            'nomor_bmn' => $post['nomor_bmn'],
            'nomor_stnk' => $post['nomor_stnk'],
            'nomor_rangka' => $post['nomor_rangka'],
            'tahun_pembuatan' => $post['tahun_pembuatan'],
            'kondisi_kendaraan' => $post['kondisi_kendaraan'],
            'jenis_kendaraan' => $post['jenis_kendaraan'],
            'seri_kendaraan' => $post['seri_kendaraan'],
            'jenis_bbm' => $post['jenis_bbm'],
            'nup' => $post['nup'],
            'nomor_bpkb' => $post['nomor_bpkb'],
            'nomor_mesin' => $post['nomor_mesin'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('data_kendaraan_id', $post['id']);
        $this->db->update('data_kendaraan', $params);
    }
    public function delete($id)
    {
        $this->db->where('data_kendaraan_id', $id);
        $this->db->delete('data_kendaraan');
    }

}
