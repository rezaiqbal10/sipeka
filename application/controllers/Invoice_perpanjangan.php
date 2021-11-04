<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class invoice_perpanjangan extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_invoice_perpanjangan','m_user','m_penyedia_jasa','m_perpanjangan_stnk_admin']);
    }
    public function index()
    {
        $data['row'] = $this->m_invoice_perpanjangan->get();
        $data['sum'] = $this->m_invoice_perpanjangan->get_sum();
        $data['count'] = $this->m_invoice_perpanjangan->get_count();
        $this->template->load('template', 'invoice_perpanjangan/data', $data);
    }
    public function add()
    {
        
        $invoice_perpanjangan = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $invoice_perpanjangan->invoice_perpanjangan_id = null;
        $invoice_perpanjangan->kode_invoice_perpanjangan  = 'BBWSPJ-SMG/'.'SAMSAT'.'/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $invoice_perpanjangan->tanggal_invoice = null;
        $invoice_perpanjangan->nilai_invoice = null;
        $invoice_perpanjangan->status_invoice = null;

        $penyedia_jasa = $this->m_penyedia_jasa->get();
        $perpanjangan_stnk = $this->m_perpanjangan_stnk_admin->get();

        $data = array(
            'page' => 'add',
            'row' => $invoice_perpanjangan,
            'penyedia_jasa' => $penyedia_jasa,
            'perpanjangan_stnk' => $perpanjangan_stnk

        );
        $this->template->load('template', 'invoice_perpanjangan/invoice_perpanjangan_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_invoice_perpanjangan->get($id);
        $penyedia_jasa = $this->m_penyedia_jasa->get();
        if ($query->num_rows() > 0) {
            $invoice_perpanjangan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $invoice_perpanjangan,
                'penyedia_jasa' => $penyedia_jasa,
                'perpanjangan_stnk' => $perpanjangan_stnk
            );
            $this->template->load('template', 'invoice_perpanjangan/invoice_perpanjangan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('invoice_perpanjangan') . "';</script>";
        }
    } 
   public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_invoice_perpanjangan->add($post);
        }
       else  if (isset($_POST['edit'])) {
            $this->m_invoice_perpanjangan->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('invoice_perpanjangan');
    }
    public function delete($id)
    {
        $invoice_perpanjangan = $this->m_invoice_perpanjangan->get($id)->row();
        if($invoice_perpanjangan->foto != null ){
        $target_file = './uploads/usulan perpanjangan/'.$invoice_perpanjangan->foto ;
        unlink($target_file);
    }
        $this->m_invoice_perpanjangan->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('invoice_perpanjangan');
    }
    public function rincian($id)
    {
        $data['row'] = $this->m_kwitansi_perpanjangan->get($id);
        $data['sum'] = $this->m_kwitansi_perpanjangan->get_sum();
        $data['count'] = $this->m_kwitansi_perpanjangan->get_count();
        $this->template->load('template', 'kwitansi_perpanjangan/rincian', $data);
    }
}