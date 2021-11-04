<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class kwitansi_perbaikan extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_kwitansi_perbaikan','m_user','m_penyedia_jasa']);
    }
    public function index()
    {
        $data['row'] = $this->m_kwitansi_perbaikan->get();
        $data['sum'] = $this->m_kwitansi_perbaikan->get_sum();
        $data['count'] = $this->m_kwitansi_perbaikan->get_count();
        $this->template->load('template', 'kwitansi_perbaikan/data', $data);
    }
    public function add()
    {
        
        $kwitansi_perbaikan = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $kwitansi_perbaikan->kwitansi_perbaikan_id = null;
        $kwitansi_perbaikan->kode_kwitansi_perbaikan  = 'KWT/'.'PRP'.'/PPK-KTL/VII/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $kwitansi_perbaikan->tanggal_kwitansi = null;

        $penyedia_jasa = $this->m_penyedia_jasa->get();

        $data = array(
            'page' => 'add',
            'row' => $kwitansi_perbaikan,
            'penyedia_jasa' => $penyedia_jasa

        );
        $this->template->load('template', 'kwitansi_perbaikan/kwitansi_perbaikan_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_kwitansi_perbaikan->get($id);
        $penyedia_jasa = $this->m_penyedia_jasa->get();
        if ($query->num_rows() > 0) {
            $kwitansi_perbaikan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $kwitansi_perbaikan,
                'penyedia_jasa' => $penyedia_jasa
            );
            $this->template->load('template', 'kwitansi_perbaikan/kwitansi_perbaikan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('kwitansi_perbaikan') . "';</script>";
        }
    } 
   public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_kwitansi_perbaikan->add($post);
        }
       else  if (isset($_POST['edit'])) {
            $this->m_kwitansi_perbaikan->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('kwitansi_perbaikan');
    }
    public function delete($id)
    {
        $kwitansi_perbaikan = $this->m_kwitansi_perbaikan->get($id)->row();
        if($kwitansi_perbaikan->foto != null ){
        $target_file = './uploads/usulan perbaikan/'.$kwitansi_perbaikan->foto ;
        unlink($target_file);
    }
        $this->m_kwitansi_perbaikan->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('kwitansi_perbaikan');
    }
    public function rincian($id)
    {
        $data['row'] = $this->m_kwitansi_perbaikan->get($id);
        $data['inv'] = $this->m_kwitansi_perbaikan->getinvoice();
        $data['sum'] = $this->m_kwitansi_perbaikan->get_sum();
        $data['count'] = $this->m_kwitansi_perbaikan->get_count();
        $this->template->load('template', 'kwitansi_perbaikan/rincian', $data);
    }
    public function ls($id)
    {
        $data['row'] = $this->m_kwitansi_perbaikan->get($id);
        $data['inv'] = $this->m_kwitansi_perbaikan->getinvoice();
        $data['sum'] = $this->m_kwitansi_perbaikan->get_sum();
        $data['count'] = $this->m_kwitansi_perbaikan->get_count();
        $this->template->load('template', 'kwitansi_perbaikan/ls', $data);
    }
    public function up($id)
    {
        $data['row'] = $this->m_kwitansi_perbaikan->get($id);
        $data['inv'] = $this->m_kwitansi_perbaikan->getinvoice();
        $data['sum'] = $this->m_kwitansi_perbaikan->get_sum();
        $data['count'] = $this->m_kwitansi_perbaikan->get_count();
        $this->template->load('template', 'kwitansi_perbaikan/up', $data);
    }

}