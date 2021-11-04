<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class data_kendaraan extends CI_Controller
{  
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        check_admin();
        $this->load->model(['m_data_kendaraan_admin', 'm_user']);
    }
    public function index()
    {
        $data['row'] = $this->m_data_kendaraan_admin->get();
        $this->template->load('template', 'data_kendaraan/data', $data);
    }
    public function add()
    { 
        $data_kendaraan = new stdClass();
        $data_kendaraan->data_kendaraan_id = null;
        // $data_kendaraan->name = null;
        $data_kendaraan->merk_kendaraan = null;
        $data_kendaraan->warna_kendaraan = null;
        $data_kendaraan->nomor_bmn = null;
        $data_kendaraan->nomor_stnk = null;
        $data_kendaraan->nomor_rangka = null;
        $data_kendaraan->tahun_pembuatan = null;
        $data_kendaraan->kondisi_kendaraan = null;
        $data_kendaraan->jenis_kendaraan = null;
        $data_kendaraan->seri_kendaraan = null;
        $data_kendaraan->jenis_bbm = null;
        $data_kendaraan->nup = null;
        $data_kendaraan->nomor_bpkb = null;
        $data_kendaraan->nomor_mesin = null;

        $user = $this->m_user->get();

        $query_user = $this->m_user->get();
        $name_user[null] = '- Pilih -';
        foreach($query_user->result() as $nm){
            $name_user[$nm->user_id] = $nm->name;
        }


        $data = array(
            'page' => 'add',
            'row' => $data_kendaraan,
            'user' => $user,
            'name_user' => $name_user, 'selectname' =>null ,
 
        );
        $this->template->load('template', 'data_kendaraan/data_kendaraan_form', $data);
    }
    public function edit($id)
    {
        // $id = $this->m_data_kendaraan_admin->get();
        $query = $this->m_data_kendaraan_admin->get($id);
        if ($query->num_rows() > 0) {
            $data_kendaraan = $query->row();
            $user = $this->m_user->get();

            $query_user = $this->m_user->get();
            $name_user[null] = '- Pilih -';
            foreach($query_user->result() as $nm){
                $name_user[$nm->user_id] = $nm->name;
            }
    
    
            $data = array(
                'page' => 'add',
                'row' => $data_kendaraan,
                'user' => $user,
                'name_user' => $name_user, 'selectname' => $data_kendaraan->user_id ,
    
            );
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('data_kendaraan') . "';</script>";
        }
        $this->template->load('template', 'data_kendaraan/data_kendaraan_form', $data);
    } 
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_data_kendaraan_admin->add($post);
        }
       else  if (isset($_POST['edit'])) {
            $this->m_data_kendaraan_admin->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('data_kendaraan');
    }

    public function delete($id)
    {
        $this->m_data_kendaraan_admin->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('data_kendaraan');
    }
    public function cetak_detail($id)
    {
        $data['row'] = $this->m_data_kendaraan_admin->get($id);
        $this->template->load('template', 'data_kendaraan/cetak_detail', $data);
        
    }
}
