<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_invoice_perpanjangan extends CI_Model
{ 
 
    public function get($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('invoice_perpanjangan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = invoice_perpanjangan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('invoice_perpanjangan_id', $id);
        }
        $this->db->order_by('kode_invoice_perpanjangan','asc');
        $query = $this->db->get();
        return $query;
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
    // public function gethistory($id = null)
    // {
    //     // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
    //     $this->db->from('invoice_perpanjangan');
    //     // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = invoice_perpanjangan.data_kendaraan_id','right');
    //     if ($id != null) {
    //         $this->db->where('data_kendaraan_id', $id);
    //     }
    //     $this->db->order_by('kode_invoice_perpanjangan','asc');
    //     $query = $this->db->get();
    //     return $query;
    // }
    public function add($post)
    {
        $params = [
            'penyedia_jasa_id' => $post['nama'],
            'perpanjangan_stnk_id' => $post['kode_perpanjangan'],
            'kode_invoice_perpanjangan' => $post['kode_invoice_perpanjangan'],
            'tanggal_invoice' => $post['tanggal_invoice'],
            'nilai_invoice' => $post['nilai_invoice'],
    
            'status_invoice' => 0,
            
        ];
        $this->db->insert('invoice_perpanjangan', $params);
    }
    public function edit($post)
    {
        $params = [
            'penyedia_jasa_id' => $post['nama'],
            'perpanjangan_stnk_id' => $post['kode_perpanjangan'],
            'kode_invoice_perpanjangan' => $post['kode_invoice_perpanjangan'],
            'tanggal_invoice' => $post['tanggal_invoice'],
            'nilai_invoice' => $post['nilai_invoice'],
        
            'status_invoice' => 0,
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['foto'] != null ) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('invoice_perpanjangan_id', $post['id']);
        $this->db->update('invoice_perpanjangan', $params);
    }
    function check_kode($kode, $id = null)
    {
        $this->db->from('invoice_perpanjangan');
        $this->db->where('kode_invoice_perpanjangan', $kode);
        if($id != null) {
            $this->db->where('invoice_perpanjangan_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('invoice_perpanjangan_id', $id);
        $this->db->delete('invoice_perpanjangan');
    }
    // public function history($id = null)
    // {
    //     $this->db->from('invoice_perpanjangan');
        
    //     if($id != null) {
    //         $this->db->where('invoice_perpanjangan_id !=', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
        
    // }
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

}
 