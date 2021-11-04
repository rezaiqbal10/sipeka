<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class Penyedia_jasa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        check_admin();
        $this->load->model('m_penyedia_jasa');
    }
    public function index()
    {
        $data['row'] = $this->m_penyedia_jasa->get();
        $this->template->load('template', 'master_file/penyedia_jasa/data', $data);
    }
    public function add() 
    {
        $penyedia_jasa = new stdClass();
        $penyedia_jasa->penyedia_jasa_id = null;
        $penyedia_jasa->nama = null;
        $penyedia_jasa->phone = null;
        $penyedia_jasa->alamat = null;
        $data = array(
            'page' => 'add',
            'row' => $penyedia_jasa

        );
        $this->template->load('template', 'master_file/penyedia_jasa/penyedia_jasa_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_penyedia_jasa->get($id);
        if ($query->num_rows() > 0) {
            $penyedia_jasa = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $penyedia_jasa
            );
            $this->template->load('template', 'master_file/penyedia_jasa/penyedia_jasa_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('penyedia_jasa') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_penyedia_jasa->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_penyedia_jasa->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('penyedia_jasa');
    }

    public function delete($id)
    {
        $this->m_penyedia_jasa->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('penyedia_jasa');
    }
}
