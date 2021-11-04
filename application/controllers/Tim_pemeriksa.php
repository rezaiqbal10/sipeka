<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class Tim_pemeriksa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        check_admin();
        $this->load->model('m_tim_pemeriksa');
    }
    public function index()
    {
        $data['row'] = $this->m_tim_pemeriksa->get();
        $this->template->load('template', 'master_file/tim_pemeriksa/data', $data);
    }
    public function add()
    {
        $tim_pemeriksa = new stdClass();
        $tim_pemeriksa->tim_pemeriksa_id = null;
        $tim_pemeriksa->nama = null;
        $tim_pemeriksa->npp = null;
        $tim_pemeriksa->jabatan = null;
        $tim_pemeriksa->alamat = null;
        $data = array(
            'page' => 'add',
            'row' => $tim_pemeriksa

        );
        $this->template->load('template', 'master_file/tim_pemeriksa/tim_pemeriksa_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_tim_pemeriksa->get($id);
        if ($query->num_rows() > 0) {
            $tim_pemeriksa = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $tim_pemeriksa
            );
            $this->template->load('template', 'master_file/tim_pemeriksa/tim_pemeriksa_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('tim_pemeriksa') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_tim_pemeriksa->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_tim_pemeriksa->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('tim_pemeriksa');
    } 

    public function delete($id)
    {
        $this->m_tim_pemeriksa->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('tim_pemeriksa');
    }
}
