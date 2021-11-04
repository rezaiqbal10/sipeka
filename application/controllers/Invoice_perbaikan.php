<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class invoice_perbaikan extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_invoice_perbaikan','m_user','m_penyedia_jasa','m_usulan_perbaikan_user']);
    }
    public function index()
    {
        $data['row'] = $this->m_invoice_perbaikan->get();
        $data['sum'] = $this->m_invoice_perbaikan->get_sum();
        $data['count'] = $this->m_invoice_perbaikan->get_count();
        $this->template->load('template', 'invoice_perbaikan/data', $data);
    }
    public function add() 
    {
        
        $invoice_perbaikan = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $invoice_perbaikan->invoice_perbaikan_id = null;
        $invoice_perbaikan->kode_invoice_perbaikan  = 'BBWSPJ-SMG/'.'AHASS'.'/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $invoice_perbaikan->tanggal_invoice = null;
        $invoice_perbaikan->nilai_invoice = null;
        $invoice_perbaikan->status_invoice = null;

        $penyedia_jasa = $this->m_penyedia_jasa->get();
        $usulan_perbaikan_user = $this->m_usulan_perbaikan_user->get();

        $data = array(
            'page' => 'add',
            'row' => $invoice_perbaikan,
            'penyedia_jasa' => $penyedia_jasa,
            'usulan_perbaikan_user' => $usulan_perbaikan_user

        );
        $this->template->load('template', 'invoice_perbaikan/invoice_perbaikan_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_invoice_perbaikan->get($id);
        $penyedia_jasa = $this->m_penyedia_jasa->get();
        $usulan_perbaikan_user = $this->m_usulan_perbaikan_user->get();
        if ($query->num_rows() > 0) {
            $invoice_perbaikan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $invoice_perbaikan,
                'penyedia_jasa' => $penyedia_jasa,
                'usulan_perbaikan_user' => $usulan_perbaikan_user
            );
            $this->template->load('template', 'invoice_perbaikan/invoice_perbaikan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('invoice_perbaikan') . "';</script>";
        }
    } 
   public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_invoice_perbaikan->add($post);
        }
       else  if (isset($_POST['edit'])) {
            $this->m_invoice_perbaikan->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('invoice_perbaikan');
    }
    public function delete($id)
    {
        $invoice_perbaikan = $this->m_invoice_perbaikan->get($id)->row();
        if($invoice_perbaikan->foto != null ){
        $target_file = './uploads/usulan perbaikan/'.$invoice_perbaikan->foto ;
        unlink($target_file);
    }
        $this->m_invoice_perbaikan->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('invoice_perbaikan');
    }

}