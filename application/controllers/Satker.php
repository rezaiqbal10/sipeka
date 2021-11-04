<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class Satker extends CI_Controller
{  
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        check_admin();
        $this->load->model('m_satker');
    }
    public function index()
    {
        $data['row'] = $this->m_satker->get();
        $this->template->load('template', 'master_file/satker/data', $data);
    }
    public function add()
    {
        $satker = new stdClass();
        $satker->satker_id = null;
        $satker->nama = null;

        $data = array(
            'page' => 'add',
            'row' => $satker

        );
        $this->template->load('template', 'master_file/satker/satker_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_satker->get($id);
        if ($query->num_rows() > 0) {
            $satker = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $satker
            );
            $this->template->load('template', 'master_file/satker/satker_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('satker') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_satker->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_satker->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('satker');
    }

    public function delete($id)
    {
        $this->m_satker->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('satker');
    }
}
