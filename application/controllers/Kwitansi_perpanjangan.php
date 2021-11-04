<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class kwitansi_perpanjangan extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_kwitansi_perpanjangan','m_user','m_penyedia_jasa']);
    }
    public function index()
    {
        $data['row'] = $this->m_kwitansi_perpanjangan->get();
        $data['sum'] = $this->m_kwitansi_perpanjangan->get_sum();
        $data['count'] = $this->m_kwitansi_perpanjangan->get_count();
        $this->template->load('template', 'kwitansi_perpanjangan/data', $data);
    }
    public function add()
    {
        
        $kwitansi_perpanjangan = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $kwitansi_perpanjangan->kwitansi_perpanjangan_id = null;
        $kwitansi_perpanjangan->kode_kwitansi_perpanjangan  = 'KWT/'.'PRP'.'/PPK-KTL/VII/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $kwitansi_perpanjangan->tanggal_kwitansi = null;

        $penyedia_jasa = $this->m_penyedia_jasa->get();

        $data = array(
            'page' => 'add',
            'row' => $kwitansi_perpanjangan,
            'penyedia_jasa' => $penyedia_jasa

        );
        $this->template->load('template', 'kwitansi_perpanjangan/kwitansi_perpanjangan_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_kwitansi_perpanjangan->get($id);
        $penyedia_jasa = $this->m_penyedia_jasa->get();
        if ($query->num_rows() > 0) {
            $kwitansi_perpanjangan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $kwitansi_perpanjangan,
                'penyedia_jasa' => $penyedia_jasa
            );
            $this->template->load('template', 'kwitansi_perpanjangan/kwitansi_perpanjangan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('kwitansi_perpanjangan') . "';</script>";
        }
    } 
   public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_kwitansi_perpanjangan->add($post);
        }
       else  if (isset($_POST['edit'])) {
            $this->m_kwitansi_perpanjangan->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('kwitansi_perpanjangan');
    }
    public function delete($id)
    {
        $kwitansi_perpanjangan = $this->m_kwitansi_perpanjangan->get($id)->row();
        if($kwitansi_perpanjangan->foto != null ){
        $target_file = './uploads/usulan perpanjangan/'.$kwitansi_perpanjangan->foto ;
        unlink($target_file);
    }
        $this->m_kwitansi_perpanjangan->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('kwitansi_perpanjangan');
    }
    public function rincian($id)
    {
        $data['row'] = $this->m_kwitansi_perpanjangan->get($id);
        $data['sum'] = $this->m_kwitansi_perpanjangan->get_sum();
        $data['count'] = $this->m_kwitansi_perpanjangan->get_count();
        $this->template->load('template', 'kwitansi_perpanjangan/rincian', $data);
    }
    public function ls($id)
    {
        $data['row'] = $this->m_kwitansi_perpanjangan->get($id);
        $data['inv'] = $this->m_kwitansi_perpanjangan->getinvoice();
        $data['sum'] = $this->m_kwitansi_perpanjangan->get_sum();
        $data['count'] = $this->m_kwitansi_perpanjangan->get_count();
        $this->template->load('template', 'kwitansi_perpanjangan/ls', $data);
    }
    public function up($id)
    {
        $data['row'] = $this->m_kwitansi_perpanjangan->get($id);
        $data['inv'] = $this->m_kwitansi_perpanjangan->getinvoice();
        $data['sum'] = $this->m_kwitansi_perpanjangan->get_sum();
        $data['count'] = $this->m_kwitansi_perpanjangan->get_count();
        $this->template->load('template', 'kwitansi_perpanjangan/up', $data);
    }

}