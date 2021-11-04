<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class perpanjangan_stnk_admin extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        // check_not_login_user();
        $this->load->model(['m_perpanjangan_stnk_admin','m_user','m_invoice_perpanjangan']);
    }
    public function index()
    {
        $data['row'] = $this->m_perpanjangan_stnk_admin->get();
        $this->template->load('template', 'perpanjangan_stnk_admin/data', $data);
    }
    public function add()
    {
        
        $perpanjangan_stnk = new stdClass();
 
        $perpanjangan_stnk->status_perpanjangan = null;

        $data = array(
            'page' => 'add',
            'row' => $perpanjangan_stnk

        );
        $this->template->load('template', 'perpanjangan_stnk_admin/data', $data);
    }
    public function edit($id)
    {
        $query = $this->m_perpanjangan_stnk_admin->get($id);
        if ($query->num_rows() > 0) {
            $perpanjangan_stnk = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $perpanjangan_stnk
            );
            $this->template->load('template', 'perpanjangan_stnk_admin/perpanjangan_stnk_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('perpanjangan_stnk_admin') . "';</script>";
        }
    } 
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_perpanjangan_stnk_admin->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_perpanjangan_stnk_admin->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('perpanjangan_stnk_admin');
    }
    public function delete($id)
    {
        $perpanjangan_stnk = $this->m_perpanjangan_stnk_admin->get($id)->row();
        if($perpanjangan_stnk->foto != null ){
        $target_file = './uploads/perpanjangan/'.$perpanjangan_stnk->foto ;
        unlink($target_file);
    }
        $this->m_perpanjangan_stnk_admin->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('perpanjangan_stnk_user');
    }
    public function invoice($id)
    {   
        $data['row'] = $this->m_invoice_perpanjangan->getinvoice($id);

        $this->template->load('template', 'perpanjangan_stnk_admin/invoice', $data);
        // $data['row'] = $this->m_invoice_perbaikan->getinvoice();
        // $this->template->load('template', 'invoice_perbaikan/data', $data);
    }
}