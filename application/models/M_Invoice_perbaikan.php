<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_invoice_perbaikan extends CI_Model
{ 
 
    public function get($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('invoice_perbaikan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = invoice_perbaikan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('invoice_perbaikan_id', $id);
        }
        $this->db->order_by('kode_invoice_perbaikan','asc');
        $query = $this->db->get();
        return $query;
    }
    public function getinvoice($id = null)
    {
        // $this->db->select('data_kendaraan.nomor_polisi, data_kendaraan.pemegang_kendaraan');
        $this->db->from('invoice_perbaikan');
        // $this->db->join('data_kendaraan','data_kendaraan.data_kendaraan_id = usulan_perbaikan.data_kendaraan_id','right');
        if ($id != null) {
            $this->db->where('usulan_perbaikan_id', $id);
        }
        $this->db->order_by('kode_invoice_perbaikan','asc');
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'penyedia_jasa_id' => $post['nama'],
            'usulan_perbaikan_id' => $post['kode_usulan'],
            'kode_invoice_perbaikan' => $post['kode_invoice_perbaikan'],
            'tanggal_invoice' => $post['tanggal_invoice'],
            'nilai_invoice' => $post['nilai_invoice'],
    
            'status_invoice' => 0,
            
        ];
        $this->db->insert('invoice_perbaikan', $params);
    }
    public function edit($post)
    {
        $params = [
            'penyedia_jasa_id' => $post['nama'],
            'usulan_perbaikan_id' => $post['kode_usulan'],
            'kode_invoice_perbaikan' => $post['kode_invoice_perbaikan'],
            'tanggal_invoice' => $post['tanggal_invoice'],
            'nilai_invoice' => $post['nilai_invoice'],
        
            'status_invoice' => 0,
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['foto'] != null ) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('invoice_perbaikan_id', $post['id']);
        $this->db->update('invoice_perbaikan', $params);
    }
    function check_kode($kode, $id = null)
    {
        $this->db->from('invoice_perbaikan');
        $this->db->where('kode_invoice_perbaikan', $kode);
        if($id != null) {
            $this->db->where('invoice_perbaikan_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('invoice_perbaikan_id', $id);
        $this->db->delete('invoice_perbaikan');
    }
    // public function history($id = null)
    // {
    //     $this->db->from('invoice_perbaikan');
        
    //     if($id != null) {
    //         $this->db->where('invoice_perbaikan_id !=', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
        
    // }
    public function get_sum()
    {
        $sql = "SELECT sum(nilai_invoice) as nilai FROM invoice_perbaikan";
        $result = $this->db->query($sql);
        return $result->row()->nilai;

    }
    public function get_count()
    {
        $sql = "SELECT count(nilai_invoice) as nilai FROM invoice_perbaikan";
        $result = $this->db->query($sql);
        return $result->row()->nilai;

    }

}
 