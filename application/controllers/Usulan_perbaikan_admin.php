<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class usulan_perbaikan_admin extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        // check_not_login_user();
        $this->load->model(['m_usulan_perbaikan_admin','m_user','m_invoice_perbaikan']);
    }
    public function index()
    {
        $data['row'] = $this->m_usulan_perbaikan_admin->get();
        $this->template->load('template', 'usulan_perbaikan_admin/data', $data);
    }
    public function add()
    {
        
        $usulan_perbaikan = new stdClass();
 
        $usulan_perbaikan->status_perbaikan = null;

        $data = array(
            'page' => 'add',
            'row' => $usulan_perbaikan

        );
        $this->template->load('template', 'usulan_perbaikan_admin/data', $data);
    }
    public function edit($id)
    {
        $query = $this->m_usulan_perbaikan_admin->get($id);
        if ($query->num_rows() > 0) {
            $usulan_perbaikan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $usulan_perbaikan
            );
            $this->template->load('template', 'usulan_perbaikan_admin/usulan_perbaikan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('usulan_perbaikan_admin') . "';</script>";
        }
    } 
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_usulan_perbaikan_admin->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_usulan_perbaikan_admin->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('usulan_perbaikan_admin');
    }
    public function delete($id)
    {
        $usulan_perbaikan = $this->m_usulan_perbaikan_admin->get($id)->row();
        if($usulan_perbaikan->foto != null ){
        $target_file = './uploads/usulan perbaikan/'.$usulan_perbaikan->foto ;
        unlink($target_file);
    }
        $this->m_usulan_perbaikan_admin->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('usulan_perbaikan_user');
    }
    
    public function invoice($id)
    {   
        
        $data['row'] = $this->m_invoice_perbaikan->getinvoice($id);

        $this->template->load('template', 'usulan_perbaikan_admin/invoice', $data);
        // $data['row'] = $this->m_invoice_perbaikan->getinvoice();
        // $this->template->load('template', 'invoice_perbaikan/data', $data);
    }
    public function cetak($id)
    {
        $data['row'] = $this->m_usulan_perbaikan_admin->get($id);
        $this->template->load('template', 'usulan_perbaikan_admin/cetak', $data);
    }
    public function cetak_invoice($id)
    {
        $data['sum'] = $this->m_invoice_perbaikan->get_sum();
        $data['count'] = $this->m_invoice_perbaikan->get_count();
        $data['row'] = $this->m_invoice_perbaikan->getinvoice($id);
        $this->template->load('template', 'usulan_perbaikan_admin/cetak_invoice', $data);
    }
}