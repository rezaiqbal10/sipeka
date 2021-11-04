<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kendaraan_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['m_data_kendaraan_admin','m_user','m_usulan_perbaikan_user']);
        $this->load->library('form_validation');
    }
 

    public function index()
    {
        // $data2 = $this->m_usulan_perbaikan_user->get()->result();
        $data['row'] = $this->m_data_kendaraan_admin->get();

        $this->template_user->load('template_user', 'data_kendaraan_user/data', $data);
    }

    public function history($id)
    {   
        
        $data['row'] = $this->m_usulan_perbaikan_user->gethistory($id);

        $this->template_user->load('template_user', 'data_kendaraan_user/history', $data);
        // $query = $this->m_usulan_perbaikan_user->get($id);
        // if ($query->num_rows() > 0) {
        //     $usulan_perbaikan = $query->row();
        //     $data = array(
        //         'page' => 'history',
        //         'row' => $usulan_perbaikan
        //     );
        //     $this->template_user->load('template_user', 'data_kendaraan_user/history', $data);
        // } else {
        //     echo "<script>alert('Data tidak ditemukan');";
        //     echo "window.location='" . site_url('data_kendaraan_user') . "';</script>";
        // }

    }
}
