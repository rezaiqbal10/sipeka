<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class Sparepart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        check_admin();
        $this->load->model('m_sparepart');
    }
    public function index()
    {
        $data['row'] = $this->m_sparepart->get();
        $this->template->load('template', 'master_file/sparepart/data', $data);
    }
    public function add()
    {
        $sparepart = new stdClass();
        $sparepart->sparepart_id = null;
        $sparepart->nama = null;

        $data = array(
            'page' => 'add',
            'row' => $sparepart

        );
        $this->template->load('template', 'master_file/sparepart/sparepart_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_sparepart->get($id);
        if ($query->num_rows() > 0) {
            $sparepart = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $sparepart
            );
            $this->template->load('template', 'master_file/sparepart/sparepart_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('sparepart') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_sparepart->add($post);
        }
        if (isset($_POST['edit'])) {
            $this->m_sparepart->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('sparepart');
    }

    public function delete($id)
    {
        $this->m_sparepart->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('sparepart');
    }
}
