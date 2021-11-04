<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kwitansi_perpanjangan extends CI_Model
{ 
 
    public function get($id = null)
    {
       
        $this->db->from('kwitansi_perpanjangan');
        if ($id != null) {
            $this->db->where('kwitansi_perpanjangan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
            $params = [
                'kode_kwitansi_perpanjangan' => $post['kode_kwitansi_perpanjangan'],
                'tanggal_kwitansi' => $post['tanggal_kwitansi'],
                'penyedia_jasa_id' => $post['nama'],
            
        ];
        $this->db->insert('kwitansi_perpanjangan', $params);
    }
    public function edit($post)
    { 
        $params = [
            
                'kode_kwitansi_perpanjangan' => $post['kode_kwitansi_perpanjangan'],
                'tanggal_kwitansi' => $post['tanggal_kwitansi'],
                'penyedia_jasa_id' => $post['nama'],
                
      
        ];
        $this->db->where('kwitansi_perpanjangan_id', $post['id']);
        $this->db->update('kwitansi_perpanjangan', $params);
    }
    function check_kode($kode, $id = null)
    {
        $this->db->from('kwitansi_perpanjangan');
        $this->db->where('kode_usulan', $kode);
        if($id != null) {
            $this->db->where('kwitansi_perpanjangan_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('kwitansi_perpanjangan_id', $id);
        $this->db->delete('kwitansi_perpanjangan');
    }
    public function get_sum()
    {
        $sql = "SELECT sum(nilai_invoice) as nilai FROM invoice_perpanjangan";
        $result = $this->db->query($sql);
        return $result->row()->nilai;

    }
    public function get_count()
    {
        $sql = "SELECT count(nilai_invoice) as nilai FROM invoice_perpanjangan";
        $result = $this->db->query($sql);
        return $result->row()->nilai;

    }
    public function getinvoice($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('invoice_perpanjangan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = usulan_perbaikan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('perpanjangan_stnk_id', $id);
        }
        $this->db->order_by('kode_invoice_perpanjangan','asc');
        $query = $this->db->get();
        return $query;
    }
}
 